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
                        <input type="text" class="form-control" name="sku" id="sku">
                    </div>
                </div>
                <hr>
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
                        <label for="">{{ __('Select Color') }}</label>
                        <select name="color_id" id="color_id" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="">{{ __('Select Size') }}</label>
                        <select name="size_id" id="size_id" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->title }}</option>
                            @endforeach
                        </select>
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
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="">{{ __('Select Barcode Type') }}</label>
                        <select name="barcode_type_id" id="barcode_type_id" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($barcodeTypes as $barcodeType)
                                <option value="{{ $barcodeType->id }}">{{ $barcodeType->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-lg-6">
                        <label for="warranty">Warranty:</label>
                        <input type="text" class="form-control" name="warranty" id="warranty">
                    </div>    --}}
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="alert_quantity">Alert Quantity:</label>
                        <input type="text" class="form-control" name="alert_quantity" id="alert_qty">
                    </div>
                    <div class="col-lg-6">
                        <label for="expires_in">Expire In:</label>
                        <input type="number" class="form-control" name="expires_in" id="expires_in">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="expiry_period_unit">Expire Unit:</label>
                        <input type="text" class="form-control" name="expiry_period_unit" id="expiry_period_unit">
                    </div>
                    <div class="col-lg-6">
                        <label for="applicable_tax">Applicable Tax</label>
                        <select name="applicable_tax" id="applicable_tax" class="form-control select">
                            <option value="">-- Please select --</option>
                            <option value="none">None</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="profit_margin">Profite Margin:</label>
                        <input type="text" class="form-control" name="profit_margin" id="profit_margin">
                    </div>
                    <div class="col-lg-6">
                        <label for="selling_price">Selling Price:</label>
                        <input type="number" class="form-control" name="selling_price" id="selling_price">
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="opening_stock">Opening Stock:</label>
                        <input type="number" class="form-control" name="opening_stock" id="opening_stock">
                    </div>
                    <div class="col-lg-6">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" name="location" id="location">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <label for="product_locations">Product Location:</label>
                        <input type="text" class="form-control" name="product_locations"id="product_locations">
                    </div>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <div class="row my-2">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="col-lg-4">
                                    <label for="image{{ $i }}">Image - {{ $i }}</label>
                                    <input type="file" class="form-control h-auto" name="image_{{ $i }}" id="image{{ $i }}">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="card ">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="enable_imei_or_serial" data-fouc>
                                        Enable IMEI
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="not_for_selling" data-fouc>
                                        Not for Sale
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="manage_stock" data-fouc>
                                        Manage Stock
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="product_type">Product Type</label>
                                <select name="product_type" id="product_type" class="form-control select">
                                    <option value="single" selected>Single</option>
                                    <option value="variable">Variable</option>
                                </select>
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
                        <div class="row" id="product_variation_wrapper">
                            <div class="col-lg-6">
                                <label for="product_variation">Select Variation</label>
                                <select name="product_variation" id="product_variation" class="form-control select">
                                    <option value="">Choose Variation</option>
                                    <option value="size">Size</option>
                                    <option value="adjustment">Adjustment</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div id="varibale_product">
                            <table class="table table-bordered">
                                <thead class="bg-indigo-600">
                                    <tr>
                                        <th>SKU</th>
                                        <th>Value</th>
                                        <th>Stock</th>
                                        <th colspan="2">Default Purchase Price</th>
                                        <th>Default Seling Price</th>
                                        <th>Profit Margin</th>
                                        <th>Variation Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="multiple_variation">
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="child[variation_sku][]"
                                                placeholder="Variation SKU">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="child[value][]"
                                                placeholder="value">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="child[stock][]"
                                                placeholder="stock">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="child[purchase_inc][]"
                                                placeholder="Inc. Tax">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="child[purchase_exc][]"
                                                placeholder="Exc. Tax">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="child[selling_price][]"
                                                placeholder="Exc. Tax">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" name="child[profit_marging][]"
                                                placeholder="25%">
                                        </td>
                                        <td>
                                            <input type="file" class="form-control h-auto"
                                                name="child[variation_image][]">
                                        </td>
                                        <td>
                                            <button type="button"
                                                class="btn btn-sm rounded-round btn-icon bg-danger-800 shadow d-none">
                                                <i class="icon-cross"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row justify-content-end mt-2">
                                <div class="col-lg-2 text-right">
                                    <button type="button"
                                        class="btn btn-sm bg-indigo border-2 border-indigo btn-icon rounded-round legitRipple shadow mr-1"
                                        id="vriation_add"><i class="icon-plus3"></i></button>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered" id="single_product">
                            <thead class="bg-indigo-600">
                                <tr>
                                    <th>SKU</th>
                                    <th>Stock</th>
                                    <th colspan="2">Default Purchase Price</th>
                                    <th>Default Seling Price</th>
                                    <th>Profit Margin</th>
                                    <th>Variation Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" name="variation_sku"
                                            placeholder="Variation SKU">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="stock"
                                            placeholder="stock">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="purchase_inc"
                                            placeholder="Inc. Tax">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="purchase_exc"
                                            placeholder="Exc. Tax">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="selling_price"
                                            placeholder="Exc. Tax">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="profit_marging"
                                            placeholder="25%">
                                    </td>
                                    <td>
                                        <input type="file" class="form-control h-auto" name="variation_image">
                                    </td>
                                </tr>
                            </tbody>
                        </table>


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
    <script>
        $(document).ready(function() {
            $('#product_variation_wrapper').hide();
            $('#varibale_product').hide();
            $('#product_type').change(function() {
                var selectedType = $('#product_type').val();
                if (selectedType === 'variable' || selectedType === 'combo') {
                    $('#single_product').hide();
                    $('#product_variation_wrapper').show();
                    $('#varibale_product').show();
                } else if (selectedType === 'single') {
                    $('#product_variation_wrapper').hide();
                    $('#varibale_product').hide();
                    $('#single_product').show();
                }
            });


            $('#vriation_add').click(function() {
                let html = ` <tr>
                            <td>
                                <input type="text" class="form-control" name="child[variation_sku][]" placeholder="Variation SKU">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="child[value][]" placeholder="value">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="child[stock][]" placeholder="stock">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="child[purchase_inc][]" placeholder="Inc. Tax">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="child[purchase_exc][]" placeholder="Exc. Tax">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="child[selling_price][]" placeholder="Exc. Tax">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="child[profit_marging][]" placeholder="25%">
                            </td>
                            <td>
                                <input type="file" class="form-control h-auto" name="child[variation_image][]">
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm rounded-round btn-icon bg-danger-800 shadow remove-row">
                                    <i class="icon-cross"></i>
                                </button>
                            </td>
                        </tr>`;
                $('#multiple_variation').append(html);
            });

            $(document).on('click', '.remove-row', function() {
                if (confirm("Are you sure you want to delete this row?")) {
                    $(this).closest('tr').remove();
                }
            });



        });
    </script>
</x-layouts.master>
