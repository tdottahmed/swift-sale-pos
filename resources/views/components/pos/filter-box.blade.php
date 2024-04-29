<div class="row">
    <div class="col-lg-4">
        <select name="category" id="category" class="form-control select-search">
            <option value="">Select Category</option>
            @foreach ($categories as $category )
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Product by sku"
                id="sku">
            <span class="input-group-append bg-indigo-600">
                <span class="input-group-text"><i class="icon-search4"></i></span>
            </span>
        </div>
    </div>
    <div class="col-lg-4">
        <select name="brand" id="brand" class="form-control select-search">
            <option value="">Select Brand</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->title }}">{{ $brand->title }}</option>
            @endforeach
        </select>
    </div>
</div>