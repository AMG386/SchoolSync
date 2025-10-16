<div class="modal-header">
    <h5 class="modal-title" id="customerModalLabel">New User Group</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>
<div class="modal-body">
    <form id="fmCreate">
        @csrf
        <input type="hidden" id="submiturl" value="usergroups">
        <div class="row mb-3">
            @include('layouts.common._col-input', [
                'type' => 'text',
                'name' => 'group_name',
                'label' => 'Group Name',
                'class' => 'col-md-6',
            ])

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btnSave">Save</button>
        </div>
    </form>
</div>
