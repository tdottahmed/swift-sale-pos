<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            A 2 Z-{{ $product->id }}
        </x-slot>
        <x-slot name="body">
             
            <div class="row m-1">
                <div class="col-lg-3">
                    <div>
                        <label for="">
                            <p><strong>Product SKU :</strong> {{ isset($product->sku) ? $product->sku : ' ' }}</p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Brand :</strong> {{ isset($product->brand) ? $product->brand : ' ' }}</p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Unit :</strong> {{ isset($product->unit) ? $product->unit : ' ' }}</p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Barcode :</strong>
                                {{ isset($product->barcode_type_id) ? $product->barcode_type_id : ' ' }}</p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Barcode Type :</strong>
                                {{ isset($product->barcode_type) ? $product->barcode_type : ' ' }}</p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Available in locations :</strong>
                                {{ isset($product->product_locations) ? $product->product_locations : ' ' }}</p>
                        </label>
                    </div>


                </div>
                <div class="col-lg-3">
                    <div>
                        <label for="">
                            <p><strong>Category :</strong> {{ isset($product->category) ? $product->category : ' ' }}
                            </p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Sub Category :</strong>
                                {{ isset($product->Sneekers) ? $product->Sneekers : ' ' }}</p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Manage Stock? :</strong>
                                {{ isset($product->manage_stock) ? $product->manage_stock : ' ' }}</p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Alert Quantity :</strong>
                                {{ isset($product->alert_quantity) ? $product->alert_quantity : ' ' }}</p>
                        </label>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div>
                        <label for="">
                            <p><strong>Expires In :</strong>
                                {{ isset($product->expires_in) ? $product->expires_in : ' ' }}</p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Applicable Tax :</strong>
                                {{ isset($product->applicable_tax) ? $product->applicable_tax : ' ' }}</p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Selling Price Tax Type :</strong>
                                {{ isset($product->selling_price_tax_type) ? $product->selling_price_tax_type : ' ' }}
                            </p>
                        </label>
                    </div>
                    <div>
                        <label for="">
                            <p><strong>Product Type :</strong>
                                {{ isset($product->product_type) ? $product->product_type : ' ' }}</p>
                        </label>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div>
                        @if ($product->image)
                            <img src="{{ imagePath($product->image)}}" 
                                 alt="Product Image" width="100%" height="auto">
                        @else
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDpYgKX6Na9EAfhKgjLD4iyPugeNE0wggdkw&usqp=CAU"
                                width="250" height="200" alt="Default Image">
                        @endif
                    </div>


                </div>

            </div>

           @if (!$product->variations->isEmpty())
               
           <div class="table mt-5">
               <table class="table datatable-basic">
                   <thead class="bg-indigo-600">
                       <tr>
                           <th>Variation</th>
                           <th>SKU</th>
                           <th>Current Stock</th>
                           <th>Default Purchase Price (Exc. tax)</th>
                           <th>Default Purchase Price (Inc. tax)</th>
                           <th>X Margin(%)</th>
                           <th>Purchase Price (Exc. tax)</th>
                           <th>Purchase Price (Inc. tax)</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($variations as $variation)
                           <tr>
                               <td>{{ $variation->product_variation }} - {{ $variation->value }}</td>
                               <td>{{ $variation->variation_sku }}</td>
                               <td>{{ $variation->stock }}</td>
                               <td>{{ $variation->purchase_exc }}</td>
                               <td>{{ $variation->purchase_inc }}</td>
                               <td>{{ $variation->profit_margin }}</td>
                               <td>{{ $variation->purchase_exc }}</td>
                               <td>{{ $variation->purchase_inc }}
                               </td>
                              
                           </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
           @endif


        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('product.index') }}"
                class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i
                    class="icon-list"></i></a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
