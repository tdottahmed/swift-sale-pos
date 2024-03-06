<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Insert Your Expense Info') }}
        </x-slot>
        <x-slot name="body">
            <form action="{{ route('expenses.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="">{{ __('Select Expense Category') }}</label>
                    <select name="expense_category_id" id="expense_category_id" class="form-control select-search">
                        <option value="">-- Please select --</option>
                        @foreach ($expenseCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="reference_no">Reference No:</label>
                    <input type="text" class="form-control" name="reference_no" id="reference_no">
                </div>
                <div class="mb-3">
                    <label for="date">Date:</label>
                    <input type="date" class="form-control" name="date" id="date">
                </div>
                <div class="mb-3">
                    <label for="expense_for">Expense For:</label>
                    <input type="text" class="form-control" name="expense_for" id="expense_for">
                </div>
                <div class="mb-3">
                    <label for="total_amount">Total Amount:</label>
                    <input type="text" class="form-control" name="total_amount" id="total_amount">
                </div>
                <div class="mb-3">
                    <label for="expense_note">Expense Note:</label>
                    <textarea name="expense_note" class="form-control" id="expense_note"></textarea>

                </div>
                <div class="mb-3">
                    <label for="payment_method">Payment Method:</label>
                    <select name="payment_method" id="payment_method">
                        <option disabled>--Please Select--</option>
                        <option value="Cash">Cash</option>
                        <option value="Card">Card</option>
                        <option value="Bank">Bank Transfer</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="payment_method">Payment Note:</label>
                    <textarea name="payment_note" id="payment_note" class="form-control" cols="30" rows="10"></textarea>
                </div>


                <div class="row justify-content-end">
                    <div class="col-lg-4 text-right">
                        <a class="btn btn-lg bg-danger-400 shadow-2" href=""><i
                                class="icon-cross2 mr-1"></i>Cancel</a>
                        <button type="submit" class="btn btn-lg bg-teal-400 shadow-2"><i
                                class="icon-checkmark4 mr-1"></i>{{ __('Submit') }}</button>
                    </div>
                </div>

            </form>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('expenses.index') }}"
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
