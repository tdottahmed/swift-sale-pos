<div class="form-group row">
    <label for="{{ $name }}" class="col-form-label col-lg-3">{{ $label }}</label>
    <div class="col-lg-9">
        <select id="{{ $name }}" class="form-control select select-search" name="{{ $name }}" {{ $attributes }}>
            <option value="">Select {{ $label }}</option>
            @foreach ($options as  $option)
                <option value="{{ $option->id }}" {{ $option->id == $selected ? 'selected' : '' }}>{{ $option->title }}</option>
            @endforeach
        </select>
    </div>
</div>

{{-- How to use this component --}}
{{-- <x-select-input name="applicable_tax" label="Applicable Tax" :options="$applicableTaxes" class="select select-search" /> --}}

