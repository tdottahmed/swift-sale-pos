<x-layouts.master>
    <div class="card ">
        <div class="card-header bg-teal">
            <h2>{{ __('Update Your Product Info') }}</h2>
        </div>

        <div class="card-body">
            <form action="{{ route('product.update') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="">{{ __('Select Category') }}</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Sub Category') }}</label>
                            <select name="subCategory_id" id="subCategory_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Brand') }}</label>
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Color') }}</label>
                            <select name="color_id" id="color_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}">{{ $color->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Size') }}</label>
                            <select name="size_id" id="size_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Unit') }}</label>
                            <select name="unit_id" id="unit_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">{{ __('Select Barcode Type') }}</label>
                            <select name="barcodeType_id" id="barcodeType_id" class="form-control">
                                <option value="">-- Please select --</option>
                                @foreach ($barcodeTypes as $barcodeType)
                                    <option value="{{ $barcodeType->id }}">{{ $barcodeType->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="product_type">Product Type:</label>
                            <input type="text" class="form-control" name="product_type" id="product_type">
                        </div>
                        <div class="mb-3">
                            <label for="variation_name">Variation Name:</label>
                            <input type="text" class="form-control" name="variation_name" id="variation_name">
                        </div>
                        <div class="mb-3">
                            <label for="variation_values">Variation Values:</label>
                            <input type="text" class="form-control" name="variation_values" id="variation_values">
                        </div>
                        <div class="mb-3">
                            <label for="variation_skus">Variation Skus:</label>
                            <input type="text" class="form-control" name="variation_skus" id="variation_skus">
                        </div>
                        <div class="mb-3">
                            <label for="tax_type">Tax Type:</label>
                            <input type="text" class="form-control" name="tax_type" id="tax_type">
                        </div>
                        <div class="mb-3">
                            <label for="logo">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                    </div>
                    <div class="col-lg-4">




                        <div class="mb-3">
                            <label for="expire_date">Expire Date:</label>
                            <input type="text" class="form-control" name="expire_date" id="expire_date">
                        </div>
                        <div class="mb-3">
                            <label for="enable_imei">Enable IMEI:</label>
                            <input type="text" class="form-control" name="enable_imei" id="enable_imei">
                        </div>
                        <div class="mb-3">
                            <label for="weight">Weight:</label>
                            <input type="text" class="form-control" name="weight" id="weight">
                        </div>
                        <div class="mb-3">
                            <label for="rack">Rrowack:</label>
                            <input type="text" class="form-control" name="rack" id="rack">
                        </div>
                        <div class="mb-3">
                            <label for="row">Row:</label>
                            <input type="text" class="form-control" name="row" id="row">
                        </div>
                        <div class="mb-3">
                            <label for="position">Position:</label>
                            <input type="text" class="form-control" name="position" id="position">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_1">Customfield_1:</label>
                            <input type="text" class="form-control" name="customfield_1" id="customfield_1">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_2">Customfield_2:</label>
                            <input type="text" class="form-control" name="customfield_2" id="customfield_2">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_3">Customfield_3:</label>
                            <input type="text" class="form-control" name="customfield_3" id="customfield_3">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_4">Customfield_4:</label>
                            <input type="text" class="form-control" name="customfield_4" id="customfield_4">
                        </div>
                        <div class="mb-3">
                            <label for="customfield_5">Customfield_5:</label>
                            <input type="text" class="form-control" name="customfield_5" id="customfield_5">
                        </div>
                        <div class="mb-3">
                            <label for="not_for_sale">Not For Sale:</label>
                            <input type="text" class="form-control" name="not_for_sale" id="not_for_sale">
                        </div>



                        <div class="mb-3">
                            <label for="address">Description:</label>
                            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="mb-3">
                            <label for="sku">Sku Code:</label>
                            <input type="text" class="form-control" name="sku" id="sku">
                        </div>
                        <div class="mb-3">
                            <label for="manage_stock">Manage Stock:</label>
                            <input type="text" class="form-control" name="manage_stock" id="manage_stock">
                        </div>
                        <div class="mb-3">
                            <label for="alert_qty">Alert Quantity:</label>
                            <input type="text" class="form-control" name="alert_qty" id="alert_qty">
                        </div>
                        <div class="mb-3">
                            <label for="expire_in">Expire In:</label>
                            <input type="text" class="form-control" name="expire_in" id="expire_in">
                        </div>
                        <div class="mb-3">
                            <label for="expire_unit">Expire Unit:</label>
                            <input type="text" class="form-control" name="expire_unit" id="expire_unit">
                        </div>
                        <div class="mb-3">
                            <label for="applicable_tax">Applicable Tax:</label>
                            <input type="text" class="form-control" name="applicable_tax" id="applicable_tax">
                        </div>
                        <div class="mb-3">
                            <label for="warranty">Warranty:</label>
                            <input type="text" class="form-control" name="warranty" id="warranty">
                        </div>
                        <div class="mb-3">
                            <label for="profit_margin">Profite Margin:</label>
                            <input type="text" class="form-control" name="profit_margin" id="profit_margin">
                        </div>
                        <div class="mb-3">
                            <label for="selling_price">Selling Price:</label>
                            <input type="text" class="form-control" name="selling_price" id="selling_price">
                        </div>
                        <div class="mb-3">
                            <label for="opening_stock">Opening Stock:</label>
                            <input type="text" class="form-control" name="opening_stock" id="opening_stock">
                        </div>
                        <div class="mb-3">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" name="location" id="location">
                        </div>
                        <div class="mb-3">
                            <label for="product_locations">Product Location:</label>
                            <input type="text" class="form-control" name="product_locations"
                                id="product_locations">
                        </div>
                    </div>
                </div>



                <div class="mb-3">
                    <input type="submit" class="form-control btn btn-info" value="Submit">
                </div>

            </form>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('product.index') }}" class="btn btn-success btn-sm">List</a>
        </div>
    </div>


</x-layouts.master>
