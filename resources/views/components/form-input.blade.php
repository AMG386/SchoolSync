<!--begin::Input group-->
<div class="{{ $class ?? 'col-md-6' }}">
    <!--begin::Label-->
    <label class="required fw-semibold fs-6 mb-2">{{ $label ?? 'Label' }}</label>
    <!--end::Label-->
    <!--begin::Input-->
    <div class="position-relative">
        @if(isset($icon))
            <i class="ki-outline {{ $icon }} fs-2 position-absolute top-50 translate-middle-y ms-4"></i>
        @endif
        <input type="{{ $type ?? 'text' }}" 
               name="{{ $name ?? 'field' }}" 
               id="{{ $id ?? $name ?? 'field' }}"
               class="form-control form-control-solid {{ isset($icon) ? 'ps-12' : '' }} {{ $inputClass ?? '' }}" 
               placeholder="{{ $placeholder ?? $label ?? 'Enter value' }}" 
               value="{{ $value ?? old($name ?? 'field') }}"
               {{ isset($required) && $required ? 'required' : '' }}
               {{ isset($readonly) && $readonly ? 'readonly' : '' }}
               {{ isset($disabled) && $disabled ? 'disabled' : '' }}
               {{ isset($min) ? 'min=' . $min : '' }}
               {{ isset($max) ? 'max=' . $max : '' }}
               {{ isset($step) ? 'step=' . $step : '' }}
               {{ isset($pattern) ? 'pattern=' . $pattern : '' }}
               {{ isset($autocomplete) ? 'autocomplete=' . $autocomplete : '' }}
        />
    </div>
    <!--end::Input-->
    @if(isset($help))
        <!--begin::Hint-->
        <div class="form-text">{{ $help }}</div>
        <!--end::Hint-->
    @endif
    @error($name ?? 'field')
        <!--begin::Error-->
        <div class="fv-plugins-message-container">
            <div class="fv-help-block">
                <span role="alert" class="text-danger">{{ $message }}</span>
            </div>
        </div>
        <!--end::Error-->
    @enderror
</div>
<!--end::Input group-->