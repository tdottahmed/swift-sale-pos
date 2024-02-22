<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Your Product Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('product.update', $product->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="">{{ __('Select Category') }}</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Sub Category') }}</label>
                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}"
                                        {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }}>
                                        {{ $subCategory->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Brand') }}</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Color') }}</label>
                            <select name="color_id" id="color_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}"
                                        {{ $color->id == $product->color_id ? 'selected' : '' }}>{{ $color->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Size') }}</label>
                            <select name="size_id" id="size_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}"
                                        {{ $size->id == $product->size_id ? 'selected' : '' }}>{{ $size->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Unit') }}</label>
                            <select name="unit_id" id="unit_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}"
                                        {{ $unit->id == $product->unit_id ? 'selected' : '' }}>{{ $unit->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Barcode Type') }}</label>
                            <select name="barcode_type_id" id="barcode_type_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($barcodeTypes as $barcodeType)
                                    <option value="{{ $barcodeType->id }}"
                                        {{ $barcodeType->id == $product->barcode_type_id ? 'selected' : '' }}>
                                        {{ $barcodeType->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product_type">Product Type:</label>
                            <input type="text" class="form-control" name="product_type" id="product_type"
                                value="{{ $product->product_type }}">
                        </div>
                        <div class="mb-3">
                            <label for="variation_name">Variation Name:</label>
                            <input type="text" class="form-control" name="variation_name" id="variation_name"
                                value="{{ $product->variation_name }}">
                        </div>
                        <div class="mb-3">
                            <label for="variation_values">Variation Values:</label>
                            <input type="text" class="form-control" name="variation_values" id="variation_values"
                                value="{{ $product->variation_values }}">
                        </div>
                        <div class="mb-3">
                            <label for="variation_skus">Variation Skus:</label>
                            <input type="text" class="form-control" name="variation_skus" id="variation_skus"
                                value="{{ $product->variation_skus }}">
                        </div>
                        <div class="mb-3">
                            <label for="tax_type">Tax Type:</label>
                            <input type="text" class="form-control" name="tax_type" id="tax_type"
                                value="{{ $product->tax_type }}">
                        </div>
                        <div class="mb-3">
                            <label for="logo">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                            <img src="{{ asset('storage/product') . '/' . $product->image }}" width="100"
                                height="70" alt="no image">
                        </div>

                    </div>
                    <div class="col-lg-4">




                        <div class="mb-3">
                            <label for="expire_date">Expire Date:</label>
                            <input type="date" class="form-control" name="expire_date" id="expire_date"
                                value="{{ $product->expire_date }}">
                        </div>
                        <div class="mb-3">
                            <label for="enable_imei">Enable IMEI:</label>
                            <input type="text" class="form-control" name="enable_imei" id="enable_imei"
                                value="{{ $product->enable_imei }}">
                        </div>
                        <div class="mb-3">
                            <label for="weight">Weight:</label>
                            <input type="text" class="form-control" name="weight" id="weight"
                                value="{{ $product->weight }}">
                        </div>
                        <div class="mb-3">
                            <label for="rack">Rrowack:</label>
                            <input type="text" class="form-control" name="rack" id="rack"
                                value="{{ $product->rack }}">
                        </div>
                        <div class="mb-3">
                            <label for="row">Row:</label>
                            <input type="text" class="form-control" name="row" id="row"
                                value="{{ $product->row }}">
                        </div>
                        <div class="mb-3">
                            <label for="position">Position:</label>
                            <input type="text" class="form-control" name="position" id="position"
                                value="{{ $product->position }}">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_1">Customfield_1:</label>
                            <input type="text" class="form-control" name="customfield_1" id="customfield_1"
                                value="{{ $product->customfield_1 }}">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_2">Customfield_2:</label>
                            <input type="text" class="form-control" name="customfield_2" id="customfield_2"
                                value="{{ $product->customfield_2 }}">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_3">Customfield_3:</label>
                            <input type="text" class="form-control" name="customfield_3" id="customfield_3"
                                value="{{ $product->customfield_3 }}">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_4">Customfield_4:</label>
                            <input type="text" class="form-control" name="customfield_4" id="customfield_4"
                                value="{{ $product->customfield_4 }}">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_5">Customfield_5:</label>
                            <input type="text" class="form-control" name="customfield_5" id="customfield_5"
                                value="{{ $product->customfield_5 }}">
                        </div>
                        <div class="mb-3">
                            <label for="not_for_sale">Not For Sale:</label>
                            <input type="text" class="form-control" name="not_for_sale"
                                id="not_for_sale"value="{{ $product->not_for_sale }}">
                        </div>



                        <div class="mb-3">
                            <label for="address">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="5">{{ $product->description }}</textarea>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title"
                                value="{{ $product->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="sku">Sku Code:</label>
                            <input type="text" class="form-control" name="sku" id="sku"
                                value="{{ $product->sku }}">
                        </div>
                        <div class="mb-3">
                            <label for="manage_stock">Manage Stock:</label>
                            <input type="text" class="form-control" name="manage_stock" id="manage_stock"
                                value="{{ $product->manage_stock }}">
                        </div>
                        <div class="mb-3">
                            <label for="alert_qty">Alert Quantity:</label>
                            <input type="text" class="form-control" name="alert_qty" id="alert_qty"
                                value="{{ $product->alert_qty }}">
                        </div>
                        <div class="mb-3">
                            <label for="expire_in">Expire In:</label>
                            <input type="text" class="form-control" name="expire_in" id="expire_in"
                                value="{{ $product->expire_in }}">
                        </div>
                        <div class="mb-3">
                            <label for="expire_unit">Expire Unit:</label>
                            <input type="text" class="form-control" name="expire_unit" id="expire_unit"
                                value="{{ $product->expire_unit }}">
                        </div>
                        <div class="mb-3">
                            <label for="applicable_tax">Applicable Tax:</label>
                            <input type="text" class="form-control" name="applicable_tax" id="applicable_tax"
                                value="{{ $product->applicable_tax }}">
                        </div>
                        <div class="mb-3">
                            <label for="warranty">Warranty:</label>
                            <input type="text" class="form-control" name="warranty" id="warranty"
                                value="{{ $product->warranty }}">
                        </div>
                        <div class="mb-3">
                            <label for="profit_margin">Profite Margin:</label>
                            <input type="text" class="form-control" name="profit_margin" id="profit_margin"
                                value="{{ $product->profit_margin }}">
                        </div>
                        <div class="mb-3">
                            <label for="selling_price">Selling Price:</label>
                            <input type="number" class="form-control" name="selling_price" id="selling_price"
                                value="{{ $product->selling_price }}">
                        </div>
                        <div class="mb-3">
                            <label for="opening_stock">Opening Stock:</label>
                            <input type="text" class="form-control" name="opening_stock" id="opening_stock"
                                value="{{ $product->opening_stock }}">
                        </div>
                        <div class="mb-3">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" name="location" id="location"
                                value="{{ $product->location }}">
                        </div>
                        <div class="mb-3">
                            <label for="product_locations">Product Location:</label>
                            <input type="text" class="form-control" name="product_locations"
                                id="product_locations" value="{{ $product->product_locations }}">
                        </div>
                    </div>
                </div>



               <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Update') }}</button>
                    </div>
                </div>

            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('brand.index') }}"
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
</x-layouts.master>
