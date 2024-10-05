<div id="createDiscount" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Discount</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" id="discountForm">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">{{ __('Select Expense Category') }}</label>
                        <div class="col-sm-9">
                            <select name="discountType" id="discountType" class="form-control select-search">
                                <option value="" disabled selected>-- Please select --</option>
                                <option value="plain">Plain ammount</option>
                                <option value="percent">Percentage</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Amount</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="amount" id="amountInput"
                                placeholder="ex 0.00">
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
