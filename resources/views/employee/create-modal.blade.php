<div id="createEmployee" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('employee.store') }}" class="form-horizontal" method="POST">
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
                        <label class="col-form-label col-sm-3">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name">
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
                            <input type="text" class="form-control" name="phone_number" id="phone_number">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="dob" id="dob">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">NID NO.</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="nid" id="nid">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Address</label>
                        <div class="col-sm-9">
                            <textarea name="address" id="address" class="form-control" cols="50" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">City</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="city" id="city">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Country</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="country" id="country">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Staff ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="staff_id" id="staff_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">User Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="user_name" id="user_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">{{ __('Select Role') }}</label>
                        <div class="col-sm-9">
                            <select name="role_id" id="role_id" class="form-control select-search">
                                <option value="">-- Please select --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" id="password">
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
