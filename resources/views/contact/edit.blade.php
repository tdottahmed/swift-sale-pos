<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Your Contact') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('contacts.update', $contact->id) }}" class="form-horizontal" method="POST">
                @csrf
                @method('put')
                {{-- @dd($contact); --}}
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Contact Type</label>
                                <div class="col-sm-9">
                                    <select name="contact_type" id="contact_type" class="form-control select-search">
                                        <option value="1"
                                            {{ $contact->contact_type == 'Suppliers' ? 'selected' : '' }}>Suppliers
                                        </option>
                                        <option value="2"
                                            {{ $contact->contact_type == 'Customers' ? 'selected' : '' }}>Customers
                                        </option>
                                        
                                    </select>
                                </div>

                            </div>


                        </div>

                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Contact ID:</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Contact ID" class="form-control"
                                        name="contact_id" value="{{ $contact->contact_id }}">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="col-form-label ">Prefix :</label>
                            <input type="text" placeholder="Mr/Mrs/Miss" class="form-control" name="prefix"
                                value="{{ $contact->prefix }}">
                        </div>

                        <div class="col-3">

                            <label class="col-form-label">First Name :</label>

                            <input type="text" placeholder="First Name" class="form-control" name="first_name"
                                value="{{ $contact->first_name }}">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label ">Middle Name :</label>
                            <input type="text" placeholder="Middle Name" class="form-control" name="middle_name"
                                value="{{ $contact->middle_name }}">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label 3">Last Name :</label>
                            <input type="text" placeholder="Last Name" class="form-control" name="last_name"
                                value="{{ $contact->last_name }}">
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="col-form-label ">Mobile :</label>
                            <input type="text" placeholder="Mobile" class="form-control" name="mobile"
                                value="{{ $contact->mobile }}">
                        </div>

                        <div class="col-3">

                            <label class="col-form-label">Alternate Contact Number :</label>

                            <input type="text" placeholder="Alternate Contact Number" class="form-control"
                                name="alternate_number" value="{{ $contact->alternate_number }}">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label ">Landline :</label>
                            <input type="text" placeholder="Landline" class="form-control" name="landline"
                                value="{{ $contact->landline }}">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label 3">Email :</label>
                            <input type="email" placeholder="Email" class="form-control" name="email"
                                value="{{ $contact->email }}">

                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="col-form-label ">City :</label>
                            <input type="text" placeholder="City" class="form-control" name="city"
                                value="{{ $contact->city }}">
                        </div>

                        <div class="col-3">

                            <label class="col-form-label">State :</label>
                            <input type="text" placeholder="State" class="form-control" name="state"
                                value="{{ $contact->state }}">

                        </div>
                        <div class="col-3">
                            <label class="col-form-label ">Country :</label>
                            <input type="text" placeholder="Country" class="form-control" name="country"
                                value="{{ $contact->country }}">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label 3">Zip :</label>
                            <input type="text" placeholder="Zip" class="form-control" name="zip"
                                value="{{ $contact->zip }}">

                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-3">
                            <label class="col-form-label ">Date of Birth :</label>
                            <input type="date" placeholder="Date of Birth" class="form-control"
                                name="date_of_birth" value="{{ $contact->date_of_birth }}">
                        </div>

                        <div class="col-3">

                            <label class="col-form-label">Assigned To :</label>
                            <input type="text" placeholder="Assigned To" class="form-control" name="assigned_to"
                                value="{{ $contact->assigned_to }}">

                        </div>
                        <div class="col-3">
                            <label class="col-form-label ">Address :</label>
                            <input type="text" placeholder="Address" class="form-control" name="address"
                                value="{{ $contact->address }}">
                        </div>
                        <div class="col-3">
                            <label class="col-form-label 3">Address2 :</label>
                            <input type="text" placeholder="Address2" class="form-control" name="address2"
                                value="{{ $contact->address2 }}">

                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Business Name :</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Business Name" class="form-control"
                                        name="business_name" value="{{ $contact->business_name }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-form-label col-sm-3">Shipping Address</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="Shipping Address" class="form-control"
                                        name="shipping_address" value="{{ $contact->shipping_address }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href="{{ route('contacts.index') }}"><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('contacts.index') }}"
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
