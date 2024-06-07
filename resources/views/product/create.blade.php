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
                        <label for="">{{ __('Select Color') }}</label>
                        <label for="">{{ __('Select Barcode Type') }}</label>
                        <select name="barcode_type_id" id="barcode_type_id" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($barcodeTypes as $barcodeType)
                                <option value="{{ $barcodeType->id }}">{{ $barcodeType->title }}</option>
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
                    <div class="col-lg-12">
                        <label for="description">Product Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
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
    @push('scripts')
        <script>

            $(document).ready(function() {
                // These codes for generate unique sku
                function generateSKU() {
                    return Math.floor(10000000 + Math.random() * 90000000).toString();
                }

                function checkSKU(sku, callback) {
                    $.ajax({
                        url: '{{ route("check.sku") }}',
                        type: 'POST',
                        data: {
                            sku: sku,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            callback(response.exists);
                        }
                    });
                }

                function generateUniqueSKU() {
                    let sku = generateSKU();
                    checkSKU(sku, function(exists) {
                        if (exists) {
                            generateUniqueSKU();
                        } else {
                            $('#sku').val(sku);
                        }
                    });
                }
               
                generateUniqueSKU();
                $(document).on('click', '.generate-sku', function() {
                    generateUniqueSKU();
                });
                //generate unique sku end

                // Codes for calculate purchase price selling price and profit mergin
                function calculateAndSetValues() {
                    let purchasePriceInc = parseFloat($('#purchase_price').val()) || 0;
                    let profitMargin = parseFloat($('#profit_margin').val()) || 0;
                    let sellingPrice = parseFloat($('#selling_price').val()) || 0;

                    if (this.id === 'profit_margin' || this.id === 'purchase_price') {
                        sellingPrice = purchasePriceInc + (purchasePriceInc * (profitMargin / 100));
                        $('#selling_price').val(sellingPrice.toFixed(2));
                    } else if (this.id === 'selling_price') {
                        profitMargin = ((sellingPrice - purchasePriceInc) / purchasePriceInc) * 100;
                        $('#profit_margin').val(profitMargin.toFixed(
                        2));
                    }
                }

                $('#purchase_price, #profit_margin, #selling_price').on('change', calculateAndSetValues);
                $(document).ready(function() {
                    function calculateVariationSetValues(context) {
                        let $row = $(context).closest('tr');
                        let purchasePriceInc = parseFloat($row.find('.variation_purchase_price').val()) || 0;
                        let profitMargin = parseFloat($row.find('.variation_profit_margin').val()) || 0;
                        let sellingPrice = parseFloat($row.find('.variation_selling_price').val()) || 0;

                        if ($(context).hasClass('variation_purchase_price') || $(context).hasClass(
                                'variation_profit_margin')) {
                            sellingPrice = purchasePriceInc + (purchasePriceInc * (profitMargin / 100));
                            $row.find('.variation_selling_price').val(sellingPrice.toFixed(
                            2));
                        } else if ($(context).hasClass('variation_selling_price')) {
                            profitMargin = ((sellingPrice - purchasePriceInc) / purchasePriceInc) * 100;
                            $row.find('.variation_profit_margin').val(profitMargin.toFixed(
                            2));
                        }
                    }

                    $(document).on('change',
                        '.variation_purchase_price, .variation_profit_margin, .variation_selling_price',
                        function() {
                            calculateVariationSetValues(this);
                        });
                });
                //calculate purchase price selling price and profit mergin End


                //Populating Variation product
                function getVariationRowHtml() {
                    return `<tr>
                                <td>
                                    <select class="form-control select select-search variation-name" name="variation_name">
                                        <option value="">Select Variable</option>
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control select select-search variation-values" name="variation_values">
                                        <option value="">Select Value</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control variation_purchase_price" name="child[purchase_price][]" placeholder="Inc. Tax">
                                </td>
                                <td>
                                    <input type="number" class="form-control variation_profit_margin" name="child[profit_margin][]" placeholder="25%">
                                </td>
                                <td>
                                    <input type="number" class="form-control variation_selling_price" name="child[selling_price][]" placeholder="Exc. Tax">
                                </td>
                                <td>
                                    <input type="number" class="form-control" name="child[stock][]" placeholder="Stock">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-round btn-icon bg-danger-800 shadow remove-row">
                                        <i class="icon-cross"></i>
                                    </button>
                                </td>
                            </tr>`;
                }

                function loadVariables() {
                    let url = "{{ route('variables.index') }}";
                    return $.ajax({
                        url: url,
                        type: 'GET',
                    });
                }

                function populateVariationOptions(selectElement, response) {
                    let options = '<option value="">Select Variable</option>';
                    $.each(response, function(index, variable) {
                        options += `<option value="${variable.id}">${variable.title}</option>`;
                    });
                    selectElement.html(options);
                }

                function populateValuesOptions(variableId, response) {
                    let selectedVariable = response.find(variable => variable.id == variableId);
                    if (selectedVariable && selectedVariable.values) {
                        let valuesArray = JSON.parse(selectedVariable.values);
                        let valuesOptions = '<option value="">Select Value</option>';
                        valuesArray.forEach(value => {
                            valuesOptions += `<option value="${value}">${value}</option>`;
                        });
                        return valuesOptions;
                    }
                    return '<option value="">No Values Available</option>';
                }

                $('#manage_stock').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#alert_qty_wrapper').removeClass('d-none');
                    } else {
                        $('#alert_qty_wrapper').addClass('d-none');
                    }
                });

                $('#galaryImageWrapper').hide();
                $('#manage_galery').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#galaryImageWrapper').show();
                    } else {
                        $('#galaryImageWrapper').hide();
                    }
                });

                $('#product_variation_wrapper, #product_variable_wrapper').hide();
                $('#product_type').on('change', function() {
                    var selectedType = $(this).val();
                    if (selectedType === 'variable') {
                        $('#single_product_wrapper').hide();
                        $('#product_variation_wrapper, #product_variable_wrapper').show();

                        let html = getVariationRowHtml();
                        $('#multiple_variation').append(html);

                        loadVariables().done(function(response) {
                            let $newRowSelect = $('#multiple_variation tr:last-child .variation-name');
                            populateVariationOptions($newRowSelect, response);
                        }).fail(function(xhr) {
                            console.error('Error fetching variables:', xhr);
                        });

                    } else {
                        $('#single_product_wrapper').show();
                        $('#product_variation_wrapper, #product_variable_wrapper').hide();
                    }
                });

                $('#variation_add').click(function() {
                    let html = getVariationRowHtml();
                    $('#multiple_variation').append(html);

                    loadVariables().done(function(response) {
                        let $newRowSelect = $('#multiple_variation tr:last-child .variation-name');
                        populateVariationOptions($newRowSelect, response);
                    }).fail(function(xhr) {
                        console.error('Error fetching variables:', xhr);
                    });
                });

                $(document).on('change', '.variation-name', function() {
                    let variableId = $(this).val();
                    let $row = $(this).closest('tr');
                    loadVariables().done(function(response) {
                        let valuesOptions = populateValuesOptions(variableId, response);
                        $row.find('.variation-values').html(valuesOptions);
                    }).fail(function(xhr) {
                        console.error('Error fetching variable values:', xhr);
                    });
                });

                $(document).on('click', '.remove-row', function() {
                    if (confirm("Are you sure you want to delete this row?")) {
                        $(this).closest('tr').remove();
                    }
                });
                //Populating Variation product end
            });
        </script>
    @endpush
</x-layouts.master>
