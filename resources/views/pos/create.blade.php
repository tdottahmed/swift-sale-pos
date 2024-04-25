<x-layouts.master>
    @include('expense.create-modal', compact('expenseCategories'))
    @include('pos.discount')



    <div class="row">
        <div class="col-lg-6">
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

                    <div class="row my-3">
                        @foreach ($products as $product)
                            <div class="col-xl-4 col-sm-6 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-img-actions">
                                            <a href="{{ asset($product->image ?? 'limitless/global_assets/images/placeholders/placeholder.jpg') }}
                                            "
                                                data-popup="lightbox">
                                                <img src="{{ asset($product->image ?? 'limitless/global_assets/images/placeholders/placeholder.jpg') }}
                                            "
                                                    class="card-img" width="96" alt="{{ $product->name }}">
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

                                        <button type="button" onclick="addProductToCart({{ $product->id }})"
                                            class="btn bg-teal-400 addToCartBtn"><i class="icon-cart-add mr-2"></i> Add
                                            to cart</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
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
               <form action="{{ route('pos.store') }}" target="_blank" method="post">
                @csrf
                <input type="hidden" name="customer_id" id="customer_id">
                <input type="hidden" name="total_price" id="total_price">
                <input type="hidden" name="payable_amount" id="payable_amount">
                <input type="hidden" name="total_quantity" id="total_quantity">
                <div class="scroll-product">
                    <div class="card">
                        <table class="table table-bordered" id="productTable">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Variation</th>
                                    <th>Sub Total</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="productTbody">

                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="card shadow-lg height-full">
                    <div class="m-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <button type="button" class="btn btn-sm bg-brown-800" data-toggle="modal"
                                    data-target="#createDiscount">Discount (-) <i
                                        class="icon icon-pencil7 ml-2"></i></button>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="discountAmount" class="form-control" id="discountAmount" disabled>
                                <input type="hidden" name="discountedAmmount" id="discountedAmmount">
                            </div>

                        </div>

                        <div class="row justify-content-center mt-2">
                            <div class="card-body bg-teal-600 rounded-lg">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <p class=" text-bold text-white">Total Item :</p>
                                            </td>
                                            <td>
                                                <p class=" text-bold text-white" id="total">0</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class=" text-bold text-white">Total Price :</p>
                                            </td>
                                            <td>
                                                <p  class=" text-bold text-white"id="totalPrice">0.0</p>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td>
                                                <p class=" text-bold text-white">Payable Amount :</p>
                                            </td>
                                            <td>
                                                <p  class=" text-bold text-white"id="payable_amount">0.0</p>
                                            </td>
                                        </tr>
                                    </table>

                            </div>
                        </div>
                        <div class="row justify-content-between mx-4 card-body">
                            <div class="col-lg-4 form-check">
                                <label class="form-check-label">
                                    <div class="uniform-choice border-info text-info"><span class=""><input type="radio"  name="payment_type" value="cash" class="form-check-input-styled-info" data-fouc=""></span></div>
                                    Cash Payment
                                </label>
                            </div>
                            <div class="col-lg-4 form-check">
                                <label class="form-check-label">
                                    <div class="uniform-choice border-warning text-warning"><span class=""><input type="radio" name="payment_type" value="Bank" class="form-check-input-styled-warning" data-fouc=""></span></div>
                                    Bank Pyment
                                </label>
                            </div>
                            <div class="col-lg-4 form-check">
                                <label class="form-check-label">
                                    <div class="uniform-choice border-danger text-danger"><span class=""><input type="radio" name="payment_type" value="mobile_banking" class="form-check-input-styled-danger" data-fouc=""></span></div>
                                    Mobile Banking
                                </label>
                            </div>
                        </div>
        
                        <button type="submit" class="btn btn-primary fs-1 w-100 py-2 mt-3"> <i class="icon-shredder mr-2"></i> Print Bills</button>
                    </div>
                </div> </form>              
            </div>
        </div>
    </div>
    

    @include('customer.create-modal')
    @include('repair.create-modal')


    @push('scripts')
        <script>
            var ids = [];
            function addProductToCart(productId) {
                $.ajax({
                    url: '/single/product/' + productId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(product) {
                        let variationOptions = '';
                        product.variations.forEach(variation => {
                            variationOptions += `<option value="${variation.id}">${variation.product_variation}-${variation.value}</option>`;
                        });

                        let row = `
                            <tr data-id="${product.id}" id="pro-${product.id}">
                                <td>
                                    ${product.name}
                                    <input type="hidden" name="product_ids[]" value="${product.id}">
                                </td>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-sm btn-outline-secondary" type="button" onclick="decrementQuantity(${product.id})">-</button>
                                        </div>
                                        <input id="proQuantity-${product.id}" class="form-control form-control-sm" type="number" min="1" onchange="proMultiPur(${product.id})" name="proQuantity[]" value="1">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-outline-secondary" type="button" onclick="incrementQuantity(${product.id})">+</button>
                                        </div>
                                    </div>

                                </td>
                                <td>
                                    <select onchange="updatePrice(${product.id}, this.value)" name="variation[]">
                                        ${variationOptions}
                                    </select>
                                </td>
                                <td>
                                    <input name="unit_price[]" type="number" onchange="updatePrice(${product.id}, this.value)" step="0.01" class="form-control" id="proUnitPrice-${product.id}" value="${product.selling_price}">
                                </td>
                                <td>
                                    <span id="proSubPrice-${product.id}">${product.selling_price}</span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger" onclick="removeProductPur(${product.id})">Delete</button>
                                </td>
                            </tr>`;
                        $('#productTbody').append(row);
                        ids.push(product.id);
                        totalPur();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }



            function totalPur() {
                var total = 0;
                var item = 0;
                $.each(ids, function(index, value) {
                    var subPrice = parseFloat($(`#proSubPrice-${value}`).text());
                    total += subPrice;
                    var quantity = $(`#proQuantity-${value}`).val();
                    item += parseInt(quantity);
                });
                $("#totalPrice").text(parseFloat(total));
                $("#total").text(parseInt(item));
                payableAmount();
            }

            function proMultiPur(id) {
                var quantity = $(`#proQuantity-${id}`).val();
                var price = $(`#proUnitPrice-${id}`).val();
                var subPrice = quantity * price;
                $(`#proSubPrice-${id}`).text(subPrice);
                totalPur();
            }

            function incrementQuantity(productId) {
                var quantityInput = $('#proQuantity-' + productId);
                var currentQuantity = parseInt(quantityInput.val());
                quantityInput.val(currentQuantity + 1);
                proMultiPur(productId);
                payableAmount();
            }

            function decrementQuantity(productId) {
                var quantityInput = $('#proQuantity-' + productId);
                var currentQuantity = parseInt(quantityInput.val());
                if (currentQuantity > 1) {
                    quantityInput.val(currentQuantity - 1);
                    proMultiPur(productId);
                }
                payableAmount();
            }

            $('#discountForm').on('submit', function(event) {
                event.preventDefault();
                let amount = $('#amountInput').val();
                let discountType = $('#discountType').val();
                let totalPrice = parseFloat($('#totalPrice').text());
                let discountAmount = 0;

                if (discountType === 'percent') {
                    let discountPercentage = parseFloat(amount) / 100;
                    discountAmount = totalPrice * discountPercentage;
                } else {
                    discountAmount = parseFloat(amount);
                }

                $('#discountAmount').val(discountAmount.toFixed(2));
                $('#discountedAmmount').val(discountAmount);
                $('#createDiscount').modal('hide');
                payableAmount();
            });

            function payableAmount() {
                let totalAmount = parseFloat($('#totalPrice').text());
                let discountAmount = parseFloat($('#discountAmount').val());
                let payableAmount;
                if (discountAmount > 0) {
                    payableAmount = totalAmount - discountAmount;
                } else {
                    payableAmount = totalAmount;
                }
                $('#payable_amount').text(payableAmount.toFixed(2));
            }
            function removeProductPur(id) {
                $("#pro-" + id).remove();
                var index = ids.indexOf(id);
                ids.splice(index, 1);
                totalPur();
                payableAmount()
                }
        </script>
    @endpush

</x-layouts.master>
