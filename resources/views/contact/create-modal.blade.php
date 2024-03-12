<div id="createContact" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Contact</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('contacts.store') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Contact Type</label>
                                <div class="col-sm-9">
                                    <select name="contact_type" id="contact_type" class="form-control select-search">
                                        <option value="" disabled selected>--Please Select--</option>
                                        <option value="Suppliers">Suppliers</option>
                                        <option value="Customers">Customers</option>
                                        <option value="Both">Both(Supplier & Customer)</option>
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Contact ID:</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Contact ID" class="form-control"
                                        name="contact_id">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="col-form-label ">Prefix :</label>
                            <input type="text" placeholder="Mr/Mrs/Miss" class="form-control" name="prefix">
                        </div>

                        <div class="col-3">

                            <label class="col-form-label">First Name :</label>

                            <input type="text" placeholder="First Name" class="form-control" name="first_name">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label ">Middle Name :</label>
                            <input type="text" placeholder="Middle Name" class="form-control" name="middle_name">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label 3">Last Name :</label>
                            <input type="text" placeholder="Last Name" class="form-control" name="last_name">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="col-form-label ">Mobile :</label>
                            <input type="text" placeholder="Mobile" class="form-control" name="mobile">
                        </div>

                        <div class="col-3">

                            <label class="col-form-label">Alternate Contact Number :</label>

                            <input type="text" placeholder="Alternate Contact Number" class="form-control"
                                name="alternate_number">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label ">Landline :</label>
                            <input type="text" placeholder="Landline" class="form-control" name="landline">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label 3">Email :</label>
                            <input type="email" placeholder="Email" class="form-control" name="email">

                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="col-form-label ">City :</label>
                            <input type="text" placeholder="City" class="form-control" name="city">
                        </div>

                        <div class="col-3">

                            <label class="col-form-label">State :</label>
                            <input type="text" placeholder="State" class="form-control" name="state">

                        </div>
                        <div class="col-3">
                            <label class="col-form-label ">Country :</label>
                            <input type="text" placeholder="Country" class="form-control" name="country">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label 3">Zip :</label>
                            <input type="text" placeholder="Zip" class="form-control" name="zip">

                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="col-form-label ">Date of Birth :</label>
                            <input type="date" placeholder="Date of Birth" class="form-control"
                                name="date_of_birth">
                        </div>

                        <div class="col-3">

                            <label class="col-form-label">Assigned To :</label>
                            <input type="text" placeholder="Assigned To" class="form-control" name="assigned_to">

                        </div>
                        <div class="col-3">
                            <label class="col-form-label ">Address :</label>
                            <input type="text" placeholder="Address" class="form-control" name="address">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label 3">Address2 :</label>
                            <input type="text" placeholder="Address2" class="form-control" name="address2">

                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Business Name :</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Business Name" class="form-control"
                                        name="business_name">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Shipping Address</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Shipping Address" class="form-control" name="shipping_address">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="modal-footer">
                    <button type="button" class="btn btn-lg bg-danger-400 shadow-2" data-dismiss="modal"><i
                            class="icon-cross2 mr-1"></i>Close</button>
                    <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                            class="icon-checkmark4 mr-1 "></i>{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
