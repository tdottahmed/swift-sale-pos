<x-frontend.porto.layout.master>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="product-default inner-btn inner-icon inner-icon-inline left-details">
                        <figure>
                            <a href="{{ route('frontend.single-product', $product->id) }}">
                                <img src="{{ imagePath($product->image) }}" width="280" height="280" alt="product" />
                                <img src="{{ imagePath($product->image) }}" width="280" height="280"
                                    alt="product" />
                            </a>

                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-20%</div>
                            </div>
                            <div class="btn-icon-group">
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i></a>
                                <a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i
                                        class="icon-heart"></i></a>
                                <a href="ajax/product-quick-view.html" class="btn-icon btn-quickview"
                                    title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                            </div>
                        </figure>

                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">category</a>
                                </div>
                            </div>

                            <h3 class="product-title"> <a href="product.html">{{ $product->name }}</a>
                            </h3>

                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->

                            <div class="price-box">
                                <span class="old-price">$90.00</span>
                                <span class="product-price">${{ $product->selling_price }}</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
            @endforeach

            <!-- End .col-sm-4 -->
        </div>
    </div>
</x-frontend.porto.layout.master>
