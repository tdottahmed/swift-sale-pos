<div>
    <select id="branch" class="form-control select select-search" name="branch_id" {{ $attributes }}>
        <option value="">Select Branch</option>
        @foreach ($branches as $branch)
            <option value="{{ $branch->id }}" {{ $selectedBranchId == $branch->id ? 'selected' : '' }}>
                {{ $branch->name }}
            </option>
        @endforeach
    </select>
</div>
