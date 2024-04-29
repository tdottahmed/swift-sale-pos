<div id="createRepair" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Repair</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('repair.store') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Delivery Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="delivery_date" id="delivery_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Repair Completed On</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="repair_completed_on"
                                id="repair_completed_on">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Status</label>
                        <div class="col-sm-9">
                            <select name="status" id="status" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            <option value="1">Pending</option>
                            <option value="2">Delivered</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Brand</label>
                        <div class="col-sm-9">
                            <select name="brand_id" id="brand_id" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Device</label>
                        <div class="col-sm-9"><select name="device" id="device" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            <option value="Watch">Watch</option>
                            <option value="Phone">Phone</option>

                        </select>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Device Model</label>
                        <div class="col-sm-9">
                            <select name="device_model" id="device_model" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            <option value="Watch12">Watch-12</option>
                            <option value="Phone12">Phone-12</option>

                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Serial Number</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="serial_number" id="serial_number">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Problem Reported By Customer</label>
                        <div class="col-sm-9">
                            <textarea name="prb_reported_by_customer" id="prb_reported_by_customer" class="form-control" cols="30"
                                rows="5"></textarea>
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