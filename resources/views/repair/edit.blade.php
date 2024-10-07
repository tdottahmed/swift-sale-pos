<x-data-entry.form action="{{ route('repair.update', $repair->id) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Delivery Date</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="delivery_date" id="delivery_date"
                        value="{{ $repair->delivery_date }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Repair Completed On</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="repair_completed_on" id="repair_completed_on"
                        value="{{ $repair->repair_completed_on }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Serial Number</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="serial_number" id="serial_number"
                        value="{{ $repair->serial_number }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Problem Reported By Customer</label>
                <div class="col-sm-9">
                    <textarea name="prb_reported_by_customer" id="prb_reported_by_customer" class="form-control" cols="30"
                        rows="5">{{ $repair->prb_reported_by_customer }}</textarea>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Status</label>
                <div class="col-sm-9">
                    <select name="status" id="status" class="form-control select-search">
                        <option value="">-- Please select --</option>
                        <option value="1" {{ $repair->status == 1 ? 'selected' : '' }}>Pending</option>
                        <option value="2" {{ $repair->status == 2 ? 'selected' : '' }}>Delivered
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-sm-3">Brand</label>
                <div class="col-sm-9">
                    <select name="brand_id" id="brand_id" class="form-control select-search">
                        <option value="">-- Please select --</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $brand->id == $repair->brand_id ? 'selected' : '' }}>
                                {{ $brand->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</x-data-entry.form>
