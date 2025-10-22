<!--begin::Card widget 4-->
<div class="card card-flush h-md-50 mb-5 mb-xl-10">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Info-->
            <div class="d-flex align-items-center">
                <!--begin::Currency-->
                <span class="fs-4 fw-semibold text-gray-500 me-1 align-self-start">{{ $currency ?? '' }}</span>
                <!--end::Currency-->
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $amount ?? '0' }}</span>
                <!--end::Amount-->
                <!--begin::Badge-->
                <span class="badge badge-light-{{ $badgeColor ?? 'success' }} fs-base">
                    <i class="ki-outline ki-arrow-{{ $trend ?? 'up' }} fs-5 text-{{ $badgeColor ?? 'success' }} ms-n1"></i>
                    {{ $percentage ?? '0' }}%
                </span>
                <!--end::Badge-->
            </div>
            <!--end::Info-->
            <!--begin::Subtitle-->
            <span class="text-gray-500 pt-1 fw-semibold fs-6">{{ $title ?? 'Default Title' }}</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->
    <!--begin::Card body-->
    <div class="card-body pt-2 pb-4 d-flex align-items-center">
        @if(isset($chartId))
            <!--begin::Chart-->
            <div class="d-flex flex-center me-5 pt-2">
                <div id="{{ $chartId }}" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11"></div>
            </div>
            <!--end::Chart-->
        @endif
        <!--begin::Labels-->
        <div class="d-flex flex-column content-justify-center w-100">
            @if(isset($labels))
                @foreach($labels as $label)
                    <!--begin::Label-->
                    <div class="d-flex fs-6 fw-semibold align-items-center">
                        <!--begin::Bullet-->
                        <div class="bullet w-8px h-6px rounded-2 bg-{{ $label['color'] ?? 'primary' }} me-3"></div>
                        <!--end::Bullet-->
                        <!--begin::Label-->
                        <div class="text-gray-500 flex-grow-1 me-4">{{ $label['text'] ?? '' }}</div>
                        <!--end::Label-->
                        <!--begin::Stats-->
                        <div class="fw-bolder text-gray-700 text-xxl-end">{{ $label['value'] ?? '0' }}</div>
                        <!--end::Stats-->
                    </div>
                    <!--end::Label-->
                @endforeach
            @endif
        </div>
        <!--end::Labels-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card widget 4-->