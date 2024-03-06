<x-layouts.master>
    <div class="row w-full">
       <div class="card">
        <div class="card-body">
            <span class="col-lg-2 "><kbd>Shift + W</kbd> Select Customer</span>
            <span class="col-lg-2 "><kbd>Shift + A</kbd> Create new Customer</span>
            <span class="col-lg-2 "><kbd>Shift + C</kbd> Close Selected Dropdown</span>
            <span class="col-lg-2 "><kbd>Shift + Z</kbd> Category Wise Product</span>
            <span class="col-lg-2 "><kbd>Shift + B</kbd> Brand Wise Product</span>
            <span class="col-lg-2 "><kbd>Shift + S</kbd> Complete Order</span>
           </div>           
        </div>
    </div>
    <div class="card">
        <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <button class="btn btn-sm bg-blue-800 mx-2"><i class="icon icon-plus2 mr-2" ></i>Note</button>
                        <button class="btn btn-sm bg-indigo-800 mx-2"><i class="icon icon-plus2 mr-2" ></i>Expense</button>
                        <button class="btn btn-sm bg-teal-800 mx-2"><i class="icon icon-wrench3 mr-2" ></i>Repair</button>
                        <button class="btn btn-sm bg-danger-800 mx-2"><i class="icon icon-reset mr-2" ></i>Return</button>
                        <button class="btn btn-sm bg-info-800 mx-2"><i class="icon icon-pause mr-2" ></i>suspended</button>
                        <button class="btn btn-sm bg-success-800 mx-2"><i class="icon icon-portfolio mr-2" ></i>Registars</button>
                        <button class="btn btn-sm bg-primary-800 mx-2"><i class="icon icon-calculator mr-2" ></i>Calculator</button>
                    </div>
                    <div class="col-lg-4">
                        <span class="nav-pills-bordered">{{today()}}</span>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body py-4 h-full">
                    <div class="form-group row justify-between">
									<div class="col-lg-1">
                                        <button class="btn btn-light btn-icon" type="button"><i class="icon-user"></i></button>
                                    </div>
									<div class="col-lg-7">
										<div class="input-group">
                                            <select name="customer" id="customer" class="form-control select-search">
                                                <option value="" selected disabled>Select Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->fname }}</option>
                                                @endforeach
                                            </select>											
										</div>
									</div>
                                    <div class="col-lg-3">
                                        <span class="input-group-append" data-toggle="modal" data-target="#createCustomer">
                                            <span class="input-group-text"><i class="icon-plus3 px-2"></i> Add Cutomer</span>
                                        </span>
                                    </div>
								</div>
                </div>
                <div class="table">
                    <table class="table" id="productTable">
                        <thead class="bg-indigo-600">
                            <tr>
                                <th>Product</th>
                                <th>SKU</th>
                                <th>Quantity</th>
                                <th>Sub Total</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-gray-200 h-full">


                        </tbody>
                    </table>
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
                        <div class="col-lg-4">
                            <select name="category" id="category" class="form-control select-search">
                                <option value="">Select Category</option>
                                @foreach ($categoryWiseProducts as $category => $products)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Product by sku"
                                    id="sku">
                                <span class="input-group-append bg-indigo-600">
                                    <span class="input-group-text"><i class="icon-search4"></i></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <select name="brand" id="brand" class="form-control select-search">
                                <option value="">Select Brand</option>
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
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody id="filteredProducts">
                                    @foreach ($products as $product)
                                        @foreach ($product->variations as $item)
                                            <tr data-category="{{ $product->category }}"
                                                data-brand="{{ $product->brand }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td >{{ $item->variation_sku }}</td>
                                                <td>{{ $item->product_variation }}-{{ $item->value }}</td>
                                                <td>{{ $product->selling_price }}</td>
                                                <td>
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSn_CilQfREZOfjsqd98omCmcsUz9dQ3hzMQQ&usqp=CAU"
                                                        alt="no_image" height="50" width="50">
                                                </td>
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

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                        <button class="btn  bg-blue-800 mx-2"><i class="icon icon-plus2 mr-2" ></i>Note</button>
                        <button class="btn  bg-indigo-800 mx-2"><i class="icon icon-plus2 mr-2" ></i>Expense</button>
                        <button class="btn  bg-teal-800 mx-2"><i class="icon icon-wrench3 mr-2" ></i>Repair</button>
                        <button class="btn bg-danger-800 mx-2"><i class="icon icon-reset mr-2" ></i>Return</button>
                        <button class="btn  bg-info-800 mx-2"><i class="icon icon-pause mr-2" ></i>suspended</button>
                        <button class="btn  bg-success-800 mx-2"><i class="icon icon-portfolio mr-2" ></i>Registars</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 text-center">
                           <div class="bg-indigo-800 p-2">
                            <h5>Total paybale Ammount</h5>
                            <h2>15000</h2>
                           </div>

                        </div>
                        <div class="col-lg-4">
                            <button class="btn  bg-info-800"><i class="icon icon-pause mr-2" ></i>Recent Sell</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    @include('customer.create-modal')

    @push('scripts')
        <script>
            $(document).ready(function() {       
                calculateCartTotal();         
                function addProductToCart(product) {
                    let row = `<tr data-id="${product.id}">
                        <td>${product.name}</td>
                        <td>${product.sku}</td>
                        <td>
                            <div class="input-group">
                                <button class="btn btn-sm btn-secondary decrement-quantity">-</button>
                                <span class="quantity mx-3 mt-1">${product.quantity}</span>
                                <button class="btn btn-sm btn-secondary increment-quantity">+</button>
                            </div>
                        </td>
                        <td>${product.subtotal}</td>
                        <td>${product.total}</td>
                        <td>
                            <button class="btn btn-sm btn-danger delete-product" data-id="${product.id}">Delete</button>
                        </td>
                    </tr>`;
                    $('#productTable tbody').append(row);
                }

                $('#filteredProducts').on('click', 'tr', function() {
                    let productName = $(this).find('td:eq(1)').text().trim(); 
                    let price = $(this).find('td:eq(4)').text().trim(); 
                    let initialTotal = price;
                    let variationSku = $(this).find('td:eq(2)').text().trim();
                    let existingRow = $('#productTable tr').find(`td:eq(1):contains("${variationSku}")`);
                    if (existingRow.length > 0) {
                    return false; 
                    } else {
                    let product = {
                        name: productName,
                        sku : variationSku,
                        quantity: 1, 
                        subtotal: price,
                        total: initialTotal,
                        id: $(this).data('productId')
                    };
                    addProductToCart(product);
                    }
                    calculateCartTotal();
                });
                 // Function to calculate total price and quantity
                 function calculateCartTotal() {
                    let totalPrice = 0;
                    let totalQuantity = 0;

                    $('#productTable tbody tr').each(function() {
                        let quantityElement = $(this).find('.quantity');
                        let priceElement = $(this).find('td:eq(3)');

                        if (quantityElement.length && priceElement.length) {
                            let quantity = parseInt(quantityElement.text());
                            let priceText = priceElement.text().trim().replace(/[^0-9.]/g, '');
                            let price = parseFloat(priceText);
                            let subtotal = quantity * price;
                            totalPrice += subtotal;
                            totalQuantity += quantity;
                        } else {
                            console.warn('Missing quantity or price element in a cart row.');
                        }
                    });
                    $('#cartTotalPrice').text(totalPrice.toFixed(2));
                    $('#cartTotalQuantity').text(totalQuantity);
                }
                $('#productTable').on('click', '.increment-quantity, .decrement-quantity', function() {
                    let quantitySpan = $(this).siblings('.quantity');
                    let currentQuantity = parseInt(quantitySpan.text());
                    let price = $(this).closest('tr').find('td:eq(3)').text().trim(); // Assuming price is in the third column (index 2)
                    let subtotalSpan = $(this).closest('tr').find('td:eq(4)'); // Assuming subtotal is in the fourth column (index 3)

                    // Update quantity and subtotal
                    if (currentQuantity > 0 || $(this).hasClass('increment-quantity')) { // Allow incrementing from 0
                        quantitySpan.text(currentQuantity + (($(this).hasClass('increment-quantity') ? 1 : -1)));
                        let newSubtotal = parseFloat(price) * parseInt(quantitySpan.text());
                        subtotalSpan.text(newSubtotal.toFixed(2));
                    }

                    // Trigger recalculation
                    calculateCartTotal();
                });

                function filterProducts() {
                    var selectedCategory = $("#category").val();
                    var selectedBrand = $("#brand").val();
                    var sku = $("#sku").val().trim();
                    $("#filteredProducts tr").hide().filter(function() {
                        var categoryMatch = true;
                        var brandMatch = true;
                        var skuMatch = true;
                        if (selectedCategory !== "") {
                            categoryMatch = $(this).data("category") === selectedCategory ||
                                selectedCategory === 'All';
                        }
                        if (selectedBrand !== "") {
                            brandMatch = $(this).data("brand") === selectedBrand;
                        }
                        if (sku !== "") {
                            var rowSKU = $(this).find('td:eq(2)').text().trim();
                            skuMatch = rowSKU.indexOf(sku) !== -1; 
                        }
                        return categoryMatch && brandMatch && skuMatch;
                    }).show();
                }

                $("#filteredProducts tr").show();
                $("#category, #brand, #sku").on("change keyup", filterProducts);
                $('#productTable').on('click', '.delete-product', function() {
                    let rowToDelete = $(this).closest('tr');
                    rowToDelete.remove();
                    calculateCartTotal();
                });
                $('#productTable').on('click', '.increment-quantity, .decrement-quantity, .delete-product', calculateCartTotal);
                    if ($('#cartTotalPrice').length && $('#cartTotalQuantity').length) {
                        calculateCartTotal(); 
                    }
                    $('#productTable').append(`
                        <tr>
                            <td colspan="2"><strong>Total:</strong></td>
                            <td colspan="2" id="cartTotalQuantity">0</td>
                            <td colspan="2" id="cartTotalPrice">0.00</td>
                        </tr>
                    `);
            });
        </script>
    @endpush


</x-layouts.master>
