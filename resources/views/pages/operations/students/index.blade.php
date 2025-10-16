@extends('layouts.app')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">

        <div class="card">
            <div class="card-body py-4">

                <!-- Search / Filter Form -->
                <form method="GET" class="row g-3 mb-5">
                    <div class="col-md-4">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="form-control form-control-solid" 
                               placeholder="Search student name / email / phone / admission no">
                    </div>
                    <div class="col-md-8 d-flex gap-2">
                        <button class="btn btn-light">Filter</button>
                        <a href="{{ route('students.index') }}" class="btn btn-light-danger">Reset</a>
                        {{-- Uncomment if needed --}}
                        {{-- <a href="{{ route('students.create') }}" class="btn btn-primary ms-auto">
                            <i class="ki-outline ki-plus"></i> New Student
                        </a> --}}
                    </div>
                </form>

                <!-- Students Table -->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th>Name</th>
                                <th>Admission No</th>
                                <th>Contact No</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-700">
                            @forelse($students as $s)
                                <tr>
                                    <td><a class="text-primary" href="{{ route('students.show',$s->id) }}">{{ $s->first_name }} {{ $s->last_name }}</a></td>
                                    <td>{{ $s->admission_no ?? '-' }}</td>
                                    <td>{{ $s->phone ?? '-' }}</td>
                                    <td>{{ $s->email ?? 'Not available' }}</td>
                                    <td class="fw-bold text-gray-900 mb-0">
                                        <span class="badge 
                                            {{ $s->status == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                            {{ config('constants.ad_status.' . $s->status, '-') }}
                                        </span>

                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="menu-link px-3 btn btn-sm btn-light-primary btnAction"
                                            data-url="students/{{ $s->id }}/edit"
                                            data-redirect="students">
                                            <i class="ki-outline ki-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('students.destroy',$s->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-light-danger btndelete"
                                                data-url="students/{{ $s->id }}"
                                                data-actiontype="redirect">
                                                <i class="ki-outline ki-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-10">No students found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($students->hasPages())
                    <div class="pt-4">{{ $students->links() }}</div>
                @endif

            </div>
        </div>

    </div>
</div>

@include('layouts.common._modal-delete')
@endsection

@section('scripts')
<script src="{{ asset('js/update.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>
@endsection
