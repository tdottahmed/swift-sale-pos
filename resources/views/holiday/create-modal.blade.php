<div id="createEmployee" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Insert Your Holiday Info') }}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>



        {{-- <x-slot name="heading">
            {{ __('Insert Your Holiday Info') }}
        </x-slot> --}}

            <form action="{{ route('holiday.store') }} " method="POST" enctype="multipart/form-data">
                @csrf

            <div class="modal-body">
                <div class="mb-3">
                    <label for="date_from">From:</label>
                    <input type="date" class="form-control" name="date_from" id="date_from">
                </div>


                <div class="mb-3">
                    <label for="date_to">To:</label>
                    <input type="date" class="form-control" name="date_to" id="date_to">
                </div>


                <div class="mb-3">
                    <label for="note">Note:</label>
                    <input type="text" class="form-control" name="note" id="note">
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
</div>

