<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Your Leave Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('leave.update', $leave->id) }} " method="POST" enctype="multipart/form-data">
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
           
                

                {{-- department --}}

                <label for="department">Select Department</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">

                    </div>
                    <select name="department_id" class="form-control custom-select" required>
                        @foreach ($departments as $department)
                        <option value="{{ $department->id }}"
                            {{ $department->id == $leave->department_id ? 'selected' : '' }}>
                            {{ $department->title }}
                            
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- employee --}}

                <label for="employee">Select Employee</label>
                <div class="input-group mb-3"> 
                    <div class="input-group-prepend">

                    </div>
                    
                    <select name="employee_id" class="form-control custom-select">
                    @foreach ($employees as $employee )
                    <option value="{{ $employee->id }}"name="employee_id"                       
                        {{ $employee->id == $leave->employee_id ? 'selected' : '' }}>
                        {{ $employee->name }}</option>
                                        
                    @endforeach
                    </select>
                </div>

                {{-- leave_type --}}

                <label for="leave_type">Select Leave Type</label>
                <div class="input-group mb-3"> 
                    <div class="input-group-prepend">

                    </div>
                    
                    <select name="leave_type_id" class="form-control custom-select">
                    @foreach ($leaveTypes as $leaveType )
                    <option value="{{ $leaveType->id }}"
                        {{ $leaveType->id == $leave->leave_type_id ? 'selected' : '' }}>
                        {{ $leaveType->title }}</option>                                     
                    @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $leave->title }}">
                </div>
                <div class="mb-3">
                    <label for="from">From:</label>
                    <input type="date" class="form-control" name="from" id="from" value="{{ $leave->from }}">
                </div>
                <div class="mb-3">
                    <label for="to">To:</label>
                    <input type="date" class="form-control" name="to" id="to" value="{{ $leave->to }}">
                </div>
                <div class="mb-3">
                    <label for="status">Status:</label>
                    <input type="text" class="form-control" name="status" id="status" value="{{ $leave->status }}">
                </div>
                <div class="mb-3">
                    <label for="attachment">Attachment:</label>
                    <input type="text" class="form-control" name="attachment" id="attachment" value="{{ $leave->attachment }}">
                </div>
                <div class="mb-3">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ $leave->description }}">
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
            <a href="{{ route('leave.index') }}"
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
