<div class="">
    <div class="main-card mb-3 card">
        <div class="card-header">
            <h4 class="card-title"> {{ $usergroup->group_name }} </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="emp_table" class="table p-0">
                    {{-- <thead>
                        
                    </thead> --}}
                    <tbody>
                        @foreach ($groups as $grp)
                            <tr style="background-color: lightblue;">
                                <td colspan="10">
                                    {{ $grp->group }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>View</th>
                                <th>Create</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Submit</th>
                                <th>Approve</th>
                                <th>UnApprove</th>
                                <th>Special Permissions</th>

                            </tr>
                            @foreach ($grp->modules as $role)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $role->alias }}
                                    </td>
                                    <td>
                                        @if ($role->read == 1)
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input type="checkbox" id="read_{{ $role->id }}" data-type="read"
                                                    class="custom-control-input rolecheck" data-id="{{ $role->id }}"
                                                    @if ($usergroup->hasRead($role->id)) checked @endif>
                                                <label class="custom-control-label"
                                                    for="read_{{ $role->id }}"></label>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($role->create == 1)
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input type="checkbox" id="create_{{ $role->id }}"
                                                    data-type="create" class="custom-control-input rolecheck"
                                                    data-id="{{ $role->id }}"
                                                    @if ($usergroup->hasCreate($role->id)) checked @endif>
                                                <label class="custom-control-label"
                                                    for="create_{{ $role->id }}"></label>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($role->edit == 1)
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input type="checkbox" id="edit_{{ $role->id }}" data-type="edit"
                                                    class="custom-control-input rolecheck"
                                                    data-id="{{ $role->id }}"
                                                    @if ($usergroup->hasEdit($role->id)) checked @endif>
                                                <label class="custom-control-label"
                                                    for="edit_{{ $role->id }}"></label>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($role->delete == 1)
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input type="checkbox" id="delete_{{ $role->id }}"
                                                    data-type="delete" class="custom-control-input rolecheck"
                                                    data-id="{{ $role->id }}"
                                                    @if ($usergroup->hasDelete($role->id)) checked @endif>
                                                <label class="custom-control-label"
                                                    for="delete_{{ $role->id }}"></label>
                                            </div>
                                        @endif
                                    </td>
                                   
                                    <td>
                                        @if ($role->submit == 1)
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input type="checkbox" id="submit_{{ $role->id }}"
                                                    data-type="submit" data-id="{{ $role->id }}"
                                                    class="custom-control-input rolecheck"
                                                    @if ($usergroup->hasSubmit($role->id)) checked @endif>
                                                <label class="custom-control-label"
                                                    for="submit_{{ $role->id }}"></label>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($role->approve == 1)
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input type="checkbox" id="approve_{{ $role->id }}"
                                                    data-type="approve" data-id="{{ $role->id }}"
                                                    class="custom-control-input rolecheck"
                                                    @if ($usergroup->hasApprove($role->id)) checked @endif>
                                                <label class="custom-control-label"
                                                    for="approve_{{ $role->id }}"></label>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($role->unapprove == 1)
                                            <div class="custom-checkbox custom-control custom-control-inline">
                                                <input type="checkbox" id="unapprove_{{ $role->id }}"
                                                    data-type="unapprove" data-id="{{ $role->id }}"
                                                    class="custom-control-input rolecheck"
                                                    @if ($usergroup->hasUnapprove($role->id)) checked @endif>
                                                <label class="custom-control-label"
                                                    for="unapprove_{{ $role->id }}"></label>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- special permissions --}}
                                    <td>
                                        {{-- {{$role->specialpermissions->count()}} --}}
                                        @if ($role->specialpermissions->count() > 0)
                                            @foreach ($role->specialpermissions as $sp)
                                                <div class="custom-checkbox custom-control custom-control-inline">
                                                    <input type="checkbox" id="special_{{ $sp->id }}"
                                                        data-id="{{ $role->id }}" data-spid="{{ $sp->id }}"
                                                        class="custom-control-input rolespecialcheck"
                                                        @if ($usergroup->hasSpecialPermission($role->id, $sp->id)) checked @endif>
                                                    <label class="custom-control-label"
                                                        for="special_{{ $sp->id }}">{{ $sp->description }}</label>
                                                </div><br>
                                            @endforeach
                                        @endif
                                    </td>



                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
