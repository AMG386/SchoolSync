@extends('layouts.app')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">

            <!--begin::Toolbar-->
            <div class="d-flex flex-wrap flex-stack mb-6">
                <!--begin::Title-->
                <h3 class="fw-bold my-2">
                    Students Management
                    <span class="fs-6 text-gray-500 fw-semibold ms-1">Manage all students</span>
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
                            <input type="text" id="kt_filter_search"
                                class="form-control form-control-solid w-250px ps-12" placeholder="Search students..."
                                value="{{ request('search') }}" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <!--begin::Filter button-->
                        <div class="w-150px">
                            <select class="form-select form-select-solid" id="kt_filter_status" data-control="select2"
                                data-placeholder="Filter Status" data-allow-clear="true">
                                <option></option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="graduated">Graduated</option>
                            </select>
                        </div>
                        <!--end::Filter button-->
                        <!--begin::Export dropdown-->
                        <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                <i class="ki-outline ki-exit-up fs-2"></i>
                                Export
                            </button>
                            <!--begin::Menu-->
                            <div id="kt_datatable_export_menu"
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4"
                                data-kt-menu="true">
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
                        <table id="kt_students_table" class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table head-->
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                data-kt-check-target="#kt_students_table .form-check-input"
                                                value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px">Student</th>
                                    <th class="min-w-125px">Admission No</th>
                                    <th class="min-w-125px">Contact Info</th>
                                    <th class="min-w-125px">Email</th>
                                    <th class="min-w-100px">Status</th>
                                    <th class="text-end min-w-70px">Actions</th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-semibold text-gray-600">
                                @forelse($students as $student)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $student->id }}" />
                                            </div>
                                        </td>
                                        <td class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="{{ route('students.show', $student->id) }}">
                                                    <div class="symbol-label">
                                                        <img src="{{ asset('assets/media/avatars/300-3.jpg') }}"
                                                            alt="{{ $student->first_name }}" class="w-100" />
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Student details-->
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('students.show', $student->id) }}"
                                                    class="text-gray-800 text-hover-primary mb-1 fw-bold">
                                                    {{ $student->first_name }} {{ $student->last_name }}
                                                </a>
                                                <span class="text-muted fw-semibold text-muted d-block fs-7">
                                                    Student ID: #{{ $student->id }}
                                                </span>
                                            </div>
                                            <!--end::Student details-->
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span
                                                    class="fw-bold text-primary">{{ $student->admission_no ?? 'N/A' }}</span>
                                                @if ($student->class)
                                                    <span class="text-muted fs-7">{{ $student->class }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-bold">{{ $student->phone ?? 'N/A' }}</span>
                                                @if ($student->mobile_number)
                                                    <span class="text-muted fs-7">{{ $student->mobile_number }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $student->email }}"
                                                class="text-gray-600 text-hover-primary fw-bold">
                                                {{ $student->email ?? 'Not available' }}
                                            </a>
                                        </td>
                                        <td>
                                            <!--begin::Badges-->
                                            <div
                                                class="badge 
                                            {{ $student->status == 1 ? 'badge-light-success' : 'badge-light-danger' }} fw-bold">
                                                {{ config('constants.ad_status.' . $student->status, 'Unknown') }}
                                            </div>
                                            <!--end::Badges-->
                                        </td>
                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-outline ki-down fs-5 ms-1"></i>
                                            </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="{{ route('students.show', $student->id) }}"
                                                        class="menu-link px-3">
                                                        View
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3 btnAction"
                                                        data-url="students/{{ $student->id }}/edit"
                                                        data-redirect="students">
                                                        Edit
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <form action="{{ route('students.destroy', $student->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#" class="menu-link px-3 btndelete text-danger"
                                                            data-url="students/{{ $student->id }}"
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
                                                <img src="{{ asset('assets/media/illustrations/sketchy-1/5.png') }}"
                                                    alt="" class="mw-300px">
                                                <div class="fs-1 fw-bolder text-dark mb-4">No students found.</div>
                                                <div class="fs-6">Start by adding your first student to the system.</div>
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
                @if ($students->hasPages())
                    <div class="row">
                        <div
                            class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            <div class="dataTables_info" role="status" aria-live="polite">
                                Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of
                                {{ $students->total() }} entries
                            </div>
                        </div>
                        <div
                            class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dataTables_paginate paging_simple_numbers">
                                {{ $students->links('pagination::bootstrap-4') }}
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
    <!-- Edit/Create Modal for AJAX -->
    <div class="modal fade" id="form-modal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div id="fmodal-content">
                    <!-- AJAX content will be loaded here -->
                </div>
            </div>
        </div>
    </div>
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

  @endsection