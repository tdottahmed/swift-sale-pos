<div id="createLeave" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Leave Application Create') }}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{ route('leave.store') }}" method="POST" enctype="multipart/form-data" id="leaveForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">{{ __('Select Department') }}</label>
                        <div class="col-sm-9">
                            <select name="department_id" id="department_id" class="form-control select-search">
                                <option value="">-- Please select --</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">{{ __('Select Leave Type') }}</label>
                        <div class="col-sm-9">
                            <select name="leave_type_id" id="leave_type_id" class="form-control select-search">
                                <option value="">-- Please select --</option>
                                @foreach ($leaveTypes as $leaveType)
                                    <option value="{{ $leaveType->id }}" required>{{ $leaveType->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">From</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="from" id="from">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">To</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="to" id="to">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Total Days</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="total_days" id="total_days" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Attachment :</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="attachment" id="attachment">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" class="form-control" cols="50" rows="5"></textarea>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-lg bg-danger-400 shadow-2" data-dismiss="modal"><i class="icon-cross2 mr-1"></i>Close</button>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i class="icon-checkmark4 mr-1 "></i>{{ __('Submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fromDateInput = document.getElementById('from');
    const toDateInput = document.getElementById('to');
    const totalDaysInput = document.getElementById('total_days');
    const leaveForm = document.getElementById('leaveForm');

    function validateDates() {
        const fromDate = new Date(fromDateInput.value);
        const toDate = new Date(toDateInput.value);
        let isValid = true;

        if (toDate < fromDate) {
            alert('The "To" date cannot be earlier than the "From" date.');
            toDateInput.value = ''; 
            totalDaysInput.value = '';
            isValid = false;
        } else {
            const timeDifference = toDate - fromDate;
            const dayDifference = timeDifference / (1000 * 3600 * 24) + 1;
            totalDaysInput.value = dayDifference;
        }
        
        return isValid;
    }

    fromDateInput.addEventListener('change', validateDates);
    toDateInput.addEventListener('change', validateDates);

    leaveForm.addEventListener('submit', function (event) {
        if (!validateDates()) {
            event.preventDefault();
        }
    });
});
</script>
