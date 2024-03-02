<x-layouts.master>
   <div class="row">
      <div class="col-lg-7">
         <div class="card">
            <div class="card-body py-4 h-full">
               <div class="row justify-content-between">
                  <div class="col-lg-4 customer">
                     <div class="input-group">
                        <span class="input-group-prepend">
                           <span class="input-group-text"><i class="icon-user"></i></span>
                        </span>
                        <input type="text" class="form-control" placeholder="Left and right icons">
                        <span class="input-group-append bg-blue-700">
                           <span class="input-group-text"><i class="icon-plus3"></i></span>
                        </span>
                     </div>
                  </div>
                  <div class="col-lg-8 product-sku">
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Product by name or sku">
                        <span class="input-group-append bg-indigo-600">
                           <span class="input-group-text"><i class="icon-plus3"></i></span>
                        </span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="table">
               <table class="table"> 
                  <thead class="bg-indigo-600">
                     <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200 h-full">
                     
                     
                  </tbody>
               </table>
            </div>
            <div class="card-footer">
               <div class="row">
                  <div class="col-lg-3">
                    Hello 
                  </div>
                  <div class="col-lg-3">
                     Hello
                  </div>
                  <div class="col-lg-3">
                     Hello
                  </div>
               </div>
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
                           <option value="">Test</option>
                           <option value="">Test</option>
                           <option value="">Test</option>
                     </select>
                  </div>
                  <div class="col-lg-6">
                     <label for="brand">Choose Brand</label>
                     <select name="brand" id="brand" class="form-control select-search">
                           <option value="">Test</option>
                           <option value="">Test</option>
                           <option value="">Test</option>
                     </select>
                  </div>
               </div>
               <div class="row">                
                          <div class="row">
                           <table class="table">
                              <thead>
                                 <tr>
                                    <th>Sl</th>
                                    <th>Product Title</th>
                                    <th>Product Variation SKU</th>
                                    <th>Product Variation</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($products as $product)
                                    @foreach ($product->variations as $item)
                                       <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td>{{$product->name}}</td>
                                          <td>{{$item->variation_sku}}</td>
                                          <td>{{$item->product_variation}}-{{$item->value}}</td>
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
</x-layouts.master>