<div class="modal-header">
    <h5 class="modal-title" id="customerModalLabel">Create New User</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<form id="fmCreate">
    <div class="modal-body">
        @csrf
        <input type="hidden" id="submiturl" value="users">
        <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        <div class="row mb-3">
            @include('layouts.common._col-input', [
                'type' => 'text',
                'name' => 'Name',
                'label' => 'Name',
                'class' => 'col-md-6',
            ])

            @include('layouts.common._col-input', [
                'type' => 'email',
                'name' => 'email',
                'label' => 'Email',
            ])
        </div>
        <div class="row mb-3">
            @include('layouts.common._col-input', [
                'type' => 'text',
                'name' => 'username',
                'label' => 'Username',
                'class' => 'col-md-6',
            ])


            @include('layouts.common._col-input', [
                'type' => 'text',
                'name' => 'password',
                'label' => 'Password',
                'class' => 'col-md-6',
            ])
        </div>
        <div class="row mb-3">
           
            @include('layouts.common._col-select', [
                'name' => 'group_id',
                'label' => 'User Group',
                'elements' => $usergroups,
                'class' => 'col-md-6',
            ])
             @include('layouts.common._col-select', [
                'name' => 'Active',
                'label' => 'Status',
                'elements' => config('constants.ad_status'),
                'class' => 'col-md-6',
            ])

        </div>
        <hr>
        <h5 class="card-title align-items-start flex-column mb-3">
            <span class="card-label fw-bold text-gray-900">If the user is an Employee</span>
            <span class="text-muted mt-1 fw-semibold fs-7">(Optional)</span>
        </h5>
        <div class="row mb-3">
            @include('layouts.common._col-select', [
                'name' => 'EmpID',
                'label' => 'Select Employee',
                'elements' => $employees,
                'class' => 'col-md-6',
            ])
        </div>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary btnSave">Save</button>
    </div>
</form>
</div>
