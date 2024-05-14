<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Insert Your Slider Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('slider.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="sub_title">Sub Title:</label>
                    <input type="text" class="form-control" name="sub_title" id="sub_title">
                </div>
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="mb-3">
                    <label for="heading">Heading:</label>
                    <input type="text" class="form-control" name="heading" id="heading">
                </div>
                <div class="mb-3">
                    <label for="starting_text">Starting Text:</label>
                    <input type="text" class="form-control" name="starting_text" id="starting_text">
                </div>
                <div class="mb-3">
                    <label for="highlighted_text">Highlighted Text:</label>
                    <input type="text" class="form-control" name="highlighted_text" id="highlighted_text">
                </div>
                <div class="mb-3">
                    <label for="button_text">Button Text:</label>
                    <input type="text" class="form-control" name="button_text" id="button_text">
                </div>
        
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                          {{-- image, sub_title, title, heading, starting_text, highlighted_text, button_text --}}


 <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i class="icon-checkmark4 mr-1"></i>{{__('Submit')}}</button>
                    </div>
                </div>

            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('slider.index') }}" class="btn 
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
