<div id="createAttendance" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add attendance</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('attendance.store') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">{{ __('Select Employee') }}</label>
                        <div class="col-sm-9">
                            <select name="employee_id" id="employee_id" class="form-control select-search">
                                <option value="">-- Please select --</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Check In</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="check_in" id="check_in">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Check Out</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="check_out" id="check_out">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Note</label>
                        <div class="col-sm-9">
                            <textarea name="note" id="note" cols="50" rows="5"></textarea>
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
