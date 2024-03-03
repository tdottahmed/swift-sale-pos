<div id="editCustomer" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('customer.update', $customer->id) }}" class="form-horizontal" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">First name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Eugene" class="form-control" name="fname"
                                value="{{ $customer->fname }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Last name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Kopyov" class="form-control" name="lname"
                                value="{{ $customer->lname }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="email" placeholder="eugene@kopyov.com" class="form-control" name="email"
                                value="{{ $customer->email }}">
                            <span class="form-text text-muted">name@domain.com</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Phone #</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999"
                                class="form-control" name="phone" value="{{ $customer->phone }}">
                            <span class="form-text text-muted">+99-99-9999-9999</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Address line 1</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Ring street 12, building D, flat #67"
                                class="form-control" name="address" value="{{ $customer->address }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">City</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Munich" class="form-control" name="city"
                                value="{{ $customer->city }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">State/Province</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Bayern" class="form-control" name="state"
                                value="{{ $customer->state }}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-lg bg-danger-400 shadow-2" data-dismiss="modal"><i
                            class="icon-cross2 mr-1"></i>Close</button>
                    <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                            class="icon-checkmark4 mr-1 "></i>{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
