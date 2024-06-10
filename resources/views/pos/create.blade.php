<x-layouts.guest>
    @push('css')
        <style>
           .counter-container {
                display: flex;
                align-items: center;
                border-radius: 50px;
                overflow: hidden;
            }
            .counter-button {
                background: rgb(0, 105, 92);
                color: #fff;
                border: none;
                padding: 4px 15px;
                cursor: pointer;
                font-size: 20px;
                border-radius: 50%;
                margin: 5px;
            }
            .counter-button:hover {
                background: linear-gradient(135deg, #0056b3, #003a75);
            }
            .quantity {
                width: 50px;
                height: 40px;
                text-align: center;
                border: none;
                font-size: 20px;
                font-weight: bold;
                margin: 5px;
                border-radius: 10px;
                box-shadow: inset 0 0 5px rgb(0, 105, 92);
            }
            .quantity-total {
                width: 100px;
                height: 40px;
                text-align: center;
                border: none;
                font-size: 20px;
                font-weight: bold;
                margin: 5px;
                border-radius: 10px;
                box-shadow: inset 0 0 5px rgb(0, 105, 92);
            }

            .quantity:focus {
                outline: none;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }
            .total-payable{
                font-size: 18px;               
                transition: transform 0.3s ease-in-out;
            }
                #total:hover {
                    transform: scale(1.05); 
                }
        </style>
    @endpush
    <div>
        <x-expense.create-modal />
        <x-pos.discount />
        <x-pos.quick-access />

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
                    <div class="card-body h-full">
                        <x-pos.chose-customer />
                    </div>
                    <form action="{{ route('pos.store') }}" target="_blank" method="post">
                        @csrf
                        <input type="hidden" name="customer_id" id="customer_id">
                        <input type="hidden" name="total_price" id="total_price">
                        <input type="hidden" name="paid_amount" id="paid_amount">
                        <input type="hidden" name="total_quantity" id="total_quantity">
                            <div class="card">
                                <table class="table table-bordered" id="productTable">
                                    <thead>
                                        <tr class="bg-teal-800">
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
                        <div class="card shadow-lg height-full">
                            <div class="m-3">
                                <div class="row">
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
                                <div class="row justify-content-center">
                                    <div class="card-body ">
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
                                <button type="submit" class="btn btn-lg bg-teal-800 fs-1 w-100"> <i
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
