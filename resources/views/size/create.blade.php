<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Insert Your Size Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('size.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Submit') }}</button>
                    </div>
                </div>

            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-action.list-btn route="{{ route('size.index') }}" />
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
