<x-frontend.porto.layout.master>

    <main class="main">

        <div class="container">

            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li>
                    {{-- <a href="{{ route('frontend.cart',Auth::user()->id) }}">Shopping Cart -></a> --}}
                </li>
                <li>
                    <a href="{{ route('frontend.checkout') }}">Checkout -></a>
                </li>
                <li>
                    <a href="cart.html">Order Complete</a>
                </li>
            </ul>

            <div class="row">
              {{-- <div class=""> --}}
                 @if (Session::has('success'))
                     <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           {!! Session::get('success') !!}
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     </div>
                 @endif


                 @if (Session::has('error'))
                 <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                       {{ Session::get('error') }}
                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 </div>
             @endif

              {{-- </div> --}}
              @if(Cart::count() > 0)

                <div class="col-lg-8">
                    <div class="cart-table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="thumbnail-col">Image</th>
                                    <th class="product-col">Product</th>
                                    <th class="price-col">Price</th>
                                    <th class="qty-col">Quantity</th>
                                    <th class="text-right">Subtotal</th>
                                    <th class="text-right">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($cartContent as $item)
                            {{-- @dd($item); --}}
                                {{-- @php
                                    $product = $products->where('id', $item->product_id)->first();
                                @endphp --}}
                                <tr class="product-row">
                                    <td>
                                        <figure class="product-image-container">
                                            {{-- <a href="{{ route('frontend.single-product', $product->id) }}" class="product-image"> --}}
                                                @if (!empty($item->options->productImage->image_1))
                                                <img src="{{ imagePath($item->options->productImage->image_1) }}" alt="product" height="120" width="120">            
                                                @else
                                                <img src="{{ imagePath($item->options->productImage->image_1) }}" alt="product" height="120" width="120">            
                                                @endif
                                            {{-- </a> --}}
                                            {{-- <a href="#" class="btn-remove icon-cancel" title="Remove Product" ></a> --}}
                                        </figure>
                                    </td>
                                    <td class="product-col">
                                        <h5 class="product-title">
                                            <a href="">{{ $item->name }}</a>
                                        </h5>
                                    </td>
                                    <td>${{ $item->price }}</td>
                                    <td>
                                        <div class="product-single-qty">
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                <span class="input-group-btn input-group-prepend">
                                                    
                                                    <button class="btn btn-outline btn-down-icon bootstrap-touchspin-down sub" type="button" data-id="{{$item->rowId}}"></button>
                                                </span>
                                                <input class="form-control" type="number" value="{{$item->qty}}" min="1">
                                                <span class="input-group-btn input-group-append">
                                                    <button class="btn btn-outline btn-up-icon bootstrap-touchspin-up add" type="button" data-id="{{$item->rowId}}"></button>
                                                
                                                </span>
                                            </div>
                                        </div>
                                        {{-- <div class="product-single-qty">
                                            <input class="horizontal-quantity add sub form-control" type="number" value="{{ $item->qty }}" min="1">
                                        </div> --}}
                                    </td>
                                    <td class="text-right"><span class="subtotal-price">${{ $item->price * $item->qty }}</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="deleteItem('{{$item->rowId}}')"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                             
                           
                        </tbody>


                        <tfoot>
                            {{-- <tr>
                                <td colspan="5" class="clearfix">
                                    <div class="float-left">
                                        <div class="cart-discount">
                                            <form action="#">
                                                <div class="input-group">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Coupon Code" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-sm" type="submit">Apply Coupon</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <button type="submit" class="btn btn-shop btn-update-cart">Update Cart</button>
                                    </div>
                                </td>
                            </tr> --}}
                        </tfoot>


                        </table>
                    </div><!-- End .cart-table-container -->
                </div><!-- End .col-lg-8 -->

                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3>CART TOTALS</h3>

                        <table class="table table-totals">
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>${{Cart::subtotal()}}</td>
                                </tr>

                                {{-- <tr>
                                    <td>Shipping</td>
                                    <td>$0</td>
                                </tr> --}}

                                <tr>
                                    {{-- <td colspan="2" class="text-left">
                                        <h4>Shipping</h4>

                                        <div class="form-group form-group-custom-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="radio"
                                                    checked>
                                                <label class="custom-control-label">Local pickup</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-group -->

                                        <div class="form-group form-group-custom-control mb-0">
                                            <div class="custom-control custom-radio mb-0">
                                                <input type="radio" name="radio" class="custom-control-input">
                                                <label class="custom-control-label">Flat rate</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-group -->

                                        <form action="#">
                                            <div class="form-group form-group-sm">
                                                <label>Shipping to <strong>NY.</strong></label>
                                                <div class="select-custom">
                                                    <select class="form-control form-control-sm">
                                                        <option value="USA">United States (US)</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="China">China</option>
                                                        <option value="Germany">Germany</option>
                                                    </select>
                                                </div><!-- End .select-custom -->
                                            </div><!-- End .form-group -->

                                            <div class="form-group form-group-sm">
                                                <div class="select-custom">
                                                    <select class="form-control form-control-sm">
                                                        <option value="NY">New York</option>
                                                        <option value="CA">California</option>
                                                        <option value="TX">Texas</option>
                                                    </select>
                                                </div><!-- End .select-custom -->
                                            </div><!-- End .form-group -->

                                            <div class="form-group form-group-sm">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Town / City">
                                            </div><!-- End .form-group -->

                                            <div class="form-group form-group-sm">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="ZIP">
                                            </div><!-- End .form-group -->

                                            <button type="submit" class="btn btn-shop btn-update-total">
                                                Update Totals
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                            </tbody>

                            <tfoot>
                                {{-- <tr>
                                    <td>Total</td>
                                    <td>${{Cart::subtotal()}}</td>
                                </tr> --}}
                            </tfoot>
                        </table>

                        <div class="checkout-methods">
                            <a href="{{ route('frontend.checkout') }}" class="btn btn-block btn-dark">Proceed to Checkout
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div><!-- End .cart-summary -->
                </div><!-- End .col-lg-4 -->

                @else
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h4>Your Cart is Empty!</h4>
                        </div>
                    </div>
                </div>
                @endif
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->

    </main><!-- End .main -->


</x-frontend.porto.layout.master>
