<div class="form-group row">
    <label for="{{ $name }}" class="col-form-label col-sm-3">{{ ucwords($name) }}</label>
    <div class="col-sm-9">
        <input type="{{ $type }}" placeholder="{{ $placeholder }}" class="form-control" name="{{ $name }}" value="{{$value}}" {{$attribute}}>
    </div>
</div>
