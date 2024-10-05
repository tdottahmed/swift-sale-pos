<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Your Shipping Info') }}
        </x-slot>
        <x-slot name="body">

            <form id="updateShippingForm" method="POST" action="{{ route('shipping.update', $shipping->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control" id="country" name="country">
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" {{ $shipping->country_id == $country->id ? 'selected' : '' }}>
                                {{ $country->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('country')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ $shipping->amount }}">
                    @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <p></p>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            {{-- <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title">Amount</label>
                    <input type="text" class="form-control" name="amount" id="amount" value="">

                </div>
                <div class="mb-3">
                    <select name="country" id="country" class="form-control">
                        @if ($countries->isNotEmpty())
                        @foreach ($countries as $country)
                       <option value="{{$country->id}}">{{$country->name}}</option>
                            
                        @endforeach
                        <option value="rest_of_world">Rest of the world</option>
                    @endif
                    </select>
                </div>


                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Update') }}</button>
                    </div>
                </div>

            </form> --}}
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('shipping.index') }}"
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
