@extends('layouts.app')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card">
                {{-- <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-3"></i>
                        <input type="text" data-datatable-search="#employee_table"
                            class="form-control form-control-solid w-250px ps-10" placeholder="Search Employees" />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#ditimodal">Add Employee</button>
                    </div>
                </div>
            </div> --}}

                <div class="card-body py-4">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="user_table">
                        <thead>
                            <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-200px">Name</th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Employee</th>
                                <th class="min-w-125px">Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex flex-column">
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="text-gray-800 text-hover-primary">
                                                    {{ $user->Name }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email??'---' }}</td>
                                    <td>{{ $user->employee->display_name??'---' }}</td>
                                    <td>
                                        <span
                                            class="badge badge-light-{{ config('constants.bs-status-badge.' . $user->Active) }}">
                                            {{ config('constants.ad_status.' . $user->Active) }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#"
                                            class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="menu-link px-3">View</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 btnAction"
                                                    data-url="users/{{ $user->id }}/edit" data-redirect="users">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3 btndelete"
                                                    data-url='users/{{ $user->id }}' data-actiontype="redirect"
                                                    data-kt-user-table-filter="delete_row">Delete</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>

                                    {{-- 
                                <td class="text-end">
                                    <a href="{{ route('employees.show',$user->id) }}"
                                        class="btn btn-sm btn-light-primary me-2">View</a>
                                    <button type="button" class="btn btn-sm btn-light-warning me-2 btnEdit"
                                        data-id="{{$user->id }}"
                                        data-url="{{ route('employees.edit',$user->id) }}" data-bs-toggle="modal"
                                        data-bs-target="#editEmployeeModal">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>

                                    <!-- Corrected Delete Button -->
                                    <button type="button" class="btn btn-sm btn-light-danger btnDelete"
                                        data-id="{{$user->id }}"
                                        data-url="{{ route('employees.destroy',$user->id) }}"
                                        data-bs-toggle="modal" data-bs-target="#deleteConfirmModal">
                                        Delete
                                    </button>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    {{-- @include('layouts.modal.diti-modal') --}}
    @include('layouts.common._modal-delete')
@endsection

@section('scripts')
    {{-- @include('layouts.modal.diti-modal-script') --}}

    {{-- <script src="{{ asset('js/submit.js') }}"></script> --}}
    <script src="{{ asset('js/update.js') }}"></script>
    <script src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
