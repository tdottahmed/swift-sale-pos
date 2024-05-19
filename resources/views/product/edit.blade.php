<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Insert Your Product Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('product.update',$product->id) }} " method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" value="{{$product->name ? $product->name : ''}}" name="name" id="name">
                            </div>
                            <div class="col-lg-6">
                                <label for="sku">Sku Code:</label>
                                <input type="text" class="form-control" value="{{$product->sku ? $product->sku : ''}}" name="sku" id="sku">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="">{{ __('Select Category') }}</label>
                                <select name="category" id="category" class="form-control select-search">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->title }}" {{ ($category->id == $category->category_id || $category->title == $product->category) ? 'selected' : '' }}
                                            >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">{{ __('Select Sub Category') }}</label>
                                <select name="sub_category" id="sub_category" class="form-control select-search">
                                    @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->title }} {{ ($subCategory->id == $product->subCategory_id || $subCategory->title == $product->sub_category) ? 'selected' : '' }}
                                            ">{{ $subCategory->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <label for="">{{ __('Select Brand') }}</label>
                                <select name="brand" id="brand" class="form-control select-search">
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->title }}" {{ ($brand->id == $product->brand_id || $brand->title == $product->brand) ? 'selected' : '' }}
                                            >{{ $brand->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="">{{ __('Select Color') }}</label>
                                <select name="color_id" id="color_id" class="form-control select-search">
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}" {{ ($color->id == $product->color_id || $color->title == $product->color) ? 'selected' : '' }}
                                            >{{ $color->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <label for="">{{ __('Select Size') }}</label>
                                <select name="size_id" id="size_id" class="form-control select-search">
                                    @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}" {{ ($size->id == $product->size_id || $size->title == $product->size) ? 'selected' : '' }}
                                            >{{ $size->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="">{{ __('Select Unit') }}</label>
                                <select name="unit" id="unit" class="form-control select-search">
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->title }}" {{ ($unit->id == $product->unit_id || $unit->title == $product->unit) ? 'selected' : '' }}
                                            >{{ $unit->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="">{{ __('Select Barcode Type') }}</label>
                                <select name="barcode_type_id" id="barcode_type_id" class="form-control select-search">
                                    @foreach ($barcodeTypes as $barcodeType)
                                        <option value="{{ $barcodeType->id }}" {{ ($barcodeType->id == $product->barcode_type_id || $barcodeType->title == $product->	barcode_type) ? 'selected' : '' }}
                                            >{{ $barcodeType->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="alert_quantity">Alert Quantity:</label>
                            <input type="text" class="form-control" value="{{$product->alert_quantity ? $product->alert_quantity : ''}}" name="alert_quantity" id="alert_qty">
                        </div>
                        <div class="col-lg-6">
                            <label for="expires_in">Expire In:</label>
                            <input type="number" class="form-control" value="{{$product->expires_in ? $product->expires_in : ''}}" name="expires_in" id="expires_in">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <label for="expiry_period_unit">Expire Unit:</label>
                            <input type="text" class="form-control" value="{{$product->expiry_period_unit ? $product->expiry_period_unit : ''}}" name="expiry_period_unit" id="expiry_period_unit">
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
                            <input type="text" class="form-control" value="{{$product->profit_margin ? $product->profit_margin : ''}}" name="profit_margin" id="profit_margin">
                        </div>
                        <div class="col-lg-6">
                            <label for="selling_price">Selling Price:</label>
                            <input type="number" class="form-control" value="{{$product->selling_price ? $product->selling_price : ''}}" name="selling_price" id="selling_price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <label for="opening_stock">Opening Stock:</label>
                            <input type="number" class="form-control" value="{{$product->opening_stock ? $product->opening_stock : ''}}" name="opening_stock" id="opening_stock">
                        </div>
                        <div class="col-lg-4">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" value="{{$product->location ? $product->location : ''}}" name="location" id="location">
                        </div>
                        <div class="col-lg-4">
                            <label for="product_locations">Product Location:</label>
                            <input type="text" class="form-control" value="{{$product->product_locations ? $product->product_locations : ''}}" name="product_locations"id="product_locations">
                        </div>
                    </div>
                </div>
               </div>
               
                {{-- @dd($product->image) --}}
                
                <div class="card ">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="enable_imei_or_serial" data-fouc {{$product->enable_imei_or_serial ? 'checked':''}}>
                                        Enable IMEI
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="not_for_selling" data-fouc {{$product->not_for_selling ? 'checked':''}}>
                                        Not for Sale
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="manage_stock" data-fouc {{$product->manage_stock ? 'checked':''}}>
                                        Manage Stock
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" value="1"
                                            name="is_featured" data-fouc {{$product->is_featured ? 'checked':''}}>
                                        Is Featured
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-lg-4">
                                <label for="product_type">Product Type</label>
                                <select name="product_type" id="product_type" class="form-control select">
                                    <option value="single" {{$product->product_type=='single'?'selected':''}}>Single</option>
                                    <option value="variable" {{$product->product_type=='variable'?'selected':''}}>Variable</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label for="selling_price_tax_type">Applicable Tax Type</label>
                                <select name="selling_price_tax_type" id="selling_price_tax_type"
                                    class="form-control select">
                                    <option value="Exclusive"{{$product->selling_price_tax_type=='Exclusive'?'selected':''}}>Exclusive</option>
                                    <option value="Inclusive" {{$product->selling_price_tax_type=='Inclusive'?'selected':''}}>Inclusive</option>
                                </select>
                            </div>
                            @if ($product->product_type="variable")
                                <div class="col-lg-4">
                                    <label for="variation_name">Select Variation</label>
                                    <select name="variation_name" id="variation_name" class="form-control select">
                                        <option value="size" {{$product->variation_name=='size'?'selected':''}}>Size</option>
                                        <option value="adjustment" {{$product->variation_name=='adjustment'?'selected':''}}>Adjustment</option>
                                    </select>
                                </div>
                            @endif

                        </div>
                       
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
                                    @foreach ($product->variations as $variation)
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="child[variation_sku][]"
                                                    placeholder="Variation SKU" value="{{$variation->variation_sku ? $variation->variation_sku:''}}">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="child[value][]"
                                                    placeholder="value"value="{{$variation->value ? $variation->value:''}}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="child[stock][]"
                                                    placeholder="stock"value="{{$variation->stock ? $variation->stock:''}}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="child[purchase_inc][]"
                                                    placeholder="Inc. Tax"value="{{$variation->purchase_inc ? $variation->purchase_inc:''}}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="child[purchase_exc][]"
                                                    placeholder="Exc. Tax"value="{{$variation->purchase_exc ? $variation->purchase_exc:''}}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="child[selling_price][]"
                                                    placeholder="Exc. Tax"value="{{$variation->selling_price ? $variation->selling_price:''}}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="child[profit_marging][]"
                                                    placeholder="25%"value="{{$variation->profit_marging ? $variation->profit_marging:''}}">
                                            </td>
                                            <td>
                                                <input type="file" class="form-control h-auto"
                                                    name="child[variation_image][]">
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
                                        id="vriation_add"><i class="icon-plus3"></i></button>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="col-lg-4 mb-4">
                                    <div class="text-center">
                                        <label for="image{{ $i }}" class="form-label">Image - {{ $i }}</label>
                                    </div>
                                    <div class="d-flex justify-content-center mb-3">
                                        <img src="{{ $product->images ? imagePath($product->images->{'image_'.$i}):'' }}" alt="Image {{ $i }}" class="img-fluid" style="max-height: 150px;">
                                    </div>
                                    <div class="text-center">
                                        <input type="file" class="form-control" name="image_{{ $i }}" id="image{{ $i }}">
                                    </div>
                                </div>
                            @endfor
                        </div>                        
                </div>
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
    <script>
        $(document).ready(function() {
            $('#product_type').change(function() {
                var selectedType = $('#product_type').val();
                if (selectedType === 'variable' || selectedType === 'combo') {
                    $('#product_variation_wrapper').show();
                } else  {
                    $('#product_variation_wrapper').hide();
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