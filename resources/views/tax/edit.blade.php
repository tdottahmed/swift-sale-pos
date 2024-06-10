<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Tax Details') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('tax.update', $tax->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Title:*</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$tax->title}}"
                        placeholder="Enter Tax Title">
                </div>
                <div class="form-group variations">
                    <label for="variationValues">Add Tax Rate:*</label>
                    <div class="input-group ">
                        <input type="text" class="form-control" name="value" id="value"
                            placeholder="Enter Tax Rate" value="{{$tax->value}}">
                    </div>
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
            <a href="{{ route('tax.index') }}"
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
</x-layouts.master>
