<h2 class="section-title heading-border ls-20 border-0">New Arrivals</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2"
                data-owl-options="{
                    'dots': false,
                    'nav': true,
                    'responsive': {
                        '992': {
                            'items': 4
                        },
                        '1200': {
                            'items': 5
                        }
                    }
                }">
                @foreach ($products as $product)
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="product.html">
                            <img src="{{imagePath($product->image)}}" width="220"
                                height="220" alt="product">
                            {{-- <img src="{{ asset('porto') }}/assets/images/products/product-6-2.jpg" width="220"
                                height="220" alt="product"> --}}
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="category.html" class="product-category">Category</a>
                        </div>
                        <h3 class="product-title">
                            <a href="product.html">{{$product->title}}</a>
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
                            <del class="old-price">$59.00</del>
                            <span class="product-price">{{$product->selling_price}}</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">
                            <a href="wishlist.html" class="btn-icon-wish" title="wishlist"><i
                                    class="icon-heart"></i></a>
                            <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                            <a href="{{ asset('porto') }}/ajax/product-quick-view.html" class="btn-quickview"
                                title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                    <!-- End .product-details -->
                </div> 
                @endforeach
               
               
            </div>