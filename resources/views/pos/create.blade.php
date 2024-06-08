<x-layouts.guest>
    <div class="m-2">
        <x-expense.create-modal />
        <x-pos.discount />
        <x-pos.quick-access />
        <hr>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Product
                    </div>
                    <div class="card-body">
                        <x-pos.filter-box />
                        @include('pos.loader')
                        <div class="row my-3" id="productList">
                            @include('pos.products', ['products' => $products])
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body py-4 h-full">
                        <x-pos.chose-customer />
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
                                            <div class="uniform-choice border-info text-info"><span
                                                    class=""><input type="radio" name="payment_type"
                                                        value="cash" class="form-check-input-styled-info"
                                                        data-fouc=""></span></div>
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
        <x-repair.create-modal />
        <x-pos.scripts />
    </div>
</x-layouts.guest>
