<x-data-entry.form action="{{ route('supplier.store') }}">

    <x-data-entry.input type="text" name="fname" placeholder="Enter First Name" attribte="readonly"/>
    <x-data-entry.text-area name="description" label="Description" placeholder="Enter description..." :cols="30" :rows="5"/>


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
</x-data-entry.form>