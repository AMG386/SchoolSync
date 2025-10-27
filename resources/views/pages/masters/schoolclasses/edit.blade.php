<div class="modal-header">
    <h5 class="modal-title" id="schoolClassModalLabel">Edit Class</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="fmEditSchoolClass">
        @csrf
        {{ method_field('PUT') }}
        <input type="hidden" id="submiturl" value="schoolclasses/{{ $schoolclass->id }}">
        @if (!empty($redirect))
            <input type="hidden" id="redirecturl" name="redirecturl" value="{{ $redirect }}">
        @endif

                <div class="row g-3">
                    @include('layouts.common._col-select', [
                        'name' => 'class_name',
                        'label' => 'Class Name',
                        'class' => 'col-md-6',
                        'elements' => $class,
                        'value' => old('class_name', $schoolclass->class_name)
                    ])
                    @include('layouts.common._col-input', [
                        'type' => 'text',
                        'name' => 'division',
                        'label' => 'Division',
                        'class' => 'col-md-6',
                        'value' => old('division', $schoolclass->division)
                    ])
                    @include('layouts.common._col-select', [
                        'name' => 'class_teacher',
                        'label' => 'Class Teacher',
                        'class' => 'col-md-12',
                        'elements' => $teachers,
                        'value' => old('class_teacher', $schoolclass->class_teacher),
                    ])
                    @include('layouts.common._col-select', [
                        'name' => 'accademic_year',
                        'label' => 'Accademic Year',
                        'class' => 'col-md-12',
                        'elements' => config('constants.accademic_years'),
                        'value' => old('accademic_year', $schoolclass->accademic_year),
                    ])
                </div>
        

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary btnSave">Save</button>
        </div>
    </form>
</div>
