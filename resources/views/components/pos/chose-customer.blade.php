<div class="form-group row justify-between">
    <div class="col-lg-1">
        <button class="btn btn-light btn-icon" type="button"><i class="icon-user"></i></button>
    </div>
    <div class="col-lg-7">
        <div class="input-group">
            <select name="selected_customer" id="selected_customer"
                class="form-control select-search">
                <option value="0" selected>Walk in Customer</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->fname }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-3">
        <x-customer.create-modal/>
    </div>
</div>