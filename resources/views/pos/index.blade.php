<x-layouts.master>
    <div class="row">
        <div class="col-lg-7"> 
         <div class="card"> 
            <div class="card-body py-4 h-full"> 
               <div class="row justify-content-between"> 
                  <div class="col-lg-6 customer"> 
                     <div class="row"> 
                        <div class="col-lg-8"> 
                           <div class="input-group"> 
                              <label for="customer">Choose Customer</label> 
                              <select name="customer" id="customer" class="form-control select-search"> 
                                    @foreach ($customers as $customer)                                   
                                     <option value="{{$customer->id}}">{{$customer->fname}}</option> 
                                    @endforeach 
                              </select>                       
                           </div>  
                        </div> 
                        <div class="col-lg-4 mt-4"> 
                           <span class="input-group-append" data-toggle="modal" data-target="#createCustomer" > 
                              <span class="input-group-text"><i class="icon-plus3 px-2"></i>Cutomer</span> 
                           </span> 
                        </div> 
                     </div>                     
                  </div> 
                  <div class="col-lg-6 product-sku"> 
                     <div class="input-group mt-4"> 
                        <input type="text" class="form-control" placeholder="Search Product by sku" id="product_sku"> 
                        <span class="input-group-append bg-indigo-600"> 
                           <span class="input-group-text"><i class="icon-search4"></i></span> 
                        </span> 
                     </div> 
                  </div> 
               </div> 
            </div> 
            <div class="table"> 
               <table class="table" id="productTable">  
                  <thead class="bg-indigo-600"> 
                     <tr> 
                        <th>Product</th> 
                        <th>Quantity</th> 
                        <th>Sub Total</th> 
                        <th>Action</th> 
                     </tr> 
                  </thead> 
                  <tbody class="divide-gray-200 h-full"> 
                      
                      
                  </tbody> 
               </table> 
            </div> 
            
         </div> 
      </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    Product
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="category">Choose Category</label>
                            <select name="category" id="category" class="form-control select-search">
                                <option value="">-- Please select --</option>
                                @foreach ($categoryWiseProducts as $category => $products)
                                    <option value="{{ $category }}">{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label for="brand">Choose Brand</label>
                            <select name="brand" id="brand" class="form-control select-search">
                                <option value="">-- Please select --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->title }}">{{ $brand->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Title</th>
                                        <th>Product Variation SKU</th>
                                        <th>Product Variation</th>
                                    </tr>
                                </thead>
                                <tbody id="filteredProducts">
                                    @foreach ($products as $product)
                                        @foreach ($product->variations as $item)
                                            <tr data-category="{{ $product->category }}"
                                                data-brand="{{ $product->brand }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $item->variation_sku }}</td>
                                                <td>{{ $item->product_variation }}-{{ $item->value }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <x-customer.create/>
   @push('scripts')
     <script>
       $(document).ready(function() {
         // console.log('hello');
       });
      </script>       
   @endpush
 
   {{-- Create Employee Modal Start --}}
    @include('customer.create-modal')
    {{-- Create Employee Modal end --}}
    
    @push('scripts')
     <script>
        $(document).ready(function() {
        $('#product_sku').on('input', function() {
            let sku = $(this).val().trim();

            $.ajax({
            url: "{{ route('filterProduct', ':sku') }}".replace(':sku', sku),
            type: "GET",
            success: function(response) {
                $('#productTable tbody').empty();
                if (response.variations.length > 0) {
                $.each(response.variations, function(index, variation) {
                    let productName = variation.product.name;

                    // Create a table row for each variation
                    let quantity =  1;
                    console.log(quantity);
                    let tableRow = `<tr>
                        <td>${productName}</td>
                        <td>
                            <button class="btn btn-sm btn-secondary decrement-quantity">-</button>
                        <span class="quantity mx-3 mt-1">${quantity}</span>
                        <button class="btn btn-sm btn-secondary increment-quantity">+</button>
                        </td>
                    </tr>`;

                    $('#productTable tbody').append(tableRow);
                });
                } else {
                let noResultsRow = `<tr><td colspan="4">No products found.</td></tr>`;
                $('#productTable tbody').append(noResultsRow);
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
            });
        });

        function addProductToCart(product) {
            let row = `<tr data-id="${product.id}">
                <td>${product.name}</td>
                <td>
                    <div class="input-group">
                        <button class="btn btn-sm btn-secondary decrement-quantity">-</button>
                        <span class="quantity mx-3 mt-1">${product.quantity}</span>
                        <button class="btn btn-sm btn-secondary increment-quantity">+</button>
                    </div>
                </td>
                <td>${product.subtotal}</td>
                <td>
                    <button class="btn btn-sm btn-danger delete-product" data-id="${product.id}">Delete</button>
                </td>
            </tr>`;
            $('#productTable tbody').append(row);
        }

        // Event listener for product click
        $('#filteredProducts').on('click', 'tr', function() {
            let productName = $(this).find('td:eq(1)').text().trim(); // Assuming the product name is in the second column (index 1)
            let product = {
                name: productName,
                quantity: 1, // You can set the initial quantity here
                subtotal: '', // You can calculate subtotal here if needed
                id: $(this).data('productId') // Add product ID if needed
            };
            addProductToCart(product);
        });

        // Event listener for increment button
        $('#productTable').on('click', '.increment-quantity', function() {
            let quantitySpan = $(this).siblings('.quantity');
            let currentQuantity = parseInt(quantitySpan.text());
            quantitySpan.text(currentQuantity + 1);
        });

        // Event listener for decrement button
        $('#productTable').on('click', '.decrement-quantity', function() {
            let quantitySpan = $(this).siblings('.quantity');
            let currentQuantity = parseInt(quantitySpan.text());
            if (currentQuantity > 1) {
                quantitySpan.text(currentQuantity - 1);
            }
        });

        $("#filteredProducts tr").show();

        $("#category, #brand").on("change", function() {
            var selectedCategory = $("#category").val();
            var selectedBrand = $("#brand").val();

            $("#filteredProducts tr").hide().filter(function() {
                var categoryMatch = true;
                var brandMatch = true;

                if (selectedCategory !== "") {
                    categoryMatch = $(this).data("category") === selectedCategory || selectedCategory === 'All';
                }

                if (selectedBrand !== "") {
                    brandMatch = $(this).data("brand") === selectedBrand;
                }

                return categoryMatch && brandMatch;
            }).show();
        });
    });
</script>

@endpush


</x-layouts.master>
