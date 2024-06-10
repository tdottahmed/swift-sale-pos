<div id="modal_default" class="modal fade show" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('tax.store') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Add Tax</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:*</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Enter Tax Title">
                    </div>
                    <div class="form-group variations">
                        <label for="variationValues">Add Tax Rate:*</label>
                        <div class="input-group ">
                            <input type="text" class="form-control" name="value" id="value"
                                placeholder="Enter Tax Rate">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn bg-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
