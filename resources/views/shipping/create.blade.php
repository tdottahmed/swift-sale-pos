<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Shipping Management') }}
        </x-slot>
       


     {{-- </div> --}}
        <x-slot name="body">
            <form action="" id="shippingForm" name="shippingForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Name</label>
                    <select name="country" id="country" class="form-control">
                        @if ($countries->isNotEmpty())
                        @foreach ($countries as $country)
                       <option value="{{$country->id}}">{{$country->name}}</option>
                            
                        @endforeach
                        <option value="rest_of_world">Rest of the world</option>
                    @endif
                    </select>
                    <p></p>
                </div>

                <div class="mb-3">
                    <label for="amount">Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control" placeholder="amount">
                    <p></p>
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
            <a href="{{ route('shipping.index') }}" class="btn 
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
