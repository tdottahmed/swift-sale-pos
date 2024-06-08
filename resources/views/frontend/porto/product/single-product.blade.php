{{-- @dd($product->images) --}}
<x-frontend.porto.layout.master>
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="demo4.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Single Products</a></li>
                </ol>
            </nav>

            <div class="product-single-container product-single-default">
                <div class="cart-message d-none">
                    <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                    <span>has been added to your cart.</span>
                </div>

                <div class="row">
                    <div class="col-lg-5 col-md-6 product-single-gallery">
                        <div class="product-slider-container">
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>

                                <div class="product-label label-sale">
                                    -16%
                                </div>
                            </div>

                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                <div class="product-item">
                                    <img class="product-single-image" src="{{ imagePath($product->image) }}"
                                        data-zoom-image="{{ imagePath($product->image) }}" width="468" height="468"
                                        alt="product" />
                                </div>
                            </div>
                            <!-- End .product-single-carousel -->
                            <span class="prod-full-screen">
                                <i class="icon-plus"></i>
                            </span>
                        </div>

                        <div class="prod-thumbnail owl-dots">
                            @foreach (range(1, 6) as $image)
                                <div class="owl-dot">
                                    <img src="{{ imagePath($product->images->{'image_' . $loop->iteration}) }}"
                                        width="110" height="110" alt="product-thumbnail" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End .product-single-gallery -->

                    @php
                      if ($product->reviews->sum('rating')>1) {
                        $totalRatings = $product->reviews->sum('rating');
                       $totalReview = count($product->reviews);
                        $ratingWidth= $totalRatings/$totalReview;
                      }
                    @endphp
                    <div class="col-lg-7 col-md-6 product-single-details">
                        <h1 class="product-title">{{ $product->name }}</h1>

                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:{{isset($ratingWidth) ? $ratingWidth * 20 : 0}}%"></span>
                                <!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                            <!-- End .product-ratings -->

                            <a href="#" class="rating-link">( {{isset($totalReview) ? $totalReview : 0}} Reviews )</a>
                        </div>
                        <!-- End .ratings-container -->

                        <hr class="short-divider">

                        <div class="price-box">
                            <span class="old-price">$1,999.00</span>
                            <span class="new-price">${{ $product->selling_price }}</span>
                        </div>
                        <!-- End .price-box -->

                        <div class="product-desc">
                            <p>
                                {{ $product->description ? $product->description : 'Sorry! This is dumy description' }}
                            </p>
                        </div>
                        <!-- End .product-desc -->

                        <ul class="single-info-list">

                            <li>
                                <strong>{{ $product->sku }}</strong>
                            </li>

                            <li>
                                CATEGORY: <strong><a href="#"
                                        class="product-category">{{ $product->category }}</a></strong>
                            </li>

                            {{-- <li>
                                    TAGs: <strong><a href="#" class="product-category">CLOTHES</a></strong>,
                                    <strong><a href="#" class="product-category">SWEATER</a></strong>
                                </li> --}}
                        </ul>

                        <div class="product-action">
                            <div class="product-single-qty">
                                <input class="horizontal-quantity form-control" type="text">
                            </div>
                            <!-- End .product-single-qty -->
                            @if ($product->track_qty == 'yes')
                                @if ($product->qty > 0)
                                <a href="javascript:void(0);" onclick="addToCart({{$product->id}})" class="btn btn-dark btn-add-cart mr-2" title="Add to Cart">Add to
                                    Cart</a>
                                    @else
                                    <a href="javascript:void(0);" class="btn btn-dark btn-add-cart mr-2" title="Add to Cart">Out Of Stock</a>
                                @endif
                            
                            @else
                            <a href="javascript:void(0);" onclick="addToCart({{$product->id}})" class="btn btn-dark btn-add-cart mr-2" title="Add to Cart">Add to
                                Cart</a>
                            @endif
                            

                            @auth
                            <a href="{{ route('frontend.cart', Auth::user()->id) }}"
                                class="btn btn-gray view-cart d-none">View cart</a>
                            @endauth
                        </div>
                        <!-- End .product-action -->

                        <hr class="divider mb-0 mt-0">

                        <div class="product-single-share mb-3">
                            <label class="sr-only">Share:</label>

                            <div class="social-icons mr-2">
                                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"
                                    title="Facebook"></a>
                                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"
                                    title="Twitter"></a>
                                <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank"
                                    title="Linkedin"></a>
                                <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank"
                                    title="Google +"></a>
                                <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank"
                                    title="Mail"></a>
                            </div>
                            <!-- End .social-icons -->

                            <a href="wishlist.html" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
                                    class="icon-wishlist-2"></i><span>Add to
                                    Wishlist</span></a>
                        </div>
                        <!-- End .product single-share -->
                    </div>
                    <!-- End .product-single-details -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .product-single-container -->

            <div class="product-single-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                            role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-size" data-toggle="tab" href="#product-size-content"
                            role="tab" aria-controls="product-size-content" aria-selected="true">Size Guide</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-tags" data-toggle="tab" href="#product-tags-content"
                            role="tab" aria-controls="product-tags-content" aria-selected="false">Additional
                            Information</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="product-tab-reviews" data-toggle="tab"
                            href="#product-reviews-content" role="tab" aria-controls="product-reviews-content"
                            aria-selected="false">Reviews ({{isset($totalReview) ? $totalReview  : 0}})</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                        aria-labelledby="product-tab-desc">
                        <div class="product-desc-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed
                                do, quis nostrud exercitation ullamco laboris
                                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                            </p>
                            <ul>
                                <li>Any Product types that You want - Simple, Configurable
                                </li>
                                <li>Downloadable/Digital Products, Virtual Products
                                </li>
                                <li>Inventory Management with Backordered items
                                </li>
                            </ul>
                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. </p>
                        </div>
                        <!-- End .product-desc-content -->
                    </div>
                    <!-- End .tab-pane -->

                    <div class="tab-pane fade" id="product-size-content" role="tabpanel"
                        aria-labelledby="product-tab-size">
                        <div class="product-size-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset('porto/images/products/single/body-shape.png') }}"
                                        alt="body shape" width="217" height="398">
                                </div>
                                <!-- End .col-md-4 -->

                                <div class="col-md-8">
                                    <table class="table table-size">
                                        <thead>
                                            <tr>
                                                <th>SIZE</th>
                                                <th>CHEST(in.)</th>
                                                <th>WAIST(in.)</th>
                                                <th>HIPS(in.)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>XS</td>
                                                <td>34-36</td>
                                                <td>27-29</td>
                                                <td>34.5-36.5</td>
                                            </tr>
                                            <tr>
                                                <td>S</td>
                                                <td>36-38</td>
                                                <td>29-31</td>
                                                <td>36.5-38.5</td>
                                            </tr>
                                            <tr>
                                                <td>M</td>
                                                <td>38-40</td>
                                                <td>31-33</td>
                                                <td>38.5-40.5</td>
                                            </tr>
                                            <tr>
                                                <td>L</td>
                                                <td>40-42</td>
                                                <td>33-36</td>
                                                <td>40.5-43.5</td>
                                            </tr>
                                            <tr>
                                                <td>XL</td>
                                                <td>42-45</td>
                                                <td>36-40</td>
                                                <td>43.5-47.5</td>
                                            </tr>
                                            <tr>
                                                <td>XXL</td>
                                                <td>45-48</td>
                                                <td>40-44</td>
                                                <td>47.5-51.5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End .row -->
                        </div>
                        <!-- End .product-size-content -->
                    </div>
                    <!-- End .tab-pane -->

                    <div class="tab-pane fade" id="product-tags-content" role="tabpanel"
                        aria-labelledby="product-tab-tags">
                        <table class="table table-striped mt-2">
                            <tbody>
                                <tr>
                                    <th>Weight</th>
                                    <td>23 kg</td>
                                </tr>

                                <tr>
                                    <th>Dimensions</th>
                                    <td>12 × 24 × 35 cm</td>
                                </tr>

                                <tr>
                                    <th>Color</th>
                                    <td>Black, Green, Indigo</td>
                                </tr>

                                <tr>
                                    <th>Size</th>
                                    <td>Large, Medium, Small</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- End .tab-pane -->
                <x-frontend.porto.review :product="$product" />
                    <!-- End .tab-pane -->
                </div>
                <!-- End .tab-content -->
            </div>
            <!-- End .product-single-tabs -->

            <div class="products-section pt-0">
                <h2 class="section-title">Related Products</h2>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                    @foreach ($relatedProducts as $relatedProduct)
                        <div class="product-default">
                            <figure>
                                <a href="{{ route('frontend.single-product', $relatedProduct->id) }}">
                                    <img src="{{ imagePath($relatedProduct->image) }}" width="280" height="280"
                                        alt="product">
                                    <img src="{{ imagePath($relatedProduct->images->image_2) }}" width="280"
                                        height="280" alt="product">
                                </a>
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>
                                    <div class="product-label label-sale">-20%</div>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">Category</a>
                                </div>
                                <h3 class="product-title">
                                    <a
                                        href="{{ route('frontend.single-product', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                                <!-- End .product-container -->
                                <div class="price-box">
                                    <del class="old-price">$ {{ $relatedProduct->selling_price }}</del>
                                    <span class="product-price">$ {{ $relatedProduct->selling_price }}</span>
                                </div>
                                <!-- End .price-box -->
                                <div class="product-action">
                                    <a href="wishlist.html" title="Wishlist" class="btn-icon-wish"><i
                                            class="icon-heart"></i></a>
                                    <a href="{{ route('frontend.single-product', $relatedProduct->id) }}"
                                        class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>Vew
                                            Details</span></a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach
                </div>
                <!-- End .products-slider -->
            </div>
            <!-- End .products-section -->

            <hr class="mt-0 m-b-5" />

            <x-frontend.porto.product-widget />

            
        </div>
    </main>
</x-frontend.porto.layout.master>
