<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Edit Your Employee Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('employee.update', $employee->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="">{{ __('Select employee') }}</label>
                    <select name="department_id" id="department_id" class="form-control select-search">
                        <option value="">-- Please select --</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                {{ $department->id == $employee->department_id ? 'selected' : '' }}>
                                {{ $department->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $employee->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Phone Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="phone_number" id="phone_number"
                            value="{{ $employee->phone_number }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="email" id="email"
                            value="{{ $employee->email }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Date of Birth</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="dob" id="dob"
                            value="{{ $employee->dob }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">NID NO.</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="nid" id="nid"
                            value="{{ $employee->nid }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Address</label>
                    <div class="col-sm-9">
                        <textarea name="address" id="address" class="form-control" cols="50" rows="5">{{ $employee->address }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">City</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="city" id="city"
                            value="{{ $employee->city }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Country</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="country" id="country"
                            value="{{ $employee->country }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Staff ID</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="staff_id" id="staff_id"
                            value="{{ $employee->staff_id }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">User Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="user_name" id="user_name"
                            value="{{ $employee->user_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="password"
                            value="{{ $employee->password }}">
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
            <a href="{{ route('employee.index') }}"
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
