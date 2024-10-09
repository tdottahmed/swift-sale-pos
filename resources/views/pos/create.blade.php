<x-layouts.pos>
    <x-pos.quick-access />
    <div class="page-content mt-1">
        <div class="content">
            <x-pos.discount />

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <x-pos.filter-box />
                        @include('pos.loader')
                        <div class="py-1" id="productList">
                            @include('pos.products', ['products' => $products])
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <form action="{{ route('pos.store') }}" class="bill-section" target="_blank" method="post">
                            @csrf
                            <div class="row align-items-center mb-2">
                                <div class="col-lg-3">
                                    <label for="customer_id" class="form-label">{{ __('Select Customer') }}
                                        <span class="text-danger">*</span>
                                    </label>

                                </div>
                                <div class="col-lg-9 d-flex align-items-center">
                                    <select name="customer_id" id="customer_id" class="form-control select-search">
                                        <option value="0" selected>{{ __('Walking Customer') }}</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">
                                                {{ $customer->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="btn btn-success cursor-pointer"
                                        onclick="openModal('{{ route('customer.create') }}', 'Create Customer')">
                                        <i class="icon icon-plus3"></i>
                                    </span>
                                </div>
                            </div>
                            <input type="hidden" name="total_price" id="total_price">
                            <input type="hidden" name="paid_amount" id="paid_amount">
                            <input type="hidden" name="total_quantity" id="total_quantity">
                            <div class="card">
                                <table class="table table-bordered" id="productTable">
                                    <thead>
                                        <tr class="bg-teal-800">
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Sub Total</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="productTbody">
                                    </tbody>
                                </table>
                                <div class="row my-3 mx-2">
                                    <div class="col-lg-6">
                                        <button type="button" class="btn bg-teal-800" data-toggle="modal"
                                            data-target="#createDiscount">Discount (-) <i
                                                class="icon icon-pencil7 ml-2"></i></button>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="discountAmount" class="form-control"
                                            id="discountAmount" disabled>
                                        <input type="hidden" name="discountedAmount" id="discountedAmmount">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="justify-content-between card-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <h5 class="font-weight-bold total-payable">Total Item :</h5>
                                            </td>
                                            <td>
                                                <h5 class="font-weight-bold total-payable" id="total">0</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="font-weight-bold total-payable">Total Price :</h6>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-bold total-payable"id="totalPrice">0.0</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="font-weight-bold total-payable">Payable Amount :</h6>
                                            </td>
                                            <td>
                                                <h6 class="font-weight-bold total-payable"id="payable_amount">0.0</h6>
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-6 col-md-3">
                                                <input type="radio" name="payment_method" id="bank"
                                                    value="bank" class="d-none" />
                                                <label for="bank" class="card-payment text-center border border">
                                                    <div class="card-body-payment">
                                                        <i class="icon-office icon-2x text-indigo-800 mb-2"></i>
                                                        <h6 class="font-weight-black">Bank Payment</h6>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-6 col-md-3 rounded">
                                                <input type="radio" name="payment_method" id="cash"
                                                    class="d-none" value="cash" checked />
                                                <label for="cash" class="card-payment text-center border border">
                                                    <div class="card-body-payment">
                                                        <i class="icon-cash3 icon-2x text-warning-800 mb-2"></i>
                                                        <h6 class="font-weight-black">Cash Payment</h6>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <input type="radio" name="payment_method" id="online"
                                                    class="d-none" value="online" />
                                                <label for="online" class="card-payment text-center border border">
                                                    <div class="card-body-payment">
                                                        <i class="icon-mobile icon-2x text-teal-800 mb-2"></i>
                                                        <h6 class="font-weight-black">Online Payment</h6>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-lg bg-teal-800 mt-4 w-100">
                                            <i class="icon-checkmark2 icon-2x mr-2"></i> Confirm Payment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <x-pos.scripts />
        </div>
        <div class="navbar navbar-expand-lg navbar-light fixed-bottom">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                    data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
                <span class="navbar-text">
                    &copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a
                        href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                </span>
                <div class="clock-items ml-auto">
                    <x-clock />
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layouts.pos>
