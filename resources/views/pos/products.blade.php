@push('css')
<style>
    .scrollable-container {
        max-height: 75vh;
        min-height: 75vh;
        overflow-y: auto;
    }
    .product-grid {
        display: flex;
        flex-wrap: wrap;
    }

    .product-card {
        flex: 1 1 calc(20% - 20px);
        margin: 5px;
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
                <div class="product-card" onclick="addProductToCart({{ $product->id }}, null)">
                    <div class="card">
                        <img src="{{ imagePath($product->image) }}" class="card-img" alt="{{ $product->name }}">
                        <div class="text-center">
                            <span class="product-title">{{ str()->limit($product->name, 10) }}</span>
                            <p class="product-sku">({{ $product->sku }})</p>
                            <p class="product-variation">&nbsp;</p> <!-- Placeholder for variation name and value -->
                        </div>
                    </div>
                </div>
            @else
                @foreach ($product->variations as $variation)
                    {{-- Product with variations --}}
                    <div class="product-card" onclick="addProductToCart(null, {{ $variation->id }})">
                        <div class="card">
                            <img src="{{ imagePath($product->image) }}" class="card-img" alt="{{ $product->name }}">
                            <div class="text-center">
                                <span class="product-title">{{ str()->limit($product->name, 10) }}</span>
                                <p class="product-variation">{{ $variation->product_variation }} - {{ $variation->value }}</p>
                                <p class="product-sku">({{ $variation->variation_sku }})</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        @empty
            <div class="col-lg-12 text-center">
                <h6 class="font-weight-bold text-danger">No data Found</h6>
            </div>
        @endforelse
        <!-- Add invisible divs to balance the row -->
        <div style="flex: 1 1 calc(20% - 20px); visibility: hidden;"></div>
        <div style="flex: 1 1 calc(20% - 20px); visibility: hidden;"></div>
        <div style="flex: 1 1 calc(20% - 20px); visibility: hidden;"></div>
        <div style="flex: 1 1 calc(20% - 20px); visibility: hidden;"></div>
    </div>
</div>


