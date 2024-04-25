<x-layouts.master>
    @include('expense.create-modal', compact('expenseCategories'))
    @include('pos.discount')
    


    <div class="row">
        <div class="col-lg-7">
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
                                <input type="text" class="form-control" placeholder="Search Product by sku" id="sku">
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

                    <div class="row my-3">
                        @foreach($products as $product)
                        <div class="col-xl-4 col-sm-6 col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-img-actions">
                                        <a href="{{ asset($product->image ?? 'limitless/global_assets/images/placeholders/placeholder.jpg') }}
                                            " data-popup="lightbox">
                                            <img src="{{ asset($product->image ?? 'limitless/global_assets/images/placeholders/placeholder.jpg') }}
                                            " class="card-img" width="96" alt="{{ $product->name }}">
                                            <span class="card-img-actions-overlay card-img">
                                                <i class="icon-plus3 icon-2x"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                    
                                <div class="card-body bg-light text-center">
                                    <div class="mb-2">
                                        <h6 class="font-weight-semibold mb-0">
                                            <a href="#" class="text-default">{{ $product->name }}</a>
                                        </h6>
                                        <a href="#" class="text-muted">{{ $product->category }}</a>
                                    </div>
                    
                                    <h3 class="mb-0 font-weight-semibold">{{ $product->price }}</h3>
                    
                                    <button type="button" data-product-id="1" class="btn bg-teal-400 addToCartBtn"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body py-4 h-full">
                    <div class="form-group row justify-between">
                        <div class="col-lg-1">
                            <button class="btn btn-light btn-icon" type="button"><i class="icon-user"></i></button>
                        </div>
                        <div class="col-lg-7">
                            <div class="input-group">
                                <select name="customer" id="customer_id" class="form-control select-search">
                                    <option value="0" selected>Walk in Customer</option>
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
                <div class="scroll-product">
                    <div class="card">
                            <table class="table table-bordered" id="productTable">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>Quantity</th>
                                        <th>Sub Total</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="productTbody">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            <button type="button" class="btn btn-sm bg-brown-800" data-toggle="modal"
                                                data-target="#createDiscount">Discount (-) <i
                                                    class="icon icon-pencil7 ml-2"></i></button>
                                        </td>
                                        <td colspan="2">
                                            <input type="text" name="discountAmount" class="form-control" id="discountAmount"
                                                value="0.00" disabled>
                                        </td>
                                        
            
                                    </tr>
                                </tfoot>

                            </table>

                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body bg-indigo-800 p-2 text-center display-block d-flex">
                                <h3>Payable Amount:</h3>
                                <h3 id="totalPayableAmount" class="ml-2">15000</h3>
                            </div>
                        </div>
                    </div>
        
                    <form id="saleForm" action="{{ route('pos.store') }}" target="_blank" method="post">
                        @csrf
                        <input type="hidden" id="product_sku" name="product_sku">
                        <input type="hidden" id="product_quantity" name="product_quantity">
                        <input type="hidden" id="product_subtotal" name="product_subtotal">
                        <input type="hidden" id="product_total" name="product_total">
                        <input type="hidden" id="PayableAmount" name="totalPayableAmount">
                        <input type="hidden" id="discountedAmount" name="discountedAmount">
                        <input type="hidden" id="totalAmount" name="totalAmount">
                        <input type="hidden" id="totalQuantity" name="totalQuantity">
                        <input type="hidden" id="customerId" name="customerId">
                        <button type="submit" class="btn  bg-info-800 mx-2"><i
                                class="icon icon-check mr-2"></i>Credit Sale</button>
                    </form>
            </div>

            </div>
        </div>
    </div>

    @include('customer.create-modal')
    @include('repair.create-modal')


    @push('scripts')
       <script>
           $(document).ready(function() {    
            calculateCartTotal();
            payableAmount(); 

            $(document).on('click', '.addToCartBtn', function() {
                var productId = $(this).data('product-id');
                addProductToCart(productId);
                // calculateCartTotal();
                // payableAmount();

            });
            function addProductToCart(productId) {
                $.ajax({
                    url: '/single/product/' + productId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(productDetails) {
                        let row = `<tr data-id="${productDetails.id}">
                            <td>${productDetails.name}</td>
                            <td>${productDetails.sku}</td>
                            <td>
                                <div class="input-group">
                                    <button type="button" class="btn btn-sm btn-secondary decrement-quantity">-</button>
                                    <span class="quantity mx-3 mt-1">1</span>
                                    <button type="button" class="btn btn-sm btn-secondary increment-quantity">+</button>
                                </div>
                            </td>
                            <td>${productDetails.selling_price}</td>
                            <td>${productDetails.selling_price}</td>
                            <td>
                                <button class="btn btn-sm btn-danger delete-product" data-id="${productDetails.id}">Delete</button>
                            </td>
                        </tr>`;
                        $('#productTbody').append(row);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
                calculateCartTotal();
                payableAmount();
            }

            $('#productTable').on('click', '.delete-product', function() {
                let rowToDelete = $(this).closest('tr');
                rowToDelete.remove();
                calculateCartTotal();
                payableAmount();
                updateFormData();
            });

            $('#productTable').on('click', '.increment-quantity, .decrement-quantity', function() {
                let quantitySpan = $(this).siblings('.quantity');
                let currentQuantity = parseInt(quantitySpan.text());
                let price = $(this).closest('tr').find('td:eq(3)').text().trim();
                let subtotalSpan = $(this).closest('tr').find('td:eq(4)'); 
                if (currentQuantity > 0 || $(this).hasClass('increment-quantity')) { 
                    quantitySpan.text(currentQuantity + (($(this).hasClass('increment-quantity') ? 1 : -1)));
                    let newSubtotal = parseFloat(price) * parseInt(quantitySpan.text());
                    subtotalSpan.text(newSubtotal.toFixed(2));
                }
                calculateCartTotal();
                payableAmount();
            });

            $('#productTable').append(`
                <tr>
                    <td colspan="2"><strong>Total:</strong></td>
                    <td colspan="2"><input type ="button" name="quantity" id="cartTotalQuantity" class="btn btn-outline btn-info" disabled/></td>
                    <td colspan="2" ><input type ="button" name="totalPrice" id="cartTotalPrice" class="btn btn-outline" disabled/></td>
                </tr>
            `);

            function calculateCartTotal() {
                let totalPrice = 0;
                let totalQuantity = 0;

                $('#productTbody tr').each(function() {
                    let quantityElement = $(this).find('.quantity');
                    let priceElement = $(this).find('td:eq(3)');
                    console.log(quantityElement);
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
                $('#cartTotalPrice').val(totalPrice.toFixed(2));
                $('#cartTotalQuantity').val(totalQuantity);
            }

            $('#discountForm').on('submit', function(event) {
                event.preventDefault();
                let amount = $('#amountInput').val();
                let discountType = $('#discountType').val();
                let totalPrice = $('#cartTotalPrice').val();
                let totalPriceNumber = parseFloat(totalPrice);
                let discountAmount = 0;
                if (discountType === 'percent') {
                    let discountPercentage = amount / 100;
                    discountAmount = totalPriceNumber * discountPercentage;
                } else {
                    discountAmount = parseFloat(amount);
                }
                $('#discountAmount').val(discountAmount.toFixed(2));
                $('#createDiscount').modal('hide'); // Assuming your modal ID is discountModal
                payableAmount();
                updateFormData();
            });

            function payableAmount() {
                let totalAmount = parseFloat($('#cartTotalPrice').val());
                let discountAmount = parseFloat($('#discountAmount').val());
                let payableAmount = totalAmount - discountAmount;
                $('#totalPayableAmount').text(payableAmount.toFixed(2));
                // formData();
                updateFormData();
            }

            $('#productTable').on('click', '.increment-quantity, .decrement-quantity, .delete-product', function() {
                calculateCartTotal();
                payableAmount();
                updateFormData();
            });

            if ($('#cartTotalPrice').length && $('#cartTotalQuantity').length) {
                calculateCartTotal(); 
                payableAmount();
            }

            function formData(product) {
            let quantity = parseInt(product.quantity);
            let subtotal = parseFloat(product.subtotal);
            let discountedAmount = $('#discountAmount').val();
            let totalAmount = $('#cartTotalPrice').val();
            let totalQuantity = $('#cartTotalQuantity').val();
            $('#product_sku').val(product.sku);
            $('#product_quantity').val(quantity);
            $('#product_subtotal').val(subtotal.toFixed(2));
            $('#discountedAmount').val(discountedAmount);
            $('#totalAmount').val(totalAmount);
            $('#totalQuantity').val(totalQuantity);
        }
        function updateFormData() {
            $('#product_sku').val('');
            $('#product_quantity').val('');
            $('#product_subtotal').val('');
            $('#PayableAmount').text();
            let discountedAmount = $('#discountAmount').val();
            let totalAmount = $('#cartTotalPrice').val();
            let totalQuantity = $('#cartTotalQuantity').val();
            let customer = $('#customer_id').val();
            $('#discountedAmount').val(discountedAmount);
            $('#totalAmount').val(totalAmount);
            $('#totalQuantity').val(totalQuantity);
            $('#customerId').val(customer);

            $('#productTable tbody tr').each(function(index) {
                let sku = $(this).find('td:eq(1)').text().trim();
                let quantity = $(this).find('.quantity').text().trim();
                let subtotal = $(this).find('td:eq(3)').text().trim();
                let total = $(this).find('td:eq(4)').text().trim();

                if (index > 0) {
                    $('#product_sku').val($('#product_sku').val() + ', ' + sku);
                    $('#product_quantity').val($('#product_quantity').val() + ', ' + quantity);
                    $('#product_subtotal').val($('#product_subtotal').val() + ', ' + subtotal);
                    $('#product_total').val($('#product_total').val() + ', ' + total);
                    $('#PayableAmount').val($('#totalPayableAmount').text());
                } else {
                    $('#product_sku').val(sku);
                    $('#product_quantity').val(quantity);
                    $('#product_subtotal').val(subtotal);
                    $('#product_total').val(total);
                }
            });
        }

            $('#saleForm').submit(function (e) {
                e.preventDefault();
                this.submit();
                setTimeout(function() {
                    window.open('', '_blank');
                }, 100);
                setTimeout(function() {
                    location.reload();
                }, 200);
            });    

            calculateCartTotal();
            payableAmount();
        });

       </script>
    @endpush

</x-layouts.master>
