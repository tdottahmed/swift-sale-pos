<div id="createEmployee" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Insert Your Leave Type Info') }}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>




            <form action="{{ route('leaveType.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>


                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i class="icon-checkmark4 mr-1"></i>{{__('Submit')}}</button>
                    </div>
                </div>
            </div>

            </form>

            
        </div>
    </div>
</div>

