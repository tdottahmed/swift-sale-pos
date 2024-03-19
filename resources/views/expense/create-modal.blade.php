<div id="createExpense" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Expenses</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('expenses.store') }}" class="form-horizontal" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">{{ __('Select Expense Category') }}</label>
                        <div class="col-sm-9">
                            <select name="expense_category_id" id="expense_category_id"
                                class="form-control select-search">
                                <option value="">-- Please select --</option>
                                @foreach ($expenseCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Reference No</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="reference_no" id="reference_no">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Expense For</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="expense_for" id="expense_for">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Total Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="total_amount" id="total_amount">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Expense Note</label>
                        <div class="col-sm-9">
                            <textarea name="expense_note" id="expense_note" class="form-control" cols="50" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Payment Method</label>
                        <div class="col-sm-9">
                            <select name="payment_method_id" id="payment_method_id" class="form-control select-search">
                                <option disabled>--Please Select--</option>
                                @foreach ($paymentMethods as $payment)
                                    <option value="{{ $payment->id }}">{{ $payment->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Payment Note</label>
                        <div class="col-sm-9">
                            <textarea name="payment_note" id="payment_note" class="form-control" cols="50" rows="5"></textarea>
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
