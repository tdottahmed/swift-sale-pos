@forelse ($products as $product)
    @if ($product->variations->isEmpty())
        {{-- Single product without variations --}}
        <div class="col-xl-4 col-sm-4 col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions">
                        <a target="_blank" href="{{ imagePath($product->image ?? 'limitless/global_assets/images/placeholders/not-found.jpg') }}" data-popup="lightbox">
                            <img src="{{ imagePath($product->image ?? 'limitless/global_assets/images/placeholders/not-found.jpg') }}" class="card-img" width="96" alt="{{ $product->name }}">
                            <span class="card-img-actions-overlay card-img">
                                <i class="icon-plus3 icon-2x"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-0">
                            {{ $product->name }}-({{ $product->category }})
                        </h6>
                        <h6 class="font-weight-semibold mb-0">
                            {{ $product->sku }}
                        </h6>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">Price: {{ $product->selling_price }}/-</h3>
                    <button type="button" onclick="addProductToCart({{ $product->id }}, null)" class="btn bg-teal-800 addToCartBtn"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
    @else
        @foreach ($product->variations as $variation)
            {{-- Product with variations --}}
            <div class="col-xl-4 col-sm-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">
                            <a target="_blank" href="{{ imagePath($product->image ?? 'limitless/global_assets/images/placeholders/not-found.jpg') }}" data-popup="lightbox">
                                <img src="{{ imagePath($product->image ?? 'limitless/global_assets/images/placeholders/not-found.jpg') }}" class="card-img" width="96" alt="{{ $product->name }}">
                                <span class="card-img-actions-overlay card-img">
                                    <i class="icon-plus3 icon-2x"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <h6 class="font-weight-semibold mb-0">
                                {{ $product->name }}-({{ $product->category }})
                            </h6>
                            <h6 class="font-weight-semibold mb-0">
                                {{ $variation->variation_sku }}
                            </h6>
                        </div>
                        <h3 class="mb-0 font-weight-semibold">Price: {{ $variation->selling_price }}/-</h3>
                        <button type="button" onclick="addProductToCart(null, {{ $variation->id }}, {{ $variation->price }})" class="btn bg-teal-800 addToCartBtn"><i class="icon-cart-add mr-2"></i> Add to cart</button>
                    </div>
                </div>
            </div>
        @endforeach
   @endif
   @empty
<div class="col-lg-12 text-center">
   <h6 class="font-weight-bold text-danger">No data Founds</h6>
</div>
@endforelse
<div class="card card-body border-top-teal text-center">
    <ul class="pagination pagination-flat pagination-lg align-self-center">
        <li class="page-item"><a href="#" class="page-link">&larr; &nbsp; Prev</a></li>
        <li class="page-item active"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item disabled"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">Next &nbsp; &rarr;</a></li>
    </ul>
</div>