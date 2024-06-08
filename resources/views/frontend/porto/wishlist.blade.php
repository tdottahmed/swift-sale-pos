<x-frontend.porto.layout.master>

    <main class="main">
        <div class="page-header">
            <div class="container d-flex flex-column align-items-center">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Wishlist
                            </li>
                        </ol>
                    </div>
                </nav>
    
                <h1>Wishlist</h1>
            </div>
        </div>
    
        <div class="container">
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

            <div class="wishlist-title">
                <h2 class="p-2">My wishlist on Porto Shop 4</h2>
            </div>
            <div class="wishlist-table-container">
                <table class="table table-wishlist mb-0">
                    <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col">Product</th>
                            <th class="price-col">Price</th>
                            <th class="status-col">Stock Status</th>
                            <th class="action-col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($wishlists->isNotEmpty())
                            @foreach ($wishlists as $wishlist)
                            <tr class="product-row">
                                <td>
                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="assets/images/products/product-4.jpg" alt="product">
                                        </a>
        
                                        <a href="#" class="btn-remove icon-cancel" onclick="removeProduct({{$wishlist->product_id}})" title="Remove Product"></a>
                                    </figure>
                                </td>
                                <td>
                                    <h5 class="product-title">
                                        <a href="product.html">{{ $wishlist->product->name }}</a>
                                    </h5>
                                </td>
                                <td class="price-box">
                                    ${{$wishlist->product->selling_price}}
                                </td>
                                <td>
                                    <span class="stock-status">In stock</span>
                                </td>
                                <td class="action">
                                    <a href="{{ route('frontend.single-product', $wishlist->product->id) }}" class="btn btn-success mt-1 mt-md-0"
                                        title="Quick View">Quick
                                        View</a>
                                    <a href="javascript:void(0);" onclick="addToCart({{$wishlist->product->id}})" class="btn btn-dark btn-add-cart product-type-simple btn-shop">
                                        ADD TO CART
                                    </a>

                                    <a href="javascript:void(0);" onclick="removeProduct({{$wishlist->product_id}})" class="btn btn-danger btn-add-cart product-type-simple btn-shop">
                                        Remove
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <div>
                                <h3>Your Wishlist is Empty!!!</h3>
                            </div>
                        @endif
                       
    
                        
                    </tbody>
                </table>
            </div><!-- End .cart-table-container -->
        </div><!-- End .container -->
    </main><!-- End .main -->

    
</x-frontend.porto.layout.master>