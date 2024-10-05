
            <form action="{{ route('payroll.update', $payroll->id) }} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="">{{ __('Select Employee') }}</label>
                    <select name="employee_id" id="employee_id" class="form-control select-search">
                        <option value="">-- Please select --</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ $employee->id == $payroll->employee_id ? 'selected' : '' }}>
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">{{ __('Select Payment Method') }}</label>
                    <select name="payment_method_id" id="payment_method_id" class="form-control select-search">
                        <option value="">-- Please select --</option>
                        @foreach ($payments as $payment)
                            <option value="{{ $payment->id }}"
                                {{ $payment->id == $payroll->payment_method_id ? 'selected' : '' }}>
                                {{ $payment->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                        <label class="col-form-label col-sm-3">Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="amount" id="date" value="{{ $payroll->amount }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Reference</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="reference" id="reference" value="{{ $payroll->reference }}">
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

