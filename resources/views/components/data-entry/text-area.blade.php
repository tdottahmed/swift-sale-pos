<div class="form-group row">
    <label for="{{ $name }}" class="col-form-label col-sm-3">{{ $label }}</label>
    <div class="col-sm-9">
        <textarea id="{{ $name }}" class="form-control" name="{{ $name }}" placeholder="{{ $placeholder }}" cols="{{ $cols }}" rows="{{ $rows }}" {{ $attributes }}></textarea>
    </div>
</div>
