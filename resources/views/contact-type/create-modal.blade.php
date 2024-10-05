<div id="createContactType" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Contact</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('contact-type.store') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Title</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Description</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="description" id="description">
                        </div>
                    </div>

                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-lg bg-danger-400 shadow-2" data-dismiss="modal"><i
                            class="icon-cross2 mr-1"></i>Close</button>
                    <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                            class="icon-checkmark4 mr-1 "></i>{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
