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
                               placeholder="Search guardian name / email / phone">
                    </div>
                    <div class="col-md-8 d-flex gap-2">
                        <button class="btn btn-light">Filter</button>
                        <a href="{{ route('guardians.index') }}" class="btn btn-light-danger">Reset</a>
                        
                    </div>
                </form>

                <!-- Guardians Table -->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th>Name</th>
                                <th>Student</th>
                                <th>Relation</th>
                                <th>Contact No</th>
                                <th>Email</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-700">
                            @forelse($guardians as $g)
                                <tr>
                                     <td><a class="text-primary" href="{{ route('guardians.show',$g->id) }}">{{ $g->name }}</td>
                                    <td>{{ $g->student->first_name ?? '-' }} {{ $g->student->last_name ?? '' }}</td>
                                    <td>{{ $g->relation ?? '-' }}</td>
                                    <td>{{ $g->phone ?? $g->mobile_no ?? '-' }}</td>
                                    <td>{{ $g->email ?? 'Not available' }}</td>
                                    <td class="text-end">
                                        <a href="#" class="menu-link px-3 btn btn-sm btn-light-primary btnAction"
                                            data-url="guardians/{{ $g->id }}/edit"
                                            data-redirect="guardians">
                                            <i class="ki-outline ki-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('guardians.destroy',$g->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-light-danger btndelete"
                                                data-url="guardians/{{ $g->id }}"
                                                data-actiontype="redirect">
                                                <i class="ki-outline ki-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-10">No guardians found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($guardians->hasPages())
                    <div class="pt-4">{{ $guardians->links() }}</div>
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
