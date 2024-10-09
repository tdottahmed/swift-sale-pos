<div class="form-group row">
    <label for="{{ $name }}" class="col-form-label col-lg-3">{{ $label }}</label>
    <div class="col-lg-9">
        <textarea id="{{ $name }}" class="form-control" name="{{ $name }}" cols="{{ $cols }}"
            rows="{{ $rows }}" {{ $attributes }}>{{ $value }}</textarea>
    </div>
</div>
