<?php

namespace App\Http\Controllers\Settings;

use App\Helpers\Dropdown;
use App\Http\Controllers\Controller;
use App\Models\Employee\Employee;
use App\Models\Employee\Holiday;
use App\Models\Settings\Calander;
use App\Models\Settings\CalanderSettings;
use App\Models\Settings\SpecialDay;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Response;
use Auth;
use Utilities;

class CalanderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::user()->hasRead(PERM_CALENDAR)) {
            Session::flash('error', 'You do not have permission to View');
            return redirect()->back();
        }
        $cl = Calander::where('is_special', 0)->get();
        \View::share('calanders', $cl);

        $sp = Calander::where('is_special', 1)->get();
        \View::share('spcalanders', $sp);

        return view('calander.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!Auth::user()->hasCreate(PERM_CALENDAR)) {
            Session::flash('error', 'You do not have permission to create');
            return redirect()->back();
        }

        if (isset($request->type) && ($request->type == 'special')) {

            \View::share('is_special', 1);
            \View::share('generalcalendars', Dropdown::generalcalendars());
        } else {
            \View::share('is_special', 0);
        }

        return view('calander.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $rules = [

            'sName' => 'required|max:191',
            'year' => 'required',
            'dtStart' => 'required',
            'dtEnd' => 'required',
            'tmStart' => 'required',
            'tmEnd' => 'required',
        ];

        if ($request->is_special == 1) {
            $rules += [
                'parent_calendar' => 'required',
            ];
        } else
            $rules += [
                'has_activityschedule' => 'required',
            ];
        // dd($request);
        $this->validate($request, $rules);

        $st = Carbon::parse($request->tmStart);
        $en = Carbon::parse($request->tmEnd);
        $diff = $st->diffInMinutes($en);
        $request->merge([
            'working_minutes' => $diff,
        ]);
        // $msg = 'Holiday added successfully';
        $cal = Calander::create($request->all());
        $cal->save();

        // dd($cal);

        if ($request->is_special == 1) {

            $drange = Utilities::getDatesFromRange($request->dtStart, $request->dtEnd);

            foreach ($drange as $dt) {
                $hd = new SpecialDay();
                $hd->iCalendar = $cal->id;
                $hd->date = $dt;
                $hd->save();
            }
        }

        $request->session()->flash('success', 'New Calander created successfully');
        return redirect()->route('calander.index');
    }

    public function storeEmployees(Request $request)
    {

        $cal = Employee::whereIn('id', $request->chkemp)->update(['iCalander' => $request->calId]);

        $request->session()->flash('success', 'Employees updated successfully');
        return redirect('/calander/' . $request->calId . '#employees');
    }

    public function storeEmployee(Request $request)
    {
        // dd($request);
        $cal = Employee::where('id', $request->empId)->update(['iCalander' => $request->ddCalander]);

        $request->session()->flash('success', 'Calander updated successfully');
        return redirect()->route('leaves.employees', ['id' => $request->empId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (!Auth::user()->hasRead(PERM_CALENDAR)) {
            Session::flash('error', 'You do not have permission to View');
            return redirect()->back();
        }
        // $year = ($year) ? $year : Carbon\Carbon::now()->format('Y');
        $calander = Calander::where('id', $id)
            ->with('specialdays')
            ->first();

        // dd($calander);
        // \View::share('year', $year);
        \View::share('calander', $calander);
        \View::share('employees', Employee::where('iStatus', ACTIVE)
            ->where('iCalander', '<>', $id)
            ->get());
        \View::share('calendaremployees', Employee::where('iStatus', ACTIVE)
            ->where('iCalander', $id)
            ->get());

        \View::share('holidays', Holiday::where('cType', 'P')
            ->where('iCalander', $id)
            ->orderBy('dtHoliday', 'ASC')
            ->get());
        \View::share('weekends', Holiday::where('cType', 'W')
            ->where('iCalander', $id)
            ->orderBy('dtHoliday', 'ASC')
            ->get());
        $cs =  CalanderSettings::where('iCalander', $id)
            ->where('sType', WEEKEND)
            ->get();

        // dd($cs);
        \View::share('ws', $cs);

        if ($calander->is_special == 1)
            return view('calander.show-special');
        else
            return view('calander.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->hasEdit(PERM_CALENDAR)) {
            Session::flash('error', 'You Do not have permission to edit');
            return redirect()->back();
        }

        $cal = Calander::findOrFail($id);
        \View::share('calander', $cal);

        \View::share('generalcalendars', Dropdown::generalcalendars());

        return view('calander.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $calander = Calander::find($id);
        $rules = [
            'sName' => 'required|max:191',
            'year' => 'required',
            'dtStart' => 'required',
            'dtEnd' => 'required',
            'tmStart' => 'required',
            'tmEnd' => 'required',
        ];
        if ($calander->is_special == 0)
            $rules += [
                'has_activityschedule' => 'required',
            ];
        else
            $rules += [
                'parent_calendar' => 'required',
            ];

        $this->validate($request, $rules);

        $st = Carbon::parse($request->tmStart);
        $en = Carbon::parse($request->tmEnd);
        $diff = $st->diffInMinutes($en);
        $request->merge([
            'working_minutes' => $diff,
        ]);

        $calander->update($request->all());


        if ($calander->is_special == 1) {

            //remove existing special days
            SpecialDay::where('iCalendar', $id)->delete();
            $drange = Utilities::getDatesFromRange($request->dtStart, $request->dtEnd);

            foreach ($drange as $dt) {
                $hd = new SpecialDay();
                $hd->iCalendar = $calander->id;
                $hd->date = $dt;
                $hd->save();
            }
        }

        // $attendance->save();
        $request->session()->flash('success', 'Calander updated successfully');
        return redirect()->route('calander.show', ['calander' => $id]);
        // redirect('/calander/' . $request->calId . '#employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::user()->hasDelete(PERM_CALENDAR)) {
            Session::flash('error', 'You Do not have permission to delete');
            return redirect()->back();
        }

        $cal = Calander::find($id);
        $empcount = Employee::where('iCalander', $id)->count();
        if ($empcount > 0) {
            Session::flash('error', 'Calendar cannot be deleted since linked with employees');
            return redirect()->back();
        }

        //check parent
        $parent = Calander::where('parent_calendar', $id)->count();
        if ($parent > 0) {
            Session::flash('error', 'Calendar cannot be deleted since attached with a special calendar');
            return redirect()->back();
        }

        CalanderSettings::where('iCalander', $id)->delete();
        Holiday::where('iCalander', $id)->delete();

        // if ($cal->employee()->exists()) {
        //     abort('Resource cannot be deleted due to existence of related resources.');
        // }

        $cal->delete();
        Session::flash('success', 'Calander deleted successfully.');
        return redirect()->route('calander.index');
    }
}
