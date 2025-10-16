@extends('layouts.app')

@section('content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Profile Picture -->
                        {{-- <div class="symbol symbol-100px me-5">
                    <img src="{{ asset('uploads/profile/default.jpg') }}" alt="Profile Picture" class="w-100 h-100">
                </div> --}}

                        <!-- Employee Information -->
                        <div>
                            <h3 class="fw-bold text-gray-900">{{ $user->Name }}</h3>
                            {{-- <span class="badge badge-light-{{$user->employee_type == 'IH' ? 'success' : 'danger' }}">
                                {{ config('constants.employee_types.' .$user->employee_type) }}
                            </span> --}}
                        </div>
                    </div>

                    <div class="separator my-4"></div>

                    <!-- Employee Details -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <span class="fw-semibold text-muted">Email</span>
                                <p class="fw-bold text-gray-900">{{ $user->email ?? '---' }}</p>

                            </div>
                            <div class="mb-4">
                                <span class="fw-semibold text-muted">Username</span>
                                <p class="fw-bold text-gray-900">{{ $user->username ?? '---' }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <span class="fw-semibold text-muted">User Group</span>
                                <p class="fw-bold text-gray-900">{{ $user->group->group_name ??'---' }}</p>
                            </div>
                            <div class="mb-4">
                                <span class="fw-semibold text-muted">Status</span>
                                <p class="fw-bold text-gray-900"> <span
                                    class="badge badge-light-{{ config('constants.bs-status-badge.' . $user->Active) }}">
                                    {{ config('constants.ad_status.' . $user->Active) }}
                                </span> </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <span class="fw-semibold text-muted">Employee</span>
                                <p class="fw-bold text-gray-900">{{ $user->employee->display_name ?? '---' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @include('layouts.modal.diti-modal') --}}

        {{-- @include('pages.operations.employees.partials._editemployeemodal')
        @include('layouts.common._modal-delete') --}}
    @endsection



    @section('scripts')
        {{-- @include('layouts.modal.diti-modal-script') --}}
        {{-- <script src="{{ asset('js/submit.js') }}"></script> --}}
        <script src="{{ asset('js/update.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        <script src="{{ asset('js/delete.js') }}"></script>
    @endsection
