<x-frontend.porto.layout.master>

    <main class="main main-test">
        <div class="container checkout-container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li>
                    <a href="">Shopping Cart -></a>
                </li>
                <li>
                    <a href="">Checkout -></a>
                </li>
                <li>
                    <a href="cart.html">Order Complete</a>
                </li>
            </ul>

            <div class="login-form-container">
                <h4>Returning customer?
                    <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne" class="btn btn-link btn-toggle">Login</button>
                </h4>

                <div id="collapseOne" class="collapse">
                    <div class="login-section feature-box">
                        <div class="feature-box-content">
                            <form action="#" id="login-form">
                                <p>
                                    If you have shopped with us before, please enter your details below. If you are a
                                    new customer, please proceed to the Billing & Shipping section.
                                </p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-0 pb-1">Username or email <span
                                                    class="required">*</span></label>
                                            <input type="email" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-0 pb-1">Password <span class="required">*</span></label>
                                            <input type="password" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn">LOGIN</button>

                                <div class="form-footer mb-1">
                                    <div class="custom-control custom-checkbox mb-0 mt-0">
                                        <input type="checkbox" class="custom-control-input" id="lost-password" />
                                        <label class="custom-control-label mb-0" for="lost-password">Remember
                                            me</label>
                                    </div>

                                    <a href="forgot-password.html" class="forget-password">Lost your password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="checkout-discount">
                <h4>Have a coupon?
                    <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                        aria-controls="collapseOne" class="btn btn-link btn-toggle">ENTER YOUR CODE</button>
                </h4>

                <div id="collapseTwo" class="collapse">
                    <div class="feature-box">
                        <div class="feature-box-content">
                            <p>If you have a coupon code, please apply it below.</p>

                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm w-auto"
                                        placeholder="Coupon code"="" />
                                    <div class="input-group-append">
                                        <button class="btn btn-sm mt-0" type="submit">
                                            Apply Coupon
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Billing details</h2>

                            <form id="orderForms" name="orderForms" action="" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First name
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <input name="first_name" id="first_name" type="text" class="form-control" value="{{  (!empty($customerAddress)) ? $customerAddress->first_name : ''}}"/>
                                            <p></p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last name
                                                <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" id="last_name" name="last_name" class="form-control" value="{{  (!empty($customerAddress)) ? $customerAddress->last_name : ''}}"/>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>


                                <div class="select-custom">
                                    <label>Country / Region
                                        <abbr class="required" title="required">*</abbr></label>
                                    <select id="country" name="country" class="form-control">
                                        <option value="" selected="selected">NY
                                        </option>
                                        @if ($countries->isNotEmpty())
                                        @foreach ($countries as $country)
                                            <option {{  (!empty($customerAddress) && $customerAddress->country_id == $country->id) ? 'selected' : ''}} value="{{$country->id}}">{{ $country->name }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                    <p></p>
                                </div>
         
                                <div class="form-group mb-1 pb-2">
                                    <label>Street address
                                        <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        placeholder="House number and street name" value="{{  (!empty($customerAddress)) ? $customerAddress->address : ''}}"/>
                                        <p></p>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="apartment" name="apartment"
                                        placeholder="Apartment, suite, unite, etc. (optional)" value="{{  (!empty($customerAddress)) ? $customerAddress->apartment : ''}}"/>
                                        <p></p>
                                </div>

                                <div class="form-group">
                                    <label>City <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" id="city" name="city" class="form-control" value="{{  (!empty($customerAddress)) ? $customerAddress->city : ''}}"/>
                                    <p></p>
                                </div>
                                <div class="form-group">
                                    <label>State <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" id="state" name="state" class="form-control" value="{{  (!empty($customerAddress)) ? $customerAddress->state : ''}}"/>
                                    <p></p>
                                </div>
                                


                                <div class="form-group">
                                    <label>Postcode / Zip <abbr class="required" title="required">*</abbr></label>
                                    <input type="text" id="zip" name="zip" class="form-control" value="{{  (!empty($customerAddress)) ? $customerAddress->zip : ''}}"/>
                                </div>

                                <div class="form-group">
                                    <label>Phone <abbr class="required" title="required">*</abbr></label>
                                    <input type="tel" id="mobile" name="mobile" class="form-control" value="{{  (!empty($customerAddress)) ? $customerAddress->mobile : ''}}"/>
                                    <p></p>
                                </div>

                                <div class="form-group">
                                    <label>Email address <abbr class="required" title="required">*</abbr></label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{  (!empty($customerAddress)) ? $customerAddress->email : ''}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="order_notes" class="order-comments">Order notes (optional)</label>
                                    <textarea id="order_notes" class="form-control" name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                               
                        </li>
                    </ul>
                </div>
                <!-- End .col-lg-8 -->

                <div class="col-lg-5">
                    <div class="order-summary">
                        <h3>YOUR ORDER</h3>

                        <table class="table table-mini-cart">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                    
                                <tr>
                                    <td class="product-col">
                                        <h3 class="product-title">
                                            {{$item->name}} ×
                                            <span class="product-qty">{{$item->qty}}</span>
                                        </h3>
                                    </td>

                                    <td class="price-col">
                                        <span>${{$item->price * $item->qty}}</span>
                                    </td>
                                </tr>
                                @endforeach

                             
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <td>
                                        <h4>Subtotal</h4>
                                    </td>

                                    <td class="price-col">
                                        <span>${{Cart::subtotal()}}</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <td>
                                        <h4 class="m-b-sm">Shipping</h4>

                                    </td>
                                    <td>
                                       <span id="shippingAmount">${{number_format($totalShippingCharge,2)}}</span>
                                    </td>

                                </tr>

                                <tr class="order-total">
                                    <td>
                                        <h4>Total</h4>
                                    </td>
                                    <td>
                                        <b class="total-price"><span id="grandTotal">${{ number_format($grandTotal,2) }}</span></b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="payment-methods">
                            <h4 class="">Payment methods</h4>

                            <div class="">
                                <input checked type="radio" name="payment_method" value="cod" id="payment_one">
                                <label for="payment_one" class="form-check-label">COD</label>
                            </div>
                            <div class="">
                                <input type="radio" name="payment_method" value="cod" id="payment_two">
                                <label for="payment_two" class="form-check-label">Stripe</label>
                            </div>

                            <div class="info-box with-icon p-0 d-none" id="card-payment-form">
                                <div class="card-body p-0">
                                    <div class="mb-3">
                                        <label for="card_number" class="mb-2">Card Number</label>
                                        <input type="text" name="card_number" id="card_number" placeholder="Valid Card Number">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="expiry_date">Expiry Date</label>
                                            <input type="text" name="expiry_date" id="expiry_date" placeholder="MM/YYY">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cvv_code">CVV Code</label>
                                            <input type="text" name="cvv_code" id="cvv_code" placeholder="123">
                                        </div>
                                    </div>
                                </div>

                               
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark">
                            Place order
                        </button>
                    </div>
                    <!-- End .cart-summary -->
                </div>
                <!-- End .col-lg-4 -->
            
</form>
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </main>

</x-frontend.porto.layout.master>
