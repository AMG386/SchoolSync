@extends('layouts.app')

@section('content')
<div class="app-content flex-column-fluid">
    <div class="app-container container-xxl">
    <div class="card">
            <div class="card-body py-4">
        <!-- Search / Filter Form -->
        <form method="GET" class="row g-3 mb-5">
            <div class="col-md-4">
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="form-control form-control-solid" 
                       placeholder="Search subject name / remarks">
            </div>
            <div class="col-md-8 d-flex gap-2">
                <button class="btn btn-light">Filter</button>
                <a href="{{ route('subjects.index') }}" class="btn btn-light-danger">Reset</a>
            </div>
        </form>

        <!-- Subjects Table -->
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                <thead>
                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                        <th>Subject Name</th>
                        <th>Remarks</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-700">
                    @forelse($subjects as $s)
                        <tr>
                            <td><a class="text-primary" href="{{ route('subjects.show',$s->id) }}">{{ $s->subject_name }}</a></td>
                            <td>{{ $s->subject_remarks ?? '-' }}</td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-light-primary btnAction"
                                   data-url="subjects/{{ $s->id }}/edit"
                                   data-redirect="subjects">
                                    <i class="ki-outline ki-pencil"></i> Edit
                                </a>
                                <form action="{{ route('subjects.destroy',$s->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-light-danger btndelete"
                                            data-url="subjects/{{ $s->id }}"
                                            data-actiontype="redirect">
                                        <i class="ki-outline ki-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-10">No subjects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($subjects->hasPages())
            <div class="pt-4">{{ $subjects->links() }}</div>
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
