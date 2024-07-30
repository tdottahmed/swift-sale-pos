<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Product Info') }}
        </x-slot>
        <x-slot name="body">
            <x-data-entry.form action="{{ route('product.update', $product->id) }}" :hasFile=true method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <x-data-entry.input type="text" name="name" :value="$product->name ?? ''" />
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <label for="sku">Sku Code:</label>
                            </div>
                            <div class="col-lg-9">
                                <div class="d-flex align-items-center gap-1">
                                    <input type="text" class="form-control" name="sku" id="sku"
                                        value="{{ $product->sku ? $product->sku : '' }}">
                                    <span class="btn btn-success generate-sku"><i class="icon icon-sync"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="category" label="Select Category" :options="$categories"
                            :createRoute="route('category.create')" createLabel="Create Category" :selected="$product->category" />
                    </div>
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="sub_category" label="Select Sub Category"
                            :options="$subCategories" :createRoute="route('subCategory.create')" createLabel="Create Sub Category" :selected="$product->sub_category" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="brand" label="Select brand" :options="$brands"
                            :createRoute="route('brand.create')" createLabel="Create Brand" :selected="$product->brand" />
                    </div>
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="barcode_type" label="Select Barcode Type"
                            :options="$barcodeTypes" :createRoute="route('barcodeType.create')" createLabel="Create Barcode Type"
                            :selected="$product->barcode_type" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="branch_id" label="Product Location" :options="$branches"
                            :createRoute="route('branch.create')" createLabel="Create Branch" :selected="$product->branch_id" />
                    </div>
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="unit" label="Select Unit" :options="$units"
                            :createRoute="route('unit.create')" createLabel="Create units" :selected="$product->unit" />
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <label for="description">Product Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{!! $product->description !!}</textarea>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <label class="font-weight-semibold">Upload Image</label>
                        <input type="file" name="image" class="file-input"
                            data-browse-class="btn btn-primary btn-block" data-show-remove="false"
                            data-show-caption="false" data-show-upload="false" data-fouc>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{ imagePath($product->image) }}" height="250" width="250"
                            alt="{{ $product->name }}">
                    </div>
                </div>

                <hr>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="not_for_selling" data-fouc
                                            {{ $product->not_for_selling ? 'checked' : '' }}>
                                        Not for Sale
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="manage_stock" id="manage_stock" data-fouc
                                            {{ $product->manage_stock ? 'checked' : '' }}>
                                        Manage Stock
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
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
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="row align-items-center">
                                    <div class="col-lg-3">
                                        <label for="applicable_tax">{{ __('Applicable Tax') }}</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <x-input.applicable-tax />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="row align-items-center">
                                    <div class="col-lg-3">
                                        <label for="selling_price_tax_type">Applicable Tax Type</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <select name="selling_price_tax_type" id="selling_price_tax_type"
                                            class="form-control select">
                                            <option
                                                value="Exclusive"{{ $product->selling_price_tax_type == 'Exclusive' ? 'selected' : '' }}>
                                                Exclusive</option>
                                            <option value="Inclusive"
                                                {{ $product->selling_price_tax_type == 'Inclusive' ? 'selected' : '' }}>
                                                Inclusive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <x-data-entry.input type="number" name="opening_stock" :value="$product->opening_stock" />
                            </div>
                            <div class="col-lg-4" id="alert_qty_wrapper">
                                <x-data-entry.input type="number" name="alert_quantity" :value="$product->alert_quantity" />
                            </div>
                            <div class="col-lg-4">
                                <div class="row align-items-center">
                                    <div class="col-lg-3">
                                        <label for="product_type">{{ __('Product Type') }}</label>
                                    </div>
                                    <div class="col-lg-9">
                                        <select name="product_type" id="product_type" class="form-control select">
                                            <option value="single"
                                                {{ $product->product_type == 'single' ? 'selected' : '' }}>
                                                {{ __('Single') }}</option>
                                            <option value="variable"
                                                {{ $product->product_type == 'variable' ? 'selected' : '' }}>
                                                {{ __('Variable') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3" id="single_product_wrapper">
                                @if ($product->product_type == 'single')
                                <div class="col-lg-4">
                                    <label for="purchase_price_including_tax">Purchase Price:</label>
                                    <input type="number" class="form-control" name="purchase_price"
                                        id="purchase_price"
                                        value="{{ $product->selling_price_tax_type == 'exclusive' ? $product->purchase_price_excluding_tax : $product->purchase_price_including_tax }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="profit_margin">Profit Margin:</label>
                                    <input type="number" class="form-control" name="profit_margin"
                                        id="profit_margin" value="{{ $product->profit_margin }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="selling_price">Selling Price:</label>
                                    <input type="number" class="form-control" name="selling_price"
                                        id="selling_price" value="{{ $product->selling_price }}">
                                </div>
                                @endif
                            </div>
                    </div>
                </div>
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
                                @if ($product->product_type == 'variable')
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
                                @endif

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
            </x-data-entry.form>
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
    @include('product.scripts')
</x-layouts.master>
