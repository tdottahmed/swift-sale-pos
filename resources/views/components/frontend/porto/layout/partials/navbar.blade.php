<header class="header">
    <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler text-primary mr-2" type="button">
                    <i class="fas fa-bars"></i>
                </button>
                <a href="{{ route('frontend.index') }}" class="logo">
                    <img src="{{ asset('porto') }}/assets/images/logo.png" width="111" height="44"
                        alt="Porto Logo">
                </a>
            </div>
            <!-- End .header-left -->

            <div class="header-right w-lg-max">
                <div
                    class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q"
                                placeholder="Search..." required>
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>

                                    @foreach ($categories as $category)
                                        <option value="4">
                                            <a
                                                href="{{ route('frontend.category-wise-product', $category->id) }}">{{ $category->title }}</a>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- End .select-custom -->
                            <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                        </div>
                        <!-- End .header-search-wrapper -->
                    </form>
                </div>
                <!-- End .header-search -->


                <div class="header-contact d-none d-lg-flex pl-4 pr-4">
                    <img alt="phone" src="{{ asset('porto') }}/assets/images/phone.png" width="30" height="30"
                        class="pb-1">
                    <h6><span>Call us now</span><a href="tel:#" class="text-dark font1">+88 01703671846</a></h6>
                </div>

                <a href="{{ route('login') }}" class="header-icon" title="login"><i class="icon-user-2"></i></a>

                <a href="{{route('frontend.wishlist')}}" class="header-icon" title="wishlist"><i class="icon-wishlist-2"></i></a>

                <div class="dropdown cart-dropdown">
                    @php
                        $cartCount = Auth::user() ? Auth::user()->cart()->count() : 0;
                    @endphp
                    @auth
                        <a href="{{ route('frontend.cart', Auth::user()->id) }}" title="Cart"
                            class="dropdown-toggle">
                            <i class="minicart-icon"></i>
                            <span class="cart-count badge-circle">{{ $cartCount }}</span>
                        </a>
                    @endauth
                    {{-- <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle"
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        data-display="static">
                        <i class="minicart-icon"></i>
                        <span class="cart-count badge-circle">5</span>
                    </a> --}}

                    <div class="cart-overlay"></div>

                    <div class="dropdown-menu mobile-cart">
                        <a href="#" title="Close (Esc)" class="btn-close">×</a>

                        <div class="dropdownmenu-wrapper custom-scrollbar">
                            <div class="dropdown-cart-header">Shopping Cart</div>
                            <!-- End .dropdown-cart-header -->

                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Ultimate 3D Bluetooth Speaker</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $99.00
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ asset('porto') }}/assets/images/products/product-1.jpg"
                                                alt="product" width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->

                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Brown Women Casual HandBag</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $35.00
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ asset('porto') }}/assets/images/products/product-2.jpg"
                                                alt="product" width="80" height="80">
                                        </a>

                                        <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->

                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Circled Ultimate 3D Speaker</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span> × $35.00
                                        </span>
                                    </div>
                                    <!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ asset('porto') }}/assets/images/products/product-3.jpg"
                                                alt="product" width="80" height="80">
                                        </a>
                                        <a href="#" class="btn-remove"
                                            title="Remove Product"><span>×</span></a>
                                    </figure>
                                </div>
                                <!-- End .product -->
                            </div>
                            <!-- End .cart-product -->

                            <div class="dropdown-cart-total">
                                <span>SUBTOTAL:</span>

                                <span class="cart-total-price float-right">$134.00</span>
                            </div>
                            <!-- End .dropdown-cart-total -->

                            {{-- <div class="dropdown-cart-action">
                                <a href="cart.html" class="btn btn-gray btn-block view-cart">View
                                    Cart</a>
                                <a href="checkout.html" class="btn btn-dark btn-block">Checkout</a>
                            </div> --}}
                            <!-- End .dropdown-cart-total -->
                        </div>
                        <!-- End .dropdownmenu-wrapper -->
                    </div>
                    <!-- End .dropdown-menu -->
                </div>
                <!-- End .dropdown -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-middle -->

    <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
        <div class="container">
            <nav class="main-nav w-100">
                <ul class="menu">
                    <li class="active">
                        <a href="{{ route('frontend.index') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">Categories</a>
                        <div class="megamenu megamenu-fixed-width megamenu-3cols">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="submenu">
                                        @foreach ($categories as $category)
                                            <li><a
                                                    href="{{ route('frontend.category-wise-product', $category->id) }}">{{ $category->title }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>

                                <div class="col-lg-6 p-0">
                                    <div class="menu-banner">
                                        <figure>
                                            <img src="{{ asset('porto') }}/assets/images/menu-banner.jpg"
                                                width="192" height="313" alt="Menu banner">
                                        </figure>
                                        <div class="banner-content">
                                            <h4>
                                                <span class="">UP TO</span><br />
                                                <b class="">50%</b>
                                                <i>OFF</i>
                                            </h4>
                                            <a href="category.html" class="btn btn-sm btn-dark">SHOP NOW</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .megamenu -->
                    </li>
                    <li>
                        <a href="{{ route('frontend.products') }}">Products</a>
                        <!-- End .megamenu -->
                    </li>

                    <li><a href="blog.html">Blog</a></li>

                    <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                    <li class="float-right"><a href="{{route('frontend.myOrder')}}" rel="noopener" class="pl-5"
                            target="_blank">My Account</a></li>
                    <li class="float-right"><a href="#" class="pl-5">Special Offer!</a></li>
                </ul>
            </nav>
        </div>
        <!-- End .container -->
    </div>
    <!-- End .header-bottom -->
</header>
