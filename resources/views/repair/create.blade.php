<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Create Reapair
        </x-slot>
        <x-slot name="body">
            <x-data-entry.form action="{{ route('repair.store') }}">
                <x-data-entry.input type="date" name="delivery_date" />
                <x-data-entry.input type="date" name="repair_completed_on" />
                <x-data-entry.input type="number" name="serial_number" placeholder="Enter Serial number" />
                <x-data-entry.text-area name="prb_reported_by_customer" label="problem reported by Customer"
                    placeholder="prb_reported_by_customer" />
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Status</label>
                    <div class="col-sm-9">
                        <select name="status" id="status" class="form-control select select-search">
                            <option value="pending">Pending</option>
                            <option value="delivered">Delivered
                            </option>
                        </select>
                    </div>
                </div>
                <x-data-entry.select name="brand_id" label="Repair Brand" :options="$brands"
                    class="select select-search" />
            </x-data-entry.form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('repair.index') }}" class="btn btn-sm bg-indigo-800">
                <i class="icon-list2 mr-2"></i>Repair List</a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
