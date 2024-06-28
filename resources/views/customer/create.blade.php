
<form action="{{route('customer.store')}}" class="form-horizontal" method="POST">
   @csrf
      <div class="form-group row">
         <label class="col-form-label col-sm-3">First name</label>
         <div class="col-sm-9">
            <input type="text" placeholder="Eugene" class="form-control" name="fname">
         </div>
      </div>

      <div class="form-group row">
         <label class="col-form-label col-sm-3">Last name</label>
         <div class="col-sm-9">
            <input type="text" placeholder="Kopyov" class="form-control" name="lname">
         </div>
      </div>

      <div class="form-group row">
         <label class="col-form-label col-sm-3">Email</label>
         <div class="col-sm-9">
            <input type="email" placeholder="eugene@kopyov.com" class="form-control" name="email">
            <span class="form-text text-muted">name@domain.com</span>
         </div>
      </div>

      <div class="form-group row">
         <label class="col-form-label col-sm-3">Phone #</label>
         <div class="col-sm-9">
            <input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999" class="form-control" name="phone">
            <span class="form-text text-muted">+99-99-9999-9999</span>
         </div>
      </div>

      <div class="form-group row">
         <label class="col-form-label col-sm-3">Address line 1</label>
         <div class="col-sm-9">
            <input type="text" placeholder="Ring street 12, building D, flat #67" class="form-control" name="address">
         </div>
      </div>

      <div class="form-group row">
         <label class="col-form-label col-sm-3">City</label>
         <div class="col-sm-9">
            <input type="text" placeholder="Munich" class="form-control" name="city">
         </div>
      </div>

      <div class="form-group row">
         <label class="col-form-label col-sm-3">State/Province</label>
         <div class="col-sm-9">
            <input type="text" placeholder="Bayern" class="form-control" name="state">
         </div>
      </div>
     <div class="text-right">
      <button type="button" class="btn btn-lg bg-danger-400 shadow-2" data-dismiss="modal"><i
         class="icon-cross2 mr-1"></i>Close</button>
      <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
         class="icon-checkmark4 mr-1 "></i>{{ __('Submit') }}</button>
     </div>
</form>