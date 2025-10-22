<!--begin::Input group-->
<div class="{{ $class ?? 'col-md-6' }}">
    <!--begin::Label-->
    <label class="{{ isset($required) && $required ? 'required' : '' }} fw-semibold fs-6 mb-2">{{ $label ?? 'Label' }}</label>
    <!--end::Label-->
    <!--begin::Select-->
    <select name="{{ $name ?? 'field' }}" 
            id="{{ $id ?? $name ?? 'field' }}"
            class="form-select form-select-solid {{ $selectClass ?? '' }}" 
            data-control="select2" 
            data-placeholder="{{ $placeholder ?? 'Select an option' }}"
            {{ isset($multiple) && $multiple ? 'multiple' : '' }}
            {{ isset($required) && $required ? 'required' : '' }}
            {{ isset($disabled) && $disabled ? 'disabled' : '' }}
            data-allow-clear="{{ isset($allowClear) && $allowClear ? 'true' : 'false' }}">
        
        @if(!isset($multiple) || !$multiple)
            <option value="">{{ $placeholder ?? 'Select an option' }}</option>
        @endif
        
        @if(isset($options) && is_array($options))
            @foreach($options as $optionValue => $optionText)
                <option value="{{ $optionValue }}" 
                        {{ (string)$optionValue === (string)($value ?? old($name ?? 'field')) ? 'selected' : '' }}>
                    {{ $optionText }}
                </option>
            @endforeach
        @endif
    </select>
    <!--end::Select-->
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