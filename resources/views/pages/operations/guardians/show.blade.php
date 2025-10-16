@extends('layouts.app')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div id="guardian_show">
            <div id="guardian_show-content">

                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bold text-gray-900 mb-1">
                                    {{ $guardian->name ?? '-' }}
                                </h3>
                                <div class="text-muted">Student: {{ $guardian->student->full_name ?? '-' }}</div>
                                <div class="text-muted">Relation: {{ $guardian->relation ?? '-' }}</div>
                                <div class="text-muted">Email: {{ $guardian->email ?? '-' }}</div>
                                <div class="text-muted">Phone: {{ $guardian->phone ?? $guardian->mobile_no ?? '-' }}</div>
                            </div>
                            <div class="d-flex gap-2">
                                @if($guardian->guardian_pic)
                                    <img src="{{ asset($guardian->guardian_pic) }}" alt="Photo" width="100" class="rounded-circle border">
                                @else
                                    <span class="text-muted">No photo uploaded</span>
                                @endif
                            </div>
                        </div>

                        <div class="separator my-4"></div>

                        {{-- Tabs --}}
                        <ul class="nav nav-tabs mb-4" id="guardianTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal2" type="button" role="tab">Personal</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact2" type="button" role="tab">Contact</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="documents-tab" data-bs-toggle="tab" data-bs-target="#documents2" type="button" role="tab">Documents</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="other-tab" data-bs-toggle="tab" data-bs-target="#other2" type="button" role="tab">Other</button>
                            </li>
                        </ul>

                        <div class="tab-content" id="guardianTabContent">
                            {{-- Personal Tab --}}
                            <div class="tab-pane fade show active" id="personal2" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Guardian Name</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $guardian->name ?? '-' }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Relation</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $guardian->relation ?? '-' }}</p>
                                        </div>
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Occupation</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $guardian->occupation ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <span class="fw-semibold text-muted">Student</span>
                                            <p class="fw-bold text-gray-900 mb-0">{{ $guardian->student->full_name ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Contact Tab --}}
                            <div class="tab-pane fade" id="contact2" role="tabpanel">
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Phone</span>
                                    <p class="fw-bold text-gray-900 mb-0">{{ $guardian->phone ?? $guardian->mobile_no ?? '-' }}</p>
                                </div>
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Mobile No</span>
                                    <p class="fw-bold text-gray-900 mb-0">{{ $guardian->mobile_no ?? '-' }}</p>
                                </div>
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Email</span>
                                    <p class="fw-bold text-gray-900 mb-0">{{ $guardian->email ?? '-' }}</p>
                                </div>
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Address</span>
                                    <p class="fw-bold text-gray-900 mb-0">{{ $guardian->address ?? '-' }}</p>
                                </div>
                            </div>

                            {{-- Documents Tab --}}
                            <div class="tab-pane fade" id="documents2" role="tabpanel">
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Attachment Proof</span>
                                    <p class="fw-bold text-gray-900 mb-0">
                                        @if($guardian->guardian_attachment)
                                            <a href="{{ asset($guardian->guardian_attachment) }}" target="_blank" class="text-primary">View / Download</a>
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Guardian Picture</span>
                                    <p class="fw-bold text-gray-900 mb-0">
                                        @if($guardian->guardian_pic)
                                            <a href="{{ asset($guardian->guardian_pic) }}" target="_blank" class="text-primary">View / Download</a>
                                        @else
                                            -
                                        @endif
                                    </p>
                                </div>
                            </div>

                            {{-- Other Tab --}}
                            <div class="tab-pane fade" id="other2" role="tabpanel">
                                <div class="mb-4">
                                    <span class="fw-semibold text-muted">Remarks</span>
                                    <p class="fw-bold text-gray-900 mb-0">{{ $guardian->remarks ?? '-' }}</p>
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
