@extends('layouts.app')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div id="student_show">
            <div id="student_show-content">

                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bold text-gray-900 mb-1">
                                    {{ $student->full_name ?? '-' }}
                                </h3>
                                <div class="text-muted">Admission No: {{ $student->admission_no ?? '-' }}</div>
                                <div class="text-muted">Email: {{ $student->email ?? '-' }}</div>
                                <div class="text-muted">Phone: {{ $student->phone ?? '-' }}</div>
                            </div>
                            <div class="d-flex gap-2">
                                @if($student->photo)
                                    <img src="{{ asset($student->photo) }}" alt="Photo" width="100" class="rounded-circle border">
                                @else
                                    <span class="text-muted">No photo uploaded</span>
                                @endif
                            </div>
                        </div>

                        <div class="separator my-4"></div>

                        {{-- Tabs --}}
                        <ul class="nav nav-tabs mb-4" id="studentTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal1" type="button" role="tab">Personal</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address1" type="button" role="tab">Address</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents1" type="button" role="tab">Documents</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other1" type="button" role="tab">Other</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="studentTabContent">
                            {{-- Personal Tab --}}
                            <div class="tab-pane fade show active" id="personal1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">First Name</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $student->first_name ?? '-' }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Last Name</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $student->last_name ?? '-' }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Gender</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $student->gender ?? '-' }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Date of Birth</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $student->dob ?? '-' }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Admission Date</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $student->admission_date ?? '-' }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Status</span>
                                            <p class="fw-bold text-gray-900 mb-0">
                                        <span class="badge 
                                            {{ $student->status == 1 ? 'badge-light-success' : 'badge-light-danger' }}">
                                            {{ config('constants.ad_status.' . $student->status, '-') }}
                                        </span></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Email</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $student->email ?? '-' }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Phone</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $student->phone ?? '-' }}</p>
                                        </div>
                                        
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Aadhaar Number</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $student->aadhaar_number ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Address Tab --}}
                            <div class="tab-pane fade" id="address1" role="tabpanel">
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Address</span>
                                    <p class="fw-bold text-gray-900 mb-0">
                                        {{ $student->address ?? '' }},
                                        {{ $student->city ?? '' }},
                                        {{ $student->state ?? '' }},
                                        {{ $student->country ?? '' }}
                                    </p>
                                </div>
                            </div>

                            {{-- Documents Tab --}}
                            <div class="tab-pane fade" id="documents1" role="tabpanel">
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Aadhaar Card</span>
                                    <p class="fw-bold text-gray-900 mb-0">
                                        @if($student->aadhaar_card)
                                            <a href="{{ asset($student->aadhaar_card) }}" target="_blank" class="text-primary">View / Download</a>
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Documents</span>
                                    <p class="fw-bold text-gray-900 mb-0">
                                        @if($student->documents)
                                            <a href="{{ asset($student->documents) }}" target="_blank" class="text-primary">View / Download</a>
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                            </div>

                            {{-- Other Tab --}}
                            <div class="tab-pane fade" id="other1" role="tabpanel">
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Remarks</span>
                                    <p class="fw-bold text-gray-900 mb-0">{{ $student->remarks ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/update.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/delete.js') }}"></script>
@endsection
