@extends('layouts.app')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
      
        <!--begin::Card-->
        <div class="card card-flush">
            <!--begin::Card header-->
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute ms-4"></i>
                        <input type="text" id="kt_filter_search" class="form-control form-control-solid w-250px ps-12" placeholder="Search employees..." value="{{ request('search') }}" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                    <!--begin::Filter Status-->
                    <div class="w-150px">
                        <select class="form-select form-select-solid" id="kt_filter_status" data-control="select2" data-placeholder="Filter Status" data-allow-clear="true">
                            <option></option>
                            <option value="active" @if(request('status') == 'active') selected @endif>Active</option>
                            <option value="inactive" @if(request('status') == 'inactive') selected @endif>Inactive</option>
                        </select>
                    </div>
                    
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-0">

                <!--begin::Table-->
                <div class="table-responsive">
                    <table id="kt_employees_table" class="table align-middle table-row-dashed fs-6 gy-5">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                               
                                <th class="min-w-125px">Employee</th>
                                <th class="min-w-125px">Contact Info</th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Address</th>
                                <th class="min-w-100px">Status</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                            @forelse($employees as $employee)
                                <tr>
                                    
                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="{{ route('employees.show', $employee->id) }}">
                                                <div class="symbol-label">
                                                    <img src="{{ $employee->photo ? asset('storage/'.$employee->photo) : asset('assets/media/avatars/300-6.jpg') }}" alt="{{ $employee->first_name }}" class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('employees.show', $employee->id) }}" class="text-gray-800 text-hover-primary mb-1 fw-bold">
                                                {{ $employee->first_name }} {{ $employee->last_name }}
                                            </a>
                                            <span class="text-muted fw-semibold d-block fs-7">Employee ID: #{{ $employee->employee_id }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold">{{ $employee->mobile_number ?? 'N/A' }}</span>
                                            @if($employee->alternate_contact_number)
                                                <span class="text-muted fs-7">{{ $employee->alternate_contact_number }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $employee->email }}" class="text-gray-600 text-hover-primary fw-bold">
                                            {{ $employee->email ?? 'N/A' }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold">{{ $employee->address_city ?? '-' }}</span>
                                            @if($employee->address_state)
                                                <span class="text-muted fs-7">{{ $employee->address_state }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="badge badge-light-{{ $employee->employee_status == 'inactive' ? 'danger' : 'success' }} fw-bold">
                                            {{ ucfirst($employee->employee_status ?? 'active') }}
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-outline ki-down fs-5 ms-1"></i>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('employees.show', $employee->id) }}" class="menu-link px-3">View</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 btnAction" data-url="employees/{{ $employee->id }}/edit" data-redirect="employees">Edit</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                                    @csrf @method('DELETE')
                                                    <a href="#" class="menu-link px-3 btndelete text-danger" data-url="employees/{{ $employee->id }}" data-actiontype="redirect">Delete</a>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <div class="d-flex flex-column flex-center">
                                            <img src="{{ asset('assets/media/illustrations/sketchy-1/5.png') }}" alt="" class="mw-300px">
                                            <div class="fs-1 fw-bolder text-dark mb-4">No employees found.</div>
                                            <div class="fs-6">Start by adding your first employee to the system.</div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                <!--end::Table-->

                <!--begin::Pagination-->
                @if($employees->hasPages())
                    <div class="row">
                        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            <div class="dataTables_info" role="status" aria-live="polite">
                                Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} of {{ $employees->total() }} entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{ $employees->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                @endif
                <!--end::Pagination-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->

    </div>
</div>

@include('layouts.common._modal-delete')
@endsection

@section('scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/update.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>

<script>
"use strict";

// Initialize Datatable
$(document).ready(function () {
    

    // Search
    $('#kt_filter_search').on('keyup', function () {
        $('#kt_employees_table').DataTable().search(this.value).draw();
    });

    // Filter Status
    $('#kt_filter_status').on('change', function () {
        let val = $(this).val();
        if(val){
            $('#kt_employees_table').DataTable().column(5).search(val, true, false).draw();
        } else {
            $('#kt_employees_table').DataTable().column(5).search('').draw();
        }
    });
});
</script>
@endsection
