<x-layouts.master>
    @include('expense.create-modal', compact('expenseCategories'))
    @include('pos.discount')
        <div class="d-flex justify-between align-items-center ">
            <div class="buttons">
                <a href="{{route('pos.index')}}" class="btn btn-sm bg-blue-800 mr-2"><i class="icon icon-list2 mr-2"></i>Pos List</a>
                <button class="btn btn-sm bg-indigo-800 mx-2" data-toggle="modal" data-target="#createExpense"><i
                        class="icon icon-plus2 mr-2"></i>Expense</button>
                <button class="btn btn-sm bg-indigo-800 mx-2" data-toggle="modal" data-target="#createRepair"><i
                        class="icon icon-plus2 mr-2"></i>Repair</button>
                <button class="btn btn-sm bg-danger-800 mx-2"><i class="icon icon-reset mr-2"></i>Return</button>
                <button class="btn btn-sm bg-info-800 mx-2"><i class="icon icon-pause mr-2"></i>suspended</button>
                <button class="btn btn-sm bg-success-800 mx-2"><i
                        class="icon icon-portfolio mr-2"></i>Registars</button>
            </div>
            <div class="clock-items ml-auto">                
                <x-clock/>                  
            </div>
        </div>
    <hr>

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
                            <div class="col-xl-4 col-sm-4 col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-img-actions">
                                            <a target="_blank" href="{{ asset($product->image ?? 'limitless/global_assets/images/placeholders/not-found.jpg') }}
                                            "
                                                data-popup="lightbox">
                                                <img src="{{ asset($product->image ?? 'limitless/global_assets/images/placeholders/not-found.jpg') }}
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
                                                <a href="#" class="text-default">{{ $product->name }}-({{ $product->category }})</a>
                                            </h6>
                                            <span>Variation</span>
                                            @foreach ($product->variations as $varitaion)
                                            <span  class="badge badge-success">{{ $varitaion->product_variation }}-{{$varitaion->value}}</span>
                                            @endforeach
                                        </div>

                                        <h3 class="mb-0 font-weight-semibold">Price: {{ $product->selling_price }}/-</h3>

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
                                <select name="selected_customer" id="selected_customer"
                                    class="form-control select-search">
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
                    <input type="hidden" name="paid_amount" id="paid_amount">
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
                                    <input type="text" name="discountAmount" class="form-control"
                                        id="discountAmount" disabled>
                                    <input type="hidden" name="discountedAmount" id="discountedAmmount">
                                </div>
                            </div>
                            <div class="row justify-content-center mt-2">
                                <div class="card-body ">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <h6 class=" text-bold ">Total Item :</h6>
                                            </td>
                                            <td>
                                                <p class="text-bold " id="total">0</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class=" text-bold ">Total Price :</p>
                                            </td>
                                            <td>
                                                <p class=" text-bold "id="totalPrice">0.0</p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <p class=" text-bold ">Payable Amount :</p>
                                            </td>
                                            <td>
                                                <p class=" text-bold "id="payable_amount">0.0</p>
                                            </td>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                            <div class="row justify-content-between mx-4 card-body">
                                <div class="col-lg-4 form-check">
                                    <label class="form-check-label">
                                        <div class="uniform-choice border-info text-info"><span class=""><input
                                                    type="radio" name="payment_type" value="cash"
                                                    class="form-check-input-styled-info" data-fouc=""></span></div>
                                        Cash Payment
                                    </label>
                                </div>
                                <div class="col-lg-4 form-check">
                                    <label class="form-check-label">
                                        <div class="uniform-choice border-warning text-warning"><span
                                                class=""><input type="radio" name="payment_type"
                                                    value="Bank" class="form-check-input-styled-warning"
                                                    data-fouc=""></span></div>
                                        Bank Pyment
                                    </label>
                                </div>
                                <div class="col-lg-4 form-check">
                                    <label class="form-check-label">
                                        <div class="uniform-choice border-danger text-danger"><span
                                                class=""><input type="radio" name="payment_type"
                                                    value="mobile_banking" class="form-check-input-styled-danger"
                                                    data-fouc=""></span></div>
                                        Mobile Banking
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary fs-1 w-100 py-2 mt-3"> <i
                                    class="icon-shredder mr-2"></i> Print Bills</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('customer.create-modal')
    @include('repair.create-modal')

    @push('scripts')
        @include('pos.script')        
    @endpush

</x-layouts.master>
