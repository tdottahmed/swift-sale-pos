<div class="form-group row">
    <label for="{{ $name }}" class="col-form-label col-sm-3">{{ $label }}</label>
    <div class="col-sm-9">
        <select id="{{ $name }}" class="form-control select select-search" name="{{ $name }}" {{ $attributes }}>
            <option value="">Select {{ ucwords(str_replace('_', ' ', $name)) }}</option>
            @foreach ($options as $optionValue => $optionLabel)
                <option value="{{ $optionValue }}">{{ $optionLabel }}</option>
            @endforeach
        </select>
    </div>
</div>

{{-- How to use this component --}}
{{-- <x-select-input name="applicable_tax" label="Applicable Tax" :options="$applicableTaxes" class="select select-search" /> --}}
