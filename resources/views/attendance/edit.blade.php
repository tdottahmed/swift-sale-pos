<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Your Attendance Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('attendance.update', $attendance->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="">{{ __('Select Employee') }}</label>
                    <select name="employee_id" id="employee_id" class="form-control select-search">
                        <option value="">-- Please select --</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ $employee->id == $attendance->employee_id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                        <label class="col-form-label col-sm-3">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="date" id="date" value="{{ $attendance->date }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Check In</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="check_in" id="check_in" value="{{ $attendance->check_in }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Check Out</label>
                        <div class="col-sm-9">
                            <input type="time" class="form-control" name="check_out" id="check_out" value="{{ $attendance->check_out }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Note</label>
                        <div class="col-sm-9">
                            <textarea name="note" id="note" cols="50" rows="5">{{ $attendance->note }}</textarea>
                        </div>
                    </div>


                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Update') }}</button>
                    </div>
                </div>

            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('attendance.index') }}"
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
