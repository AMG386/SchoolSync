<div class="modal-header">
    <h5 class="modal-title">Edit Subject</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="fmEditSubject">
        @csrf
        {{ method_field('PUT') }}
        <input type="hidden" id="submiturl" value="subjects/{{ $subject->id }}">
        @if(!empty($redirect))
            <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        @endif

        <div class="row g-3">
            @include('layouts.common._col-input', [
                'type' => 'text',
                'name' => 'subject_name',
                'label' => 'Subject Name',
                'class' => 'col-md-6',
                'value' => old('subject_name', $subject->subject_name),
            ])
            @include('layouts.common._col-input', [
                'type' => 'text',
                'name' => 'subject_remarks',
                'label' => 'Remarks',
                'class' => 'col-md-6',
                'value' => old('subject_remarks', $subject->subject_remarks),
            ])
        </div>

        <div class="modal-footer mt-3">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btnSave">Update</button>
        </div>
    </form>
</div>
