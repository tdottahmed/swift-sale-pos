<form action="{{ route('supplier.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="fname">First Name</label>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name">
    </div>
    <div class="form-group">
        <label for="lname">Last Name</label>
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
    </div>
    <div class="form-group">
        <label for="vat_no">VAT Number</label>
        <input type="text" class="form-control" id="vat_no" name="vat_no" placeholder="Enter VAT number">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
    </div>
    <div class="form-group">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter city">
    </div>
    <div class="form-group">
        <label for="state">State/Province</label>
        <input type="text" class="form-control" id="state" name="state" placeholder="Enter state/province">
    </div>
    <div class="form-group">
        <label for="postal_code">Postal Code</label>
        <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Enter postal code">
    </div>
    <div class="form-group">
        <label for="country">Country</label>
        <input type="text" class="form-control" id="country" name="country" placeholder="Enter country">
    </div>
    </div>
    <div class="text-right">
      <button type="button" class="btn btn-lg bg-danger-400 shadow-2" data-dismiss="modal"><i
         class="icon-cross2 mr-1"></i>Close</button>
      <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
         class="icon-checkmark4 mr-1 "></i>{{ __('Submit') }}</button>
     </div>
</form>
