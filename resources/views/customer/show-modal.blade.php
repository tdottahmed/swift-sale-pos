<div id="showCustomer" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class=" form-group row">
                    <div class="col-lg-8">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Customer Name</label>
                            <div class="col-lg-9">
                                <p class="form-control">{{ $customer->fname }} {{ $customer->lname }}</p>
                            </div>
                        </div>
                       

                        <div class="form-group row">
                            <label class="col-form-label col-lg-3">Email</label>
                            <div class="col-lg-9">
                                 <p class="form-control">{{ $customer->email }}</p>
                            </div>
                        </div>
                        <div class="form-group row">
                    <label class="col-form-label col-lg-3">Phone #</label>
                    <div class="col-lg-9">
                         <p class="form-control">{{ $customer->phone }}</p>
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Address line 1</label>
                    <div class="col-lg-9">
                         <p class="form-control">{{ $customer->address }}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3">City</label>
                    <div class="col-lg-9">
                         <p class="form-control">{{ $customer->city }}</p>
                        
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3">State/Province</label>
                    <div class="col-lg-9">
                         <p class="form-control">{{ $customer->state }}</p>
                    </div>
                </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            @if ($customer->image)
                                <img src="{{ asset('storage/customers') . '/' . $customer->image }}" width="150"
                                    height="100" alt="Customer Image">
                            @else
                                <img src="https://i.pinimg.com/280x280_RS/79/dd/11/79dd11a9452a92a1accceec38a45e16a.jpg"
                                    width="250" height="200" alt="Default Image">
                            @endif
                        </div>
                    </div>
                </div>

                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-lg bg-danger-400 shadow-2" data-dismiss="modal"><i
                        class="icon-cross2 mr-1"></i>Close</button>
            </div>
        </div>
    </div>
</div>
