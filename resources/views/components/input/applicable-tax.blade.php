<div>
    <select id="applicable_tax" class="form-control select select-search" name="applicable_tax" {{ $attributes }}>
        <option value="">Applicable Tax</option>
        @foreach ($applicableTaxes as $applicabletax)
            <option value="{{ $applicabletax->value }}">
                {{ $applicabletax->title }}
            </option>
        @endforeach
    </select>
</div>
