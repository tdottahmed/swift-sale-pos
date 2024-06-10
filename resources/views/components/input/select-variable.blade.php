<div>
    <select id="variation_name" class="form-control select select-search" name="variation_name" {{ $attributes }}>
        <option value="">Select Varaiable</option>
        @foreach ($variables as $variable)
            <option value="{{ $variable->title }}">
                {{ $variable->title }}
            </option>
        @endforeach
    </select>
</div>