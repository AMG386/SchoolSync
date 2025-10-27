<div class="{{ $class ?? 'col-md-6' }}">
    <label for="{{ $name }}" class="form-label">
        {!! $label !!}
    </label>

    <select
        name="{{ $name }}[]"
        id="{{ $name }}"
        multiple
        class="form-select form-select-solid"
        @if(isset($disabled) && $disabled) disabled @endif
    >
        @if(isset($all) && $all)
            <option value="All"
                @if(isset($selected) && is_array($selected) && in_array('All', $selected)) selected @endif
            >All</option>
        @endif

        @if(isset($elements) && is_iterable($elements))
            @foreach ($elements as $val => $key)
                <option value="{{ $val }}"
                    @if(isset($selected) && is_array($selected) && in_array($val, $selected)) selected @endif
                >
                    {{ $key }}
                </option>
            @endforeach
        @endif
    </select>

    <label class="form-label font-normal text-danger error {{ $name }}_error d-none"
        id="{{ $name }}_error">
    </label>
</div>
