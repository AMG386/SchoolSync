<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

        <div class="card">
            <div class="card-body py-4">

                <!-- Add Create Button -->
                <div class="d-flex justify-content-end mb-4">
                    <a href="#" 
                       class="btn btn-sm btn-primary btnAction"
                       data-url="{{ route('classsubjects.create', ['schoolclass_id' => $schoolclass->id]) }}"
                       data-redirect="schoolclasses/{{ $schoolclass->id }}">
                        <i class="ki-outline ki-plus"></i> Add Class Subject
                    </a>
                </div>

                <!-- Class Subjects Table -->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-700">
                            @forelse($classSubjects as $cs)
                                <tr>
                                    <td>{{ $cs->subject->subject_name ?? '-' }}</td>
                                    <td>{{ $cs->teacher->full_name ?? '-' }}</td>
                                    <td class="text-end">
                                        <a href="#" 
                                           class="menu-link px-3 btn btn-sm btn-light-primary btnAction"
                                           data-url="{{ route('classsubjects.edit', $cs->id) }}"
                                           data-redirect="schoolclasses/{{ $schoolclass->id }}">
                                            <i class="ki-outline ki-pencil"></i> Edit
                                        </a>

           

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-10">
                                        No subjects assigned yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

@include('layouts.common._modal-delete')

@section('scripts')
<script src="{{ asset('js/update.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>
@endsection
