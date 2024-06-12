<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Insert Your Product Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('product.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="col-lg-6">
                        <label for="sku">Sku Code:</label>
                        <div class="d-flex align-items-center gap-1">
                        <input type="text" class="form-control" name="sku" id="sku">
                        <span class="btn btn-success generate-sku"><i class="icon icon-sync"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="">{{ __('Select Category') }}</label>
                        <select name="category" id="category" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->title }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="">{{ __('Select Sub Category') }}</label>
                        <select name="sub_category" id="sub_category" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($subCategories as $subCategory)
                                <option value="{{ $subCategory->title }}">{{ $subCategory->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="">{{ __('Select Brand') }}</label>
                        <select name="brand" id="brand" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->title }}">{{ $brand->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="">{{ __('Select Barcode Type') }}</label>
                        <select name="barcode_type" id="barcode_type" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($barcodeTypes as $barcodeType)
                                <option value="{{ $barcodeType->title }}">{{ $barcodeType->title }}</option>
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
                            <option value="">-- Please select --</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->title }}">{{ $unit->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="description">Product Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="col-lg-6">
                        <label class="font-weight-semibold">Upload Image</label>
                        <input type="file" name="image" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false" data-fouc>
                    </div>
                </div>
                <hr>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" name="manage_gallery" value="1"
                                            id="manage_galery" data-fouc>
                                        Image Galery
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="not_for_selling" data-fouc>
                                        Not for Sale
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="manage_stock" id="manage_stock" data-fouc>
                                        Manage Stock
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="is_featured" data-fouc>
                                        Is Featured
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-3 pt-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="track_qty" data-fouc>
                                        Track Qty
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card" id="galaryImageWrapper">
                    <div class="card-body">
                        <div class="row my-2">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="col-lg-4">
                                    <label for="image{{ $i }}">Image -
                                        {{ $i }}</label>
                                    <input type="file" class="form-control h-auto"
                                        name="image_{{ $i }}" id="image{{ $i }}">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="applicable_tax">Applicable Tax</label>
                        <x-input.applicable-tax />
                    </div>
                    <div class="col-lg-6">
                        <label for="selling_price_tax_type">Applicable Tax Type</label>
                        <select name="selling_price_tax_type" id="selling_price_tax_type"
                            class="form-control select">
                            <option value="">Choose Tax Type</option>
                            <option value="Exclusive">Exclusive</option>
                            <option value="Inclusive">Inclusive</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="opening_stock">Opening Stock:</label>
                        <input type="number" class="form-control" name="opening_stock" id="opening_stock">
                    </div>
                    <div class="col-lg-6">
                        <label for="product_type">Product Type</label>
                        <select name="product_type" id="product_type" class="form-control select">
                            <option value="single" selected>Single</option>
                            <option value="variable">Variable</option>
                        </select>

                    </div>

                </div>
                <div class="row mb-3">
                    <div class="col-lg-6 d-none" id="alert_qty_wrapper">
                        <label for="alert_quantity">Alert Quantity:</label>
                        <input type="text" class="form-control" name="alert_quantity" id="alert_qty">
                    </div>
                    {{-- <div class="col-lg-6" id="product_variable_wrapper">
                        <label for="variation_name">Select Variation</label>
                        <x-input.select-variable/>
                    </div> --}}

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
                <div class="row justify-content-end">
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
   @include('product.scripts')
</x-layouts.master>
