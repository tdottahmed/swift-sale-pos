<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading"> 
            {{ __('Edit Product Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('product.update', $product->id) }} " method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control"
                                    value="{{ $product->name ? $product->name : '' }}" name="name" id="name">
                            </div>
                            <div class="col-lg-6">
                                <label for="sku">Sku Code:</label>
                                <div class="d-flex align-items-center gap-1">
                                    <input type="text" class="form-control" name="sku" id="sku"
                                        value="{{ $product->sku ? $product->sku : '' }}">
                                    <span class="btn btn-success generate-sku"><i class="icon icon-sync"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="">{{ __('Select Category') }}</label>
                                <select name="category" id="category" class="form-control select-search">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->title }}"
                                            {{ $category->id == $category->category_id || $category->title == $product->category ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">{{ __('Select Sub Category') }}</label>
                                <select name="sub_category" id="sub_category" class="form-control select-search">
                                    @foreach ($subCategories as $subCategory)
                                        <option
                                            value="{{ $subCategory->title }} {{ $subCategory->id == $product->subCategory_id || $subCategory->title == $product->sub_category ? 'selected' : '' }}
                                            ">
                                            {{ $subCategory->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="">{{ __('Select Brand') }}</label>
                                <select name="brand" id="brand" class="form-control select-search">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->title }}"
                                            {{ $brand->id == $product->brand_id || $brand->title == $product->brand ? 'selected' : '' }}>
                                            {{ $brand->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">{{ __('Select Barcode Type') }}</label>
                                <select name="barcode_type_id" id="barcode_type_id" class="form-control select-search">
                                    @foreach ($barcodeTypes as $barcodeType)
                                        <option value="{{ $barcodeType->id }}"
                                            {{ $barcodeType->id == $product->barcode_type_id || $barcodeType->title == $product->barcode_type ? 'selected' : '' }}>
                                            {{ $barcodeType->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="branch_id">Product Location:</label>
                                <x-input.branch-select :selectedBranchId="auth()->user()->branch_id" />
                            </div>
                            <div class="col-lg-6">
                                <label for="">{{ __('Select Unit') }}</label>
                                <select name="unit" id="unit" class="form-control select-search">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->title }}"
                                            {{ $unit->id == $product->unit_id || $unit->title == $product->unit ? 'selected' : '' }}>
                                            {{ $unit->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="description">Product Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{!$product->description!}</textarea>
                            </div>
                            <div class="col-lg-6">
                                <label class="font-weight-semibold">Upload Image</label>
                                <input type="file" name="image" class="file-input"
                                    data-browse-class="btn btn-primary btn-block" data-show-remove="false"
                                    data-show-caption="false" data-show-upload="false" data-fouc>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" name="manage_gallery"
                                            value="1" id="manage_galery" data-fouc
                                            {{ $product->is_gallery ? 'checked' : '' }}>
                                        Image Galery
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="not_for_selling" data-fouc
                                            {{ $product->not_for_selling ? 'checked' : '' }}>
                                        Not for Sale
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="manage_stock" id="manage_stock" data-fouc
                                            {{ $product->manage_stock ? 'checked' : '' }}>
                                        Manage Stock
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="is_featured" data-fouc {{ $product->is_featured ? 'checked' : '' }}>
                                        Is Featured
                                    </label>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="applicable_tax">Applicable Tax</label>
                                <x-input.applicable-tax />
                            </div>
                            <div class="col-lg-6">
                                <label for="selling_price_tax_type">Applicable Tax Type</label>
                            <select name="selling_price_tax_type" id="selling_price_tax_type"
                                class="form-control select">
                                <option value="Exclusive"{{$product->selling_price_tax_type=='Exclusive'?'selected':''}}>Exclusive</option>
                                <option value="Inclusive" {{$product->selling_price_tax_type=='Inclusive'?'selected':''}}>Inclusive</option>
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="opening_stock">Opening Stock:</label>
                                <input type="number" class="form-control" name="opening_stock" id="opening_stock" value="{{$product->opening_stock}}">
                            </div>
                            <div class="col-lg-4">
                                <label for="product_type">Product Type</label>
                                <select name="product_type" id="product_type" class="form-control select">
                                    <option value="single" {{$product->product_type=='single'?'selected':''}}>Single</option>
                                    <option value="variable" {{$product->product_type=='variable'?'selected':''}}>Variable</option>
                                </select>
                            </div>
                            <div class="col-lg-4 d-none" id="alert_qty_wrapper">
                                <label for="alert_quantity">Alert Quantity:</label>
                                <input type="text" class="form-control" name="alert_quantity" id="alert_qty" value="{{$product->alert_qty}}">
                            </div>
                        </div>
                        @if ($product->product_type=='single')
                        <div class="row mb-3" id="single_product_wrapper">
                            <div class="col-lg-4">
                                <label for="purchase_price_including_tax">Purchase Price:</label>
                                <input type="number" class="form-control" name="purchase_price" id="purchase_price">
                            </div>
                            {{-- <div class="col-lg-3">
                                <label for="purchase_price_excluding_tax">Purchase Price(Excluding Tax):</label>
                                <input type="number" class="form-control" name="purchase_price_excluding_tax"
                                    id="purchase_price_excluding_tax">
                            </div> --}}
                            <div class="col-lg-4">
                                <label for="profit_margin">Profit Margin:</label>
                                <input type="number" class="form-control" name="profit_margin" id="profit_margin">
                            </div>
                            <div class="col-lg-4">
                                <label for="selling_price">Selling Price:</label>
                                <input type="number" class="form-control" name="selling_price" id="selling_price">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @if ($product->product_type == 'variable')
                    <div class="card" id="product_variation_wrapper">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="bg-indigo-600">
                                    <tr>
                                        <th>Variation Name</th>
                                        <th>Value</th>
                                        <th>Purchase Price</th>
                                        <th>Profit Margin</th>
                                        <th>Selling Price</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="multiple_variation">
                                    @foreach ($product->variations as $variation)
                                        <tr>
                                        <tr>
                                            <td>
                                                <select class="form-control select select-search variation-name"
                                                    name="child[variation_name][]">
                                                    <option value="">Select Variable</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control select select-search variation-values"
                                                    name="child[variation_value][]">
                                                    <option value="">Select Value</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control variation_purchase_price"
                                                    name="child[purchase_price][]" placeholder="Inc. Tax">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control variation_profit_margin"
                                                    name="child[profit_margin][]" placeholder="25%">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control variation_selling_price"
                                                    name="child[selling_price][]" placeholder="Exc. Tax">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="child[stock][]"
                                                    placeholder="Stock">
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-sm rounded-round btn-icon bg-danger-800 shadow remove-row">
                                                    <i class="icon-cross"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row justify-content-end mt-2">
                                <div class="col-lg-2 text-right">
                                    <button type="button"
                                        class="btn btn-sm bg-indigo border-2 border-indigo btn-icon rounded-round legitRipple shadow mr-1"
                                        id="variation_add"><i class="icon-plus3"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- @dd($product->image) --}}



                <div class="row justify-content-end mb-2 mr-2">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('product.index') }}"
                class="btn 
            btn-sm bg-indigo 
            border-2 
            border-indigo 
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i
                    class="icon-list"></i></a>
        </x-slot>
    </x-data-display.card>
    {{-- @include('product.scripts') --}}
</x-layouts.master>
