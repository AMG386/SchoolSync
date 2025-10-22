@extends('layouts.app')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        
        <!--begin::Toolbar-->
        <div class="d-flex flex-wrap flex-stack mb-6">
            <!--begin::Title-->
            <h3 class="fw-bold my-2">
                Employees Management
                <span class="fs-6 text-gray-500 fw-semibold ms-1">Manage all employees</span>
            </h3>
            <!--end::Title-->
            <!--begin::Controls-->
         
            <!--end::Controls-->
        </div>
        <!--end::Toolbar-->

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
                    <!--begin::Filter button-->
                    <div class="w-150px">
                        <select class="form-select form-select-solid" id="kt_filter_status" data-control="select2" data-placeholder="Filter Status" data-allow-clear="true">
                            <option></option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <!--end::Filter button-->
                    <!--begin::Export dropdown-->
                    <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-outline ki-exit-up fs-2"></i>
                            Export
                        </button>
                        <!--begin::Menu-->
                        <div id="kt_datatable_example_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-export="copy">
                                    Copy to clipboard
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-export="excel">
                                    Export as Excel
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-export="csv">
                                    Export as CSV
                                </a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-export="pdf">
                                    Export as PDF
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Export dropdown-->
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
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_employees_table .form-check-input" value="1" />
                                    </div>
                                </th>
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
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="{{ $employee->id }}" />
                                        </div>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="{{ route('employees.show', $employee->id) }}">
                                                <div class="symbol-label">
                                                    <img src="{{ asset('assets/media/avatars/300-6.jpg') }}" alt="{{ $employee->first_name }}" class="w-100" />
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Employee details-->
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('employees.show', $employee->id) }}" class="text-gray-800 text-hover-primary mb-1 fw-bold">
                                                {{ $employee->first_name }} {{ $employee->last_name }}
                                            </a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">
                                                Employee ID: #{{ $employee->id }}
                                            </span>
                                        </div>
                                        <!--end::Employee details-->
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold">{{ $employee->mobile_number ?? 'N/A' }}</span>
                                            @if($employee->phone_number)
                                                <span class="text-muted fs-7">{{ $employee->phone_number }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $employee->email }}" class="text-gray-600 text-hover-primary fw-bold">
                                            {{ $employee->email ?? 'Not available' }}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold">{{ $employee->address_city ?? 'N/A' }}</span>
                                            @if($employee->address_state)
                                                <span class="text-muted fs-7">{{ $employee->address_state }}</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <!--begin::Badges-->
                                        <div class="badge badge-light-success fw-bold">Active</div>
                                        <!--end::Badges-->
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <i class="ki-outline ki-down fs-5 ms-1"></i>
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('employees.show', $employee->id) }}" class="menu-link px-3">
                                                    View
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 btnAction"
                                                   data-url="employees/{{ $employee->id }}/edit"
                                                   data-redirect="employees">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                                    @csrf 
                                                    @method('DELETE')
                                                    <a href="#" class="menu-link px-3 btndelete text-danger"
                                                       data-url="employees/{{ $employee->id }}"
                                                       data-actiontype="redirect">
                                                        Delete
                                                    </a>
                                                </form>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <!--begin::Empty state-->
                                        <div class="d-flex flex-column flex-center">
                                            <img src="{{ asset('assets/media/illustrations/sketchy-1/5.png') }}" alt="" class="mw-300px">
                                            <div class="fs-1 fw-bolder text-dark mb-4">No employees found.</div>
                                            <div class="fs-6">Start by adding your first employee to the system.</div>
                                        </div>
                                        <!--end::Empty state-->
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

<!--begin::Modals-->
@include('layouts.common._modal-delete')
<!--end::Modals-->
@endsection

@section('scripts')
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Vendors Javascript-->

<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('js/update.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>

<script>
"use strict";

// Class definition
var KTEmployeesList = function () {
    // Define shared variables
    var table = document.getElementById('kt_employees_table');
    var datatable;

    // Private functions
    var initEmployeeTable = function () {
        // Set date data order
        const tableRows = table.querySelectorAll('tbody tr');

        // Init datatable --- more info on datatables: https://datatables.net/manual/
        datatable = $(table).DataTable({
            "info": false,
            "order": [],
            "pageLength": 10,
            "lengthChange": false,
            'columnDefs': [
                { orderable: false, targets: 0 }, // Disable ordering on column 0 (checkbox)
                { orderable: false, targets: 6 }, // Disable ordering on column 6 (actions)
            ]
        });
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function () {
        const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
        filterSearch.addEventListener('keyup', function (e) {
            datatable.search(e.target.value).draw();
        });
    }

    // Filter Datatable
    var handleFilterDatatable = () => {
        // Select filter options
        const filterForm = document.querySelector('[data-kt-docs-table-filter="form"]');
        const filterButton = filterForm.querySelector('[data-kt-docs-table-filter="filter"]');
        const selectOptions = filterForm.querySelectorAll('select');

        // Filter datatable on submit
        filterButton.addEventListener('click', function () {
            var filterString = '';

            // Get filter values
            selectOptions.forEach((item, index) => {
                if (item.value && item.value !== '') {
                    if (index !== 0) {
                        filterString += ' ';
                    }

                    // Build filter value options
                    filterString += item.value;
                }
            });

            // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search(filterString).draw();
        });
    }

    // Reset Filter
    var handleResetForm = () => {
        // Select reset button
        const resetButton = document.querySelector('[data-kt-docs-table-filter="reset"]');

        // Reset datatable
        resetButton.addEventListener('click', function () {
            // Get filter form
            const filterForm = document.querySelector('[data-kt-docs-table-filter="form"]');

            // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
            const selectOptions = filterForm.querySelectorAll('select');
            selectOptions.forEach(select => {
                $(select).val('').trigger('change');
            });

            // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
            datatable.search('').draw();
        });
    }

    // Delete employee
    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = table.querySelectorAll('[data-kt-docs-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function (e) {
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get employee name
                const employeeName = parent.querySelectorAll('td')[1].innerText;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    text: "Are you sure you want to delete " + employeeName + "?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then(function (result) {
                    if (result.value) {
                        Swal.fire({
                            text: "You have deleted " + employeeName + "!.",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        }).then(function () {
                            // Remove current row
                            datatable.row($(parent)).remove().draw();
                        });
                    } else if (result.dismiss === 'cancel') {
                        Swal.fire({
                            text: employeeName + " was not deleted.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary",
                            }
                        });
                    }
                });
            })
        });
    }

    // Public methods
    return {
        init: function () {
            if (!table) {
                return;
            }

            initEmployeeTable();
            handleSearchDatatable();
            handleFilterDatatable();
            handleDeleteRows();
            handleResetForm();
        }
    }
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTEmployeesList.init();
});

// Search functionality
document.getElementById('kt_filter_search').addEventListener('keyup', function(e) {
    const searchValue = e.target.value;
    if (searchValue.length > 2 || searchValue.length === 0) {
        // You can implement AJAX search here
        // For now, we'll use the current URL with search parameter
        const url = new URL(window.location.href);
        if (searchValue.length === 0) {
            url.searchParams.delete('search');
        } else {
            url.searchParams.set('search', searchValue);
        }
        
        // Debounce the search
        clearTimeout(window.searchTimeout);
        window.searchTimeout = setTimeout(() => {
            window.location.href = url.toString();
        }, 500);
    }
});
</script>
<!--end::Custom Javascript-->
