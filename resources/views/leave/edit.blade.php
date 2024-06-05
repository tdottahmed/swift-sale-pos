<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Your Leave Application') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('leave.update', $leave->id) }}" method="POST" enctype="multipart/form-data" id="leaveForm">
                @csrf
                @method('put')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">{{ __('Select Department') }}</label>
                    <div class="col-sm-9">
                        <select name="department_id" id="department_id" class="form-control select-search">
                            <option value="">-- Please select --</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ $department->id == $leave->department_id ? 'selected' : '' }}>
                                    {{ $department->title }}
                                </option>
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
                                <option value="{{ $leaveType->id }}" 
                                    {{ $leaveType->id == $leave->leave_type_id ? 'selected' : '' }}>
                                    {{ $leaveType->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">From</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="from" id="from" value="{{ $leave->from }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">To</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="to" id="to" value="{{ $leave->to }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Total Days</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="total_days" id="total_days" value="{{ $leave->total_days }}" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Attachment :</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="attachment" id="attachment">
                        @if ($leave->attachment)
                            <p>Current Attachment: <a href="{{ Storage::url($leave->attachment) }}" target="_blank">View</a></p>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Description</label>
                    <div class="col-sm-9">
                        <textarea name="description" id="description" class="form-control" cols="50" rows="5">{{ $leave->description }}</textarea>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href="{{ route('leave.index') }}">
                            <i class="icon-cross2 mr-1"></i>Cancel
                        </a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2">
                            <i class="icon-checkmark4 mr-1"></i>{{ __('Update') }}
                        </button>
                    </div>
                </div>

            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('leave.index') }}"
                class="btn btn-sm bg-indigo border-2 border-indigo btn-icon rounded-round legitRipple shadow mr-1">
                <i class="icon-list"></i>
            </a>
        </x-slot>
    </x-data-display.card>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fromDateInput = document.getElementById('from');
            const toDateInput = document.getElementById('to');
            const totalDaysInput = document.getElementById('total_days');
            const leaveForm = document.getElementById('leaveForm');

            function calculateTotalDays() {
                const fromDate = new Date(fromDateInput.value);
                const toDate = new Date(toDateInput.value);

                if (toDate >= fromDate) {
                    const timeDifference = toDate - fromDate;
                    const dayDifference = timeDifference / (1000 * 3600 * 24) + 1; // Add 1 to include the start date
                    totalDaysInput.value = dayDifference;
                } else {
                    totalDaysInput.value = 0;
                }
            }

            function validateDates(event) {
                const fromDate = new Date(fromDateInput.value);
                const toDate = new Date(toDateInput.value);

                if (toDate < fromDate) {
                    alert('The "To" date cannot be earlier than the "From" date.');
                    event.preventDefault();
                    return false;
                }
                return true;
            }

            fromDateInput.addEventListener('change', calculateTotalDays);
            toDateInput.addEventListener('change', calculateTotalDays);

            leaveForm.addEventListener('submit', validateDates);
        });
    </script>
</x-layouts.master>
