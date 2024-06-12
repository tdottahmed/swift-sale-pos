<div id="add_gallery" class="modal fade" tabindex="-1">
   <form action="{{route('product.image.store', $product->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-dialog modal-dialog-scrollable modal-full">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Add Gallery Images</h5>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
               <div class="row">
                     @for ($i = 1; $i <= 6; $i++)
                         <div class="col-lg-4">
                             <label for="image{{ $i }}">Image -
                                 {{ $i }}</label>
                             <input type="file" class="form-control h-auto"
                                 name="image_{{ $i }}" id="image{{ $i }}">
                         </div>
                     @endfor
                  
               </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
               <button type="submit" class="btn bg-primary">Save</button>
            </div>
         </div>
      </div>
   </form>
</div>