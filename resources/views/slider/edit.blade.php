<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Your Slider Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('slider.update', $slider->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="sub_title">Sub Title:</label>
                    <input type="text" class="form-control" name="sub_title" id="sub_title" value="{{ $slider->sub_title }}">
                </div>
                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $slider->title }}">
                </div>
                <div class="mb-3">
                    <label for="heading">Heading:</label>
                    <input type="text" class="form-control" name="heading" id="heading" value="{{ $slider->heading }}">
                </div>
                <div class="mb-3">
                    <label for="starting_text">Starting Text:</label>
                    <input type="text" class="form-control" name="starting_text" id="starting_text" value="{{ $slider->starting_text }}">
                </div>
                <div class="mb-3">
                    <label for="highlighted_text">Highlighted Text:</label>
                    <input type="text" class="form-control" name="highlighted_text" id="highlighted_text" value="{{ $slider->highlighted_text }}">
                </div>
                <div class="mb-3">
                    <label for="button_text">Button Text:</label>
                    <input type="text" class="form-control" name="button_text" id="button_text" value="{{ $slider->button_text }}">
                </div>
               
                <div class="mb-3">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <img class="mt-1" src="{{ asset('storage/brand') . '/' . $slider->image }}" width="100"
                        height="70" alt="no image">

                </div>


                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Update') }}</button>
                    </div>
                </div>

            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('slider.index') }}"
                class="btn 
            btn-sm bg-indigo 
            border-2 
            border-indigo 
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i
                    class="icon-list"></i></a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
