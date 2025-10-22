<!--begin::Toolbar-->
<div class="d-flex flex-wrap flex-stack mb-6">
    <!--begin::Title-->
    <h3 class="fw-bold my-2">
        {{ $title ?? 'Page Title' }}
        @if(isset($subtitle))
            <span class="fs-6 text-gray-500 fw-semibold ms-1">{{ $subtitle }}</span>
        @endif
    </h3>
    <!--end::Title-->
    
    <!--begin::Controls-->
    @if(isset($actions) || isset($primaryAction))
        <div class="d-flex align-items-center my-2 gap-2">
            @if(isset($actions) && is_array($actions))
                @foreach($actions as $action)
                    <a href="{{ $action['url'] ?? '#' }}" 
                       class="btn btn-sm {{ $action['class'] ?? 'btn-light' }}"
                       @if(isset($action['attributes']))
                           @foreach($action['attributes'] as $attr => $value)
                               {{ $attr }}="{{ $value }}"
                           @endforeach
                       @endif>
                        @if(isset($action['icon']))
                            <i class="ki-outline {{ $action['icon'] }} fs-2"></i>
                        @endif
                        {{ $action['text'] ?? 'Action' }}
                    </a>
                @endforeach
            @endif
            
            @if(isset($primaryAction))
                <a href="{{ $primaryAction['url'] ?? '#' }}" 
                   class="btn btn-sm {{ $primaryAction['class'] ?? 'btn-primary' }}"
                   @if(isset($primaryAction['attributes']))
                       @foreach($primaryAction['attributes'] as $attr => $value)
                           {{ $attr }}="{{ $value }}"
                       @endforeach
                   @endif>
                    @if(isset($primaryAction['icon']))
                        <i class="ki-outline {{ $primaryAction['icon'] }} fs-2"></i>
                    @endif
                    {{ $primaryAction['text'] ?? 'Primary Action' }}
                </a>
            @endif
        </div>
    @endif
    <!--end::Controls-->
</div>
<!--end::Toolbar-->

@if(isset($breadcrumbs) && is_array($breadcrumbs))
    <!--begin::Breadcrumb-->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-separatorless fw-semibold">
                @foreach($breadcrumbs as $breadcrumb)
                    @if($loop->last)
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">{{ $breadcrumb['text'] ?? '' }}</li>
                    @else
                        <li class="breadcrumb-item">
                            @if(isset($breadcrumb['url']))
                                <a href="{{ $breadcrumb['url'] }}" class="text-muted text-hover-primary">{{ $breadcrumb['text'] ?? '' }}</a>
                            @else
                                <span class="text-muted">{{ $breadcrumb['text'] ?? '' }}</span>
                            @endif
                        </li>
                        <li class="breadcrumb-item">
                            <i class="ki-outline ki-right fs-4 text-gray-700 mx-n1"></i>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
    <!--end::Breadcrumb-->
@endif