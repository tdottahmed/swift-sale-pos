<div id="add_gallery" class="modal fade" tabindex="-1">
   <form action="" method="POST" enctype="multipart/form-data">
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
                     <label class="font-weight-semibold" for="image{{ $i }}">Image- {{$i}}</label>
                           <input type="file" name="image" class="file-input" name="image_{{ $i }}" id="image{{ $i }}" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false" data-fouc>
                  </div>
                  @endfor
                  
               </div>
            </div>

            <div class="modal-footer">
               <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
               <button type="button" class="btn bg-primary">Save</button>
            </div>
         </div>
      </div>
   </form>
</div>