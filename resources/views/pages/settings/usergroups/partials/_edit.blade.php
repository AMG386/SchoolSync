<div class="modal-header">
    <h5 class="modal-title" id="customerModalLabel">Edit User Group</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
    <form id="fmCreate">
        @csrf
        {{ method_field('PUT') }}
        <input type="hidden" id="submiturl" value="usergroups/{{ $usergroup->id }}">
        <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        <div class="row mb-3">
            @include('layouts.common._col-input', [
                'type' => 'text',
                'name' => 'group_name',
                'label' => 'Group Name',
                'value' => $usergroup->group_name,
            ])

        </div>
       
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btnUpdate">Save</button>
        </div>
    </form>
</div>
