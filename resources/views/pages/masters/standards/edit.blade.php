<div class="modal-header">
    <h5 class="modal-title" id="standardModalLabel">Edit Standard</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="fmEditStandard">
        @csrf
        {{ method_field('PUT') }}

        <input type="hidden" id="submiturl" value="standards/{{ $standard->id }}">
        @if (!empty($redirect))
            <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        @endif

        <div class="row g-3">
            @include('layouts.common._col-input', [
                'type' => 'text',
                'name' => 'standard',
                'label' => 'Standard',
                'class' => 'col-md-12',
                'value' => old('standard', $standard->standard)
            ])
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btnSave">Save</button>
        </div>
    </form>
</div>
