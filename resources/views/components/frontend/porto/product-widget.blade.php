 <div class="product-widgets-container row pb-2">
                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"
                    data-animation-delay="200">
                    <h4 class="section-sub-title">Featured Products</h4>
                 
                    @foreach ($featureProducts as $featureProduct)                       
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="{{route('frontend.single-product',$featureProduct->id)}}">
                                <img src="{{imagePath($featureProduct->image)}}"
                                    width="84" height="84" alt="product">
                                <img src="{{$featureProduct->images ? imagePath($featureProduct->images->image_2):''}}"
                                    width="84" height="84" alt="product">
                            </a>
                        </figure>

                        <div class="product-details">
                            <h3 class="product-title"> <a href="{{route('frontend.single-product',$featureProduct->id)}}">{{$featureProduct->name}}</a>
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
                                <span class="product-price">$ {{$featureProduct->selling_price}}</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    @endforeach                   
                </div>

                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"
                    data-animation-delay="500">
                    <h4 class="section-sub-title">Best Selling Products</h4>
                    @foreach ($bestSellingProducts as $bestSellingProduct)
                        
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="{{route('frontend.single-product',$bestSellingProduct->id)}}">
                                <img src="{{$bestSellingProduct->image ? imagePath($bestSellingProduct->image):''}}"
                                    width="84" height="84" alt="product">
                                <img src="{{$bestSellingProduct->images ? imagePath($bestSellingProduct->images->image_2):''}}"
                                    width="84" height="84" alt="product">
                            </a>
                        </figure>

                        <div class="product-details">
                            <h3 class="product-title"> <a href="{{route('frontend.single-product',$featureProduct->id)}}">{{$bestSellingProduct->name}}</a> </h3>

                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top">5.00</span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->

                            <div class="price-box">
                                <span class="product-price">$ {{$bestSellingProduct->selling_price}}</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    @endforeach

                    
                </div>

                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"
                    data-animation-delay="800">
                    <h4 class="section-sub-title">Latest Products</h4>
                    @foreach ($latestProducts as $latestProduct)                        
                        <div class="product-default left-details product-widget">
                            <figure>
                                <a href="{{route('frontend.single-product',$latestProduct->id)}}">
                                    <img src="{{imagePath($latestProduct->image)}}"
                                        width="84" height="84" alt="product">
                                    <img src="{{$latestProduct->images ? imagepath($latestProduct->images->image_2):''}}"
                                        width="84" height="84" alt="product">
                                </a>
                            </figure>

                            <div class="product-details">
                                <h3 class="product-title"> <a href="{{route('frontend.single-product',$latestProduct->id)}}">{{$latestProduct->name}}</a>
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
                                    <span class="product-price">$ {{$latestProduct->selling_price}}</span>
                                </div>
                                <!-- End .price-box -->
                            </div>
                            <!-- End .product-details -->
                        </div>
                    @endforeach

                </div>

                <div class="col-lg-3 col-sm-6 pb-5 pb-md-0 appear-animate" data-animation-name="fadeInLeftShorter"
                    data-animation-delay="1100">
                    <h4 class="section-sub-title">Top Rated Products</h4>
                    @foreach ($topRatedProducts as $topRatedProduct)
                        
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="{{route('frontend.single-product',$topRatedProduct->id)}}">
                                <img src="{{imagePath($topRatedProduct->image)}}"
                                    width="84" height="84" alt="product">
                                <img src="{{$topRatedProduct->images ? imagePath($topRatedProduct->images->image_2):''}}"
                                    width="84" height="84" alt="product">
                            </a>
                        </figure>

                        <div class="product-details">
                            <h3 class="product-title"> <a href="{{route('frontend.single-product',$topRatedProduct->id)}}">{{$topRatedProduct->name}}</a>
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
                                <span class="product-price">$ {{$topRatedProduct->selling_price}}</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    @endforeach

                   
                </div>
            </div>