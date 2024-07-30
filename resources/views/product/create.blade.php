<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Insert Your Product Info') }}
        </x-slot>
        <x-slot name="body">
            <x-data-entry.form action="{{ route('product.store') }}" :hasFile=true>
                <div class="row">
                    <div class="col-lg-6">
                        <x-data-entry.input type="text" name="name"/>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <label for="sku">Sku Code:</label>
                            </div>
                            <div class="col-lg-9">
                                <div class="d-flex align-items-center gap-1">
                                    <input type="text" class="form-control" name="sku" id="sku">
                                    <span class="btn btn-success generate-sku"><i class="icon icon-sync"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="category" label="Select Category" :options="$categories"
                            :createRoute="route('category.create')" createLabel="Create Category" />
                    </div>
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="sub_category" label="Select Sub Category" :options="$subCategories"
                            :createRoute="route('subCategory.create')" createLabel="Create Sub Category" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="brand" label="Select brand" :options="$brands"
                            :createRoute="route('brand.create')" createLabel="Create Brand" />
                    </div>
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="barcode_type" label="Select Barcode Type" :options="$barcodeTypes"
                            :createRoute="route('barcodeType.create')" createLabel="Create Barcode Type" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="branch_id" label="Product Location" :options="$branches"
                            :createRoute="route('branch.create')" createLabel="Create Branch" />
                    </div>
                    <div class="col-lg-6">
                        <x-data-entry.select-and-create name="unit" label="Select Unit" :options="$units"
                        :createRoute="route('unit.create')" createLabel="Create units" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="description">{{__('Product Description')}}</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="col-lg-6">
                        <label class="font-weight-semibold">{{__('Upload Image')}}</label>
                        <input type="file" name="image" class="file-input"
                            data-browse-class="btn btn-primary btn-block" data-show-remove="false"
                            data-show-caption="false" data-show-upload="false" data-fouc>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" name="manage_gallery"
                                            value="1" id="manage_galery" data-fouc>
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
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <label for="applicable_tax">{{__('Applicable Tax')}}</label>
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
                                <option value="">Choose Tax Type</option>
                                <option value="Exclusive">Exclusive</option>
                                <option value="Inclusive">Inclusive</option>
                            </select>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <x-data-entry.input type="number" name="opening_stock"/>
                    </div>
                    <div class="col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <label for="product_type">{{__('Product Type')}}</label>
                            </div>
                            <div class="col-lg-9">
                                <select name="product_type" id="product_type" class="form-control select">
                                    <option value="single" selected>{{__('Single')}}</option>
                                    <option value="variable">{{__('Variable')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3" id="single_product_wrapper">
                    <div class="col-lg-4">
                        <label for="purchase_price_including_tax">Purchase Price:</label>
                        <input type="number" class="form-control" name="purchase_price" id="purchase_price">
                    </div>
                    <div class="col-lg-4">
                        <label for="profit_margin">Profit Margin:</label>
                        <input type="number" class="form-control" name="profit_margin" id="profit_margin">
                    </div>
                    <div class="col-lg-4">
                        <label for="selling_price">Selling Price:</label>
                        <input type="number" class="form-control" name="selling_price" id="selling_price">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6 d-none" id="alert_qty_wrapper">
                        <label for="alert_quantity">Alert Quantity:</label>
                        <input type="text" class="form-control" name="alert_quantity" id="alert_qty">
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
            </x-data-entry.form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-action.list-btn :route="route('product.index')" />
        </x-slot>
    </x-data-display.card>
    @include('product.scripts')
</x-layouts.master>
