<div class="modal-header">
    <h5 class="modal-title" id="classSubjectModalLabel">Add Subject to Class</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="fmCreateClassSubject">
        @csrf
        <input type="hidden" id="submiturl" value="classsubjects">
        <input type="hidden" name="school_class_id" value="{{ $schoolclass->id }}">
        @if (!empty($redirect))
            <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        @endif

        <div class="row g-3">
            {{-- Subject select --}}
            @include('layouts.common._col-select', [
                'name' => 'subject_id',
                'label' => 'Subject',
                'class' => 'col-md-12',
                'elements' => $subjects, // Pass subjects from controller
                'placeholder' => 'Select Subject',
            ])

            {{-- Teacher select --}}
            @include('layouts.common._col-select', [
                'name' => 'teacher_id',
                'label' => 'Teacher',
                'class' => 'col-md-12',
                'elements' => $teachers, // Pass teachers from controller
                'placeholder' => 'Select Teacher',
            ])
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btnSave">Save</button>
        </div>
    </form>
</div>
