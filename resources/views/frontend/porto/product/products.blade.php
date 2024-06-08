<x-frontend.porto.layout.master>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="product-default inner-btn inner-icon inner-icon-inline left-details">
                        <figure>
                            <a href="{{ route('frontend.single-product', $product->id) }}">
                                <img src="{{ imagePath($product->image) }}" width="280" height="280" alt="product" />
                                <img src="{{ imagePath($product->image) }}" width="280" height="280" alt="product" />
                            </a>

                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-20%</div>
                            </div>
                            <div class="btn-icon-group">
                                @if ($product->track_qty == 'yes')
                                @if ($product->opening_stock > 0)
                                <a href="javascript:void(0);" onclick="addToCart({{$product->id}})" class="btn-icon btn-add-cart product-type-simple" title="add to cart">
                                    <i class="icon-shopping-cart"></i>
                                </a>
                                    @else
                                    <a href="javascript:void(0);" class="btn-icon btn-add-cart product-type-simple" title="Out Of Stock">
                                        <i class="icon-shopping-cart"></i>
                                    </a>
                                @endif
                            
                            @else
                            <a href="javascript:void(0);" onclick="addToCart({{$product->id}})" class="btn-icon btn-add-cart product-type-simple" title="add to cart">
                                <i class="icon-shopping-cart"></i>
                            </a>
                            @endif
                            

                                {{-- <a href="javascript:void(0);" onclick="addToCart({{$product->id}})" class="btn-icon btn-add-cart product-type-simple" title="add to cart">
                                    <i class="icon-shopping-cart"></i>
                                </a> --}}
                                <a href="#" class="btn-icon btn-icon-wish product-type-simple" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="ajax/product-quick-view.html" class="btn-icon btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                            </div>
                        </figure>

                        <div class="product-details">
                            <div class="category-wrap">
                                <div class="category-list">
                                    <a href="category.html" class="product-category">category</a>
                                </div>
                            </div>

                            <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3>

                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:100%"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                            </div>

                            <div class="price-box">
                                <span class="old-price">$90.00</span>
                                <span class="product-price">${{ $product->selling_price }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-frontend.porto.layout.master>

