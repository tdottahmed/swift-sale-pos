<div id="modal_default" class="modal fade show" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('variables.store') }}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Add Variation</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="title">Variation Name:*</label>
                        <input type="text" class="form-control" id="title" name="title"
                            placeholder="Variation Name">
                    </div>
                    <div class="form-group variations">
                        <label for="variationValues">Add variation values:*</label>
                        <div class="input-group ">
                            <input type="text" class="form-control" name="values[]" id="values[]"
                                placeholder="Add variation value">
                        </div>
                    </div>
                    <div class="mt-2 text-right">
                        <button class="btn btn-primary" type="button" id="variation_add"><i
                                class="icon-plus3"></i></button>
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
@push('scripts')
    <script>
        $('#variation_add').click(function() {
            let html = `
            <div class="d-flex justify-content-between align-items-center mt-2">
                <input type="text" class="form-control" name="values[]" placeholder="Add variation value">
                <span class="ml-2 btn btn-danger remove-btn"><i class="icon-cross2"></i></span>
            </div>`;
            $('.variations').append(html);
        });

        $('.variations').on('click', '.remove-btn', function() {
            $(this).parent().remove();
        });
    </script>
@endpush
