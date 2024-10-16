<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Insert Your Holiday Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('holiday.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
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


                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i class="icon-checkmark4 mr-1"></i>{{__('Submit')}}</button>
                    </div>
                </div>

            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('holiday.index') }}" class="btn 
            btn-sm bg-indigo 
            border-2 
            border-indigo 
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i class="icon-list"></i></a>           
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
