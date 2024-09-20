<div class="form-group row">
    <label for="{{ $name }}" class="col-form-label col-sm-3">
        {{ $label() }}
        @if(str_contains($attribute, 'required'))
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="col-sm-9">
        <input type="{{ $type }}" placeholder="{{ $placeholder }}" class="form-control" name="{{ $name }}" value="{{ $value }}" {{ $attribute }}>
    </div>
</div>

