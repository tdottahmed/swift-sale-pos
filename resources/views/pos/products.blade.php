@push('css')
<style>
      .scrollable-container {
        max-height: 600px;
        overflow-y: auto;
        padding: 10px;
    }
    .product-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around; /* Adjusted to space around */
    }

    .product-card {
        flex: 1 1 calc(16.666% - 20px);
        margin: 10px;
        box-sizing: border-box;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .product-card:hover {
        transform: scale(1.05);
    }

    .card-img {
        max-width: 100%;
        height: 100px;
    }
</style>
@endpush

<div class="scrollable-container">
    <div class="product-grid">
        @forelse ($products as $product)
            @if ($product->variations->isEmpty())
                {{-- Single product without variations --}}
                <div class="product-card" onclick="addProductToCart({{ $product->id }}, null)">
                    <div class="card">
                        <img src="{{ imagePath($product->image ?? 'limitless/global_assets/images/placeholders/not-found.jpg') }}"
                            class="card-img" alt="{{ $product->name }}">
                        <div class="p-1 text-center">
                            <div class="mb-2">
                                <h6 class="font-weight-semibold mb-0">
                                    {{ $product->name }}-({{ $product->category }})
                                </h6>
                                <h6 class="font-weight-semibold mb-0">
                                    {{ $product->sku }}
                                </h6>
                                <h3 class="mb-0 font-weight-semibold">{{ $product->selling_price }}/-</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($product->variations as $variation)
                    {{-- Product with variations --}}
                    <div class="product-card"
                        onclick="addProductToCart(null, {{ $variation->id }}, {{ $variation->price }})">
                        <div class="card">
                            <img src="{{ imagePath($product->image ?? 'limitless/global_assets/images/placeholders/not-found.jpg') }}"
                                class="card-img" alt="{{ $product->name }}">
                            <div class="p-1 text-center">
                                <h6 class="font-weight-semibold mb-0">
                                    {{ $product->name }}-({{ $product->category }})
                                </h6>
                                <p class="text-danger">
                                    {{ $variation->product_variation }}-{{ $variation->value }}
                                </p>
                                <h6 class="font-weight-semibold mb-0">
                                    {{ $variation->variation_sku }}
                                </h6>
                                <h6 class="mb-0 font-weight-semibold">{{ $variation->selling_price }}/-</h6>
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
        <div style="flex: 1 1 calc(16.666% - 20px); visibility: hidden;"></div>
    </div>
</div>
