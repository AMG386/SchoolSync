<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use App\Designation;
use App\Http\Controllers\Controller;
use App\Models\Employee\Employee;
use App\Models\Permissions\Role;
use App\Models\Permissions\RoleUser;
use App\Models\User\DefaultRolePermission;
use App\Models\Permissions\UserGroup;
use App\Models\Permissions\UserGroupPermission;
use App\Models\Permissions\UserGroupSpecialPermission;
use App\Traits\UserGroupTrait;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Hash;
use File;
use Session;
use Lang;
use DB;

class UserGroupController extends Controller
{
    use UserGroupTrait;
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('role:USERMGMT');
    }

    public function index(Request $request)
    {
        if (!Auth::user()->hasRead(PERM_USERS)) {
            Session::flash('error', 'You do not have permission to view');
            return redirect()->back();
        }


        $users = UserGroup::all();

        \View::share('usergroups', $users);
        $this->pageSummaryIndex();

        return view('pages.settings.usergroups.index');
    }

    public function show($id)
    {
        if (!Auth::user()->hasRead(PERM_USERS)) {
            Session::flash('error', 'You do not have permission to View');
            return redirect()->back();
        }

        $user = UserGroup::find($id);
        \View::share('usergroup', $user);

        $groups = Role::select('group')->distinct('group')
            ->orderBy('group', 'ASC')->get();
        foreach ($groups as $group) {
            $group->modules = Role::where('group', $group->group)->get();
        }
        \View::share('groups', $groups);

        $roles =  Role::all();
        $adminroles = $roles->filter(function ($res) {
            return $res->category == 'ADM';
        });
        $settingsroles = $roles->filter(function ($res) {
            return $res->category == 'SET';
        });
        $approvalroles = $roles->filter(function ($res) {
            return $res->category == 'APR';
        });
        $moduleroles = $roles->filter(function ($res) {
            return $res->category == 'MOD';
        });
        $financeroles = $roles->filter(function ($res) {
            return $res->category == 'FIN';
        });

        \View::share('adminroles', $adminroles);
        \View::share('settingsroles', $settingsroles);
        \View::share('approvalroles', $approvalroles);
        \View::share('moduleroles', $moduleroles);
        \View::share('financeroles', $financeroles);

        // $permissions = DefaultRolePermission::select('designID')->distinct()->get();
        // \View::share('permissions',$permissions);
        $this->pageSummaryShow($user);


        return view('pages.settings.usergroups.show');
    }

    public function create(Request $request)
    {
        return view(
            'pages.settings.usergroups.partials._create',
            [
                'redirect' => $request->redirect ?? ''
            ]
        )->render();

        // if (!Auth::user()->hasCreate(PERM_USERS)) {
        //     Session::flash('error', 'You do not have permission to create');
        //     return redirect()->back();
        // }

        // // $employees = Employee::select(DB::raw("CONCAT(sEmpId,' - ', sFirstName,' ',sLastName) AS name"), 'id')

        // //     ->where('iStatus', ACTIVE)
        // //     ->whereNotIn('id', function ($query) {
        // //         $query->select('EmpID')->whereNotNull('EmpID')->from('users');
        // //     })
        // //     ->pluck('name', 'id');

        // // \View::share('employees', $employees);
        // return view('settings.usergroup.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'group_name' => 'required',
        ]);

      

        $user = UserGroup::create($request->all());
        $user->save();

        return Response::json(array(
            'Status' => 'Success',
            'Msg' => 'User group Saved Successfully',
            'RedirectUrl' => ($request->redirecturl) ? url($request->redirecturl) : route("usergroups.show", $user->id)
        ));
    }

    public function edit(Request $request, $id)
    {
        // if (!Auth::user()->hasEdit(PERM_USERS)) {
        //     Session::flash('error', 'You do not have permission to edit');
        //     return redirect()->back();
        // }

        $user = UserGroup::find($id);
        return view('pages.settings.usergroups.partials._edit', [
            'usergroup' => $user,
            'redirect' => $request->redirect ?? '',
        ])->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'group_name' => 'required',
        ]);


        $user = UserGroup::findOrFail($id);
        $user->group_name = $request->group_name;

        $user->save();
        return Response::json(array(
            'Status' => 'Success',
            'Msg' => 'User Group Updated Successfully',
            'RedirectUrl' => ($request->redirecturl) ? url($request->redirecturl) : route("usergroups.show", $user->id)
        ));
    }


    public function destroy(Request $request, $id)
    {
        // if (!Auth::user()->hasDelete(PERM_USERS)) {
        //     Session::flash('error', 'You Do not have permission to delete');
        //     return redirect()->back();
        // }

        //check whether group is used
        $usercount = User::where('group_id', $id)->count();
        if($usercount>0)
        return Response::json(array(
            'Status' => 'Error',
            'Msg' => 'User Group assigned to employee, cannot be deleted',
        ));

        $user = UserGroup::findOrFail($id);
        $user->delete();

        return Response::json(array(
            'Status' => 'Success',
            'Msg' => 'User Group deleted Successfully',
            'RedirectUrl' => ($request->redirecturl) ? url($request->redirecturl) : route("usergroups.index")
        ));
    }



    public function changeRoles(Request $req)
    {
        // dd($req);
        $type = $req->type;
        $roleuser = UserGroupPermission::where('role_id', $req->roleId)->where('user_group_id', $req->usergroupId)->first();
        if (empty($roleuser)) {
            $roleuser = new UserGroupPermission;
            $roleuser->role_id = $req->roleId;
            $roleuser->user_group_id = $req->usergroupId;
            $roleuser->$type = $req->action;
            $roleuser->save();
            return Response::json(array(
                'Status' => 'Success',
                'Msg' => 'Group permission added successfully'
            ));
        } else {
            $roleuser->$type = $req->action;
            $roleuser->save();
            return Response::json(array(
                'Status' => 'Success',
                'Msg' => 'Group permission changed successfully'
            ));
        }
        return Response::json(array(
            'Status' => 'Error',
            'Msg' => "Some error occured!"
        ));
    }

    public function changeSpecialPermissions(Request $req)
    {
        // dd($req);
        // $type = $req->type;
        $roleuser = UserGroupSpecialPermission::where('role_id', $req->roleId)
            ->where('user_group_id', $req->usergroupId)
            ->where('special_permission_id', $req->special_permission_id)
            ->first();

        if (empty($roleuser)) {
            $roleuser = new UserGroupSpecialPermission;
            $roleuser->role_id = $req->roleId;
            $roleuser->user_group_id = $req->usergroupId;
            $roleuser->special_permission_id = $req->special_permission_id;
            $roleuser->status = $req->action;
            $roleuser->save();
            return Response::json(array(
                'Status' => 'Success',
                'Msg' => 'Special permission added successfully'
            ));
        } else {
            $roleuser->status = $req->action;
            $roleuser->save();
            return Response::json(array(
                'Status' => 'Success',
                'Msg' => 'Special permission changed successfully'
            ));
        }
        return Response::json(array(
            'Status' => 'Error',
            'Msg' => "Some error occured!"
        ));
    }
    /****************************************************************/

    public function userAccounts()
    {
        $data['user'] = Auth::user();
        // dd($user);

        return view('theme.userAccounts', $data);
    }
    public function changePassword(Request $req)
    {
        if ($req->txtNewPwd != $req->txtConfirmPwd) {
            return Response::json(array(
                'Status' => 'Error',
                'Msg' => Lang::get('user.err.err.confirm_password_nomatch')
            ));
        }
        $user = Auth::user();
        // dd(bcrypt($req->txtCurrentPwd));
        if (Hash::check($req->txtCurrentPwd, $user->password)) {
            $user->password = bcrypt($req->txtNewPwd);
            if ($user->save()) {
                return Response::json(array(
                    'Status' => 'Success',
                    'Msg' => Lang::get('user.msg.password_changed')
                ));
            }
        } else {
            return Response::json(array(
                'Status' => 'Error',
                'Msg' => Lang::get('user.err.err.current_password_incorrect')
            ));
        }
    }


    public function changeLanguage(Request $req)
    {
        // dd($req);
        $user = Auth::user();
        $user->lang = $req->ln;
        if ($user->save()) {
            Session::put('locale', $user->lang);
            return Response::json(array(
                'Status' => 'Success',
                'Msg' => Lang::get('user.msg.language_changed')
            ));
        }
    }

    public function changeImage(Request $req)
    {
        // $document = new Document;
        $file = $req->file('uploadFile');
        // dd($req);
        if ($file) {
            //you also need to keep file extension as well
            $filename = $file->getClientOriginalName();
            $path = '/uploads/profile/' . Auth::user()->id . '/';
            $folderpath = public_path() . $path;
            if (!File::exists($folderpath)) {
                File::makeDirectory($folderpath, $mode = 0777, true, true);
            }
            $file->move($folderpath, $filename);

            $user = Auth::user();
            $user->sImgPath = $path . $filename;
            if ($user->save()) {
                return Response::json(array(
                    'Status' => 'Success',
                    'Msg' => Lang::get('default.msg.imageuploaded'),
                    'RedirectUrl' => route("user.account")
                ));
            }
        } else {
            return Response::json(array(
                'Status' => 'Error',
                'Msg' => Lang::get('default.err.imageuploaded')
            ));
        }
    }

    /*************************************************/
    /*Designation*/
    /*************************************************/

    public function viewDesignations()
    {
        $desg = DefaultRolePermission::select('designID')->distinct()->get();
        $designations = Designation::whereIn('ID', $desg)->get();
        // dd($designations);
        \View::share('designations', $designations);

        return view('theme.users.designation.viewDesignations');
    }

    public function viewDesignationdetails($id)
    {
        $designation = Designation::find($id);
        \View::share('designation', $designation);

        $roles = Role::All();

        foreach ($roles as $role) {
            $isSelected = DefaultRolePermission::where('designID', $id)
                ->where('roleID', $role->id)
                ->first();
            $role->isSelected = ($isSelected) ? true : false;
        }

        \View::share('roles', $roles);

        return view('theme.users.designation.viewDesignationDetails');
    }

    //save default permissions for designation
    public function savePermissions(Request $req)
    {

        //get users with selected designation
        $usrs = User::leftjoin('Employee', 'Employee.ID', 'Users.EmpID')
            ->where('Employee.DesignID', $req->designId)
            ->pluck('Users.ID')->toArray();

        $permission = DefaultRolePermission::where('roleID', $req->roleId)->where('designID', $req->designId)->first();
        if (empty($permission)) {
            $permission = new DefaultRolePermission;
            $permission->roleID = $req->roleId;
            $permission->designID = $req->designId;
            $permission->save();


            //apply to all users
            foreach ($usrs as $userid) {
                $ruser = RoleUser::where('user_id', $userid)
                    ->where('role_id', $req->roleId)
                    ->first();
                if (empty($ruser)) {
                    $roleuser = new RoleUser;
                    $roleuser->role_id = $req->roleId;
                    $roleuser->user_id = $userid;
                    $roleuser->save();
                }
            }

            return Response::json(array(
                'Status' => 'Success',
                'Msg' => Lang::get('user.msg.mod_perm_desg_added')
            ));
        } else {
            $permission->delete();

            //apply to all users
            foreach ($usrs as $userid) {
                $ruser = RoleUser::where('user_id', $userid)
                    ->where('role_id', $req->roleId)
                    ->first();
                if (!empty($ruser)) {
                    $ruser->delete();
                }
            }

            return Response::json(array(
                'Status' => 'Success',
                'Msg' => Lang::get('user.msg.mod_perm_desg_removed')
            ));
        }
        return Response::json(array(
            'Status' => 'Error',
            'Msg' => Lang::get('default.err.general')
        ));
    }

    //change bulk user permissions
    public function changePermissions(Request $req)
    {
        // dd($req);
        $usrarr = explode(',', $req->userIds);
        $rolearr = explode(',', $req->rolesIds);

        foreach ($usrarr as $user) {
            //remove all permissions
            $roleuser = RoleUser::where('user_id', $user)->delete();
            foreach ($rolearr as $role) {
                $roleuser = new RoleUser;
                $roleuser->role_id = $role;
                $roleuser->user_id = $user;
                $roleuser->save();
            }
        }
        return Response::json(array(
            'Status' => 'Success',
            'Msg' => Lang::get('user.msg.mod_perm_updated')
        ));
        // return Response::json(array('Status' => 'Error', 'Msg' => 'Some error occured!'));
    }

    // remove default permissions
    public function removeDefaultPermissions(Request $req)
    {
        // dd($req);
        //remove all permissions
        $roleuser = DefaultRolePermission::whereIn('id', $req->roleId)->delete();
        return Response::json(array(
            'Status' => 'Success',
            'Msg' => Lang::get('user.msg.mod_perm_removed')
        ));
        // return Response::json(array('Status' => 'Error', 'Msg' => 'Some error occured!'));
    }

    // add default permissions
    public function addDefaultPermissions(Request $req)
    {
        // dd($req);

        foreach ($req->roles as $role) {
            $permission = DefaultRolePermission::where('roleID', $role)->where('designID', $req->designId)->first();
            if (empty($permission)) {
                $permission = new DefaultRolePermission;
                $permission->roleID = $role;
                $permission->designID = $req->designId;
                $permission->created_by = Auth::user()->ID;
                $permission->save();
            }
        }
        //remove all permissions
        // $roleuser = DefaultRolePermission::whereIn('id', $req->roleId)->delete();
        return Response::json(array(
            'Status' => 'Success',
            'Msg' => Lang::get('user.msg.mod_perm_added')
        ));
        // return Response::json(array('Status' => 'Error', 'Msg' => 'Some error occured!'));
    }

    // apply default permissions
    public function applyDefaultPermissions(Request $req)
    {
        //get users with selected designation
        $usrs = User::leftjoin('Employee', 'Employee.ID', 'Users.EmpID')
            ->where('Employee.DesignID', $req->designId)
            ->pluck('Users.ID')->toArray();

        $permissions = DefaultRolePermission::where('designID', $req->designId)->get();
        foreach ($permissions as $permission) {
            foreach ($usrs as $userid) {
                $ruser = RoleUser::where('user_id', $userid)
                    ->where('role_id', $permission->roleID)
                    ->first();
                if (empty($ruser)) {
                    $roleuser = new RoleUser;
                    $roleuser->role_id = $permission->roleID;
                    $roleuser->user_id = $userid;
                    $roleuser->save();
                }
            }
        }
        return Response::json(array(
            'Status' => 'Success',
            'Msg' => Lang::get('user.msg.mod_perm_all')
        ));

        // return Response::json(array('Status' => 'Error', 'Msg' => 'Some error occured!'));
    }
}
