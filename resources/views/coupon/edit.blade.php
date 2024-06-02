<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Cupon Code') }}
        </x-slot>
        <x-slot name="body">
            <form method="POST" name="discountForm" action="{{ route('coupon.update', $coupon->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title">Code</label>
                    <input value="{{$coupon->code}}" type="text" class="form-control" name="code" id="code" placeholder="Coupon Code">
                    <p></p>
                </div>
                <div class="mb-3">
                    <label for="title">Name</label>
                    <input value="{{$coupon->name}}" type="text" class="form-control" name="name" id="name">
                    <p></p>
                </div>
                
                <div class="mb-3">
                    <label for="max_uses">Max Uses</label>
                    <input value="{{$coupon->max_uses}}" type="number" class="form-control" name="max_uses" id="max_uses">
                </div>
                <div class="mb-3">
                    <label for="max_uses_user">Max Uses User</label>
                    <input value="{{$coupon->max_uses_user}}" type="text" class="form-control" name="max_uses_user" id="max_uses_user">
                </div>

                <div class="mb-3">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control">
                        <option {{($coupon->type == 'percent') ? 'selected' : ''}} value="percent">Percent</option>
                        <option {{($coupon->type == 'fixed') ? 'selected' : ''}} value="fixed">Fixed</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="discount_amount">Discount Amount</label>
                    <input value="{{$coupon->discount_amount}}" type="text" class="form-control" name="discount_amount" id="discount_amount">
                    <p></p>
                </div>

                <div class="mb-3">
                    <label for="min_amount">Min Amount</label>
                    <input value="{{$coupon->min_amount}}" type="text" class="form-control" name="min_amount" id="min_amount">
                </div>

                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option {{($coupon->status == 1) ? 'selected' : ''}}  value="1">Active</option>
                        <option {{($coupon->status == 0) ? 'selected' : ''}}  value="0">Block</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="starts_at">Starts At</label>
                    <input value="{{$coupon->starts_at}}" autocomplete="off" type="text" class="form-control" name="starts_at" id="starts_at">
                    <p></p>
                </div>

                <div class="mb-3">
                    <label for="expires_at">Expires At</label>
                    <input value="{{$coupon->expires_at}}" autocomplete="off" type="text" class="form-control" name="expires_at" id="expires_at">
                    <p></p>
                </div>

                <div class="mb-3">
                    <label for="description">Description</label>
                    <input value="{{$coupon->description}}" type="text" class="form-control" name="description" id="description">
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
            <a href="{{ route('coupon.index')}}" class="btn 
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
