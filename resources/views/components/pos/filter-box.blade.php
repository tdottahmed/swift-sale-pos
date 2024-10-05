<div class="row">
    <div class="col-lg-4">
        <select name="category" id="category" class="form-control select-search">
            <option value="">Select Category</option>
            @foreach ($categories as $category )
                <option value="{{ $category->title }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Product by Product name or SKU"
                id="sku">
            <span class="input-group-append bg-indigo-600">
                <span class="input-group-text"><i class="icon-search4"></i></span>
            </span>
        </div>
    </div>
    <div class="col-lg-4">
        <select name="brand" id="brand" class="form-control select-search">
            <option value="">Select Brand</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->title }}">{{ $brand->title }}</option>
            @endforeach
        </select>
    </div>
</div>
@push('scripts')
    <script>
         $(document).ready(function() {
            // Trigger filtering when the category, brand changes or SKU is entered
            $('#category, #brand').change(filterProducts);
            $('#sku').on('input', debounce(filterProducts, 300));  // Trigger filtering on input change for SKU with debounce

            function filterProducts() {
                // Get the values from the filter inputs
                let category = $('#category').val();
                let sku = $('#sku').val();
                let brand = $('#brand').val();

                // Show the loader
                $('#productList').hide();
                $('#loader').show();

                // Make an AJAX request to the server to get the filtered products
                $.ajax({
                    url: '/filter-products',
                    type: 'GET',
                    data: {
                        category: category,
                        sku: sku,
                        brand: brand
                    },
                    success: function(data) {
                        // Hide the loader
                        $('#loader').hide();
                        $('#productList').show();
                        
                        // Update the product list with the filtered products
                        $('#productList').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // Hide the loader
                        $('#loader').hide();
                    }
                });
            }

            // Debounce function to limit the rate of calling filterProducts
            function debounce(func, wait) {
                let timeout;
                return function() {
                    const context = this, args = arguments;
                    clearTimeout(timeout);
                    timeout = setTimeout(() => func.apply(context, args), wait);
                };
            }
        });
    </script>
@endpush