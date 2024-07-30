   <x-data-entry.form action="{{ route('product.image.store', $product->id) }}" :hasFile=true>
       <div class="row align-items-center">
           <div class="col-lg-4">
               <div class="mb-3">
                   <label>Current Main Image</label>
                   <div>
                       <img src="{{ imagePath($product->image) }}" height="120" alt="{{ $product->name }}">
                   </div>
               </div>
           </div>
           <div class="col-lg-8">
               <x-data-entry.input-file name="main_image" label="Add Main Image" />
           </div>
       </div>
       <hr>
       <h6>{{ __('Add Galary image') }}</h6>
       <div class="row mb-2">
           @for ($i = 1; $i <= 6; $i++)
               <div class="col-lg-4">
                   <label for="image{{ $i }}">Image -
                       {{ $i }}</label>
                   <input type="file" class="form-control h-auto" name="image_{{ $i }}"
                       id="image{{ $i }}">
               </div>
           @endfor
       </div>
   </x-data-entry.form>
