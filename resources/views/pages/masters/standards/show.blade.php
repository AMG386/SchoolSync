@extends('layouts.app')

@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div id="standard_show">
            <div id="standard_show-content">

                <div class="card shadow-sm mb-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <h3 class="fw-bold text-gray-900 mb-1">
                                    Standard: {{ $standard->standard ?? '-' }}
                                </h3>
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
