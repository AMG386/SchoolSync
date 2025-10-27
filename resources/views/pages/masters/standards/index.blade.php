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
                               placeholder="Search standard...">
                    </div>
                    <div class="col-md-8 d-flex gap-2">
                        <button class="btn btn-light">Filter</button>
                        <a href="{{ route('standards.index') }}" class="btn btn-light-danger">Reset</a>     
                    </div>
                </form>

                <!-- Standards Table -->
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th>Standard</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-700">
                            @forelse($standards as $s)
                                <tr>
                                    <td><a class="text-primary" href="{{ route('standards.show', $s->id) }}">{{ $s->standard }}</a></td>
                                    <td class="text-end">
                                        <a href="#" class="menu-link px-3 btn btn-sm btn-light-primary btnAction"
                                            data-url="standards/{{ $s->id }}/edit"
                                            data-redirect="standards">
                                            <i class="ki-outline ki-pencil"></i> Edit
                                        </a>

                                        <!-- <form action="{{ route('standards.destroy', $s->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-light-danger btndelete"
                                                data-url="standards/{{ $s->id }}"
                                                data-actiontype="redirect">
                                                <i class="ki-outline ki-trash"></i> Delete
                                            </button>
                                        </form> -->
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-10">No standards found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($standards->hasPages())
                    <div class="pt-4">{{ $standards->links() }}</div>
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
