<x-layouts.master>
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body py-4 h-full">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 customer">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </span>
                                <input list="customers" name="customer" id="customer" class="form-control"
                                    placeholder="select Customer">
                                <datalist id="customers">
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </datalist>
                                <span class="input-group-append bg-blue-700" data-toggle="modal"
                                    data-target="#modal_form_horizontal">
                                    <span class="input-group-text"><i class="icon-plus3"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-8 product-sku">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Product by name or sku">
                                <span class="input-group-append bg-indigo-600">
                                    <span class="input-group-text"><i class="icon-plus3"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table">
                    <table class="table">
                        <thead class="bg-indigo-600">
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 h-full">


                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-3">
                            Hello
                        </div>
                        <div class="col-lg-3">
                            Hello
                        </div>
                        <div class="col-lg-3">
                            Hello
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    Product
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="category">Choose Category</label>
                            <select name="category" id="category" class="form-control select-search">
                                <option value="">-- Please select --</option>
                                @foreach ($categoryWiseProducts as $category => $products)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="brand">Choose Brand</label>
                            <select name="brand" id="brand" class="form-control select-search">
                                <option value="">-- Please select --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->title }}">{{ $brand->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Title</th>
                                        <th>Product Variation SKU</th>
                                        <th>Product Variation</th>
                                    </tr>
                                </thead>
                                <tbody id="filteredProducts">
                                    @foreach ($products as $product)
                                        @foreach ($product->variations as $item)
                                            <tr data-category="{{ $product->category }}"
                                                data-brand="{{ $product->brand }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $item->variation_sku }}</td>
                                                <td>{{ $item->product_variation }}-{{ $item->value }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <x-customer.create/>
   @push('scripts')
     <script>
       $(document).ready(function() {
         // console.log('hello');
       });
      </script>       
   @endpush
 
   {{-- Create Employee Modal Start --}}
    <div id="modal_form_horizontal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Employee</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="#" class="form-horizontal">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">First name</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Eugene" class="form-control" name="fname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Last name</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Kopyov" class="form-control" name="lname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="email" placeholder="eugene@kopyov.com" class="form-control"
                                    name="email">
                                <span class="form-text text-muted">name@domain.com</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Phone #</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999"
                                    class="form-control" name="phone">
                                <span class="form-text text-muted">+99-99-9999-9999</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">Address line 1</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Ring street 12, building D, flat #67"
                                    class="form-control" name="address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">City</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Munich" class="form-control" name="city">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-sm-3">State/Province</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Bayern" class="form-control" name="state">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg bg-danger-400 shadow-2" data-dismiss="modal"><i
                                class="icon-cross2 mr-1"></i>Close</button>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1 "></i>{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Create Employee Modal end --}}
    @push('scripts')
    <script>
        $(document).ready(function() {
            // Initially show all rows
            $("#filteredProducts tr").show();

            // Event listener for category and brand selection change
            $("#category, #brand").on("change", function() {
                var selectedCategory = $("#category").val();
                var selectedBrand = $("#brand").val();

                // Show rows based on selected category and brand
                $("#filteredProducts tr").hide().filter(function() {
                    var categoryMatch = true;
                    var brandMatch = true;

                    if (selectedCategory !== "") {
                        categoryMatch = $(this).data("category") === selectedCategory || selectedCategory === 'All';
                    }

                    if (selectedBrand !== "") {
                        brandMatch = $(this).data("brand") === selectedBrand;
                    }

                    return categoryMatch && brandMatch;
                }).show();
            });
        });
    </script>
@endpush


</x-layouts.master>
