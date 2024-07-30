<div class="row align-items-center">
    <div class="col-lg-3">
        <label for="{{ $name }}" class="form-label">{{ __($label) }}</label>
    </div>
    <div class="col-lg-9 d-flex align-items-center">
        <select name="{{ $name }}" id="{{ $name }}" class="form-control select-search">
            <option value="">-- Please select --</option>
            @foreach ($options as $option)
                <option value="{{ $option->title }}" 
                    {{ $option->title == old($name, $selected) || $option->id == old($name, $selected) ? 'selected' : '' }}>
                    {{ $option->title }}
                </option>
            @endforeach
        </select>
        <span class="btn btn-success cursor-pointer" onclick="openModal('{{ $createRoute }}', '{{ $createLabel }}')">
            <i class="icon icon-plus3"></i>
        </span>
    </div>
</div>