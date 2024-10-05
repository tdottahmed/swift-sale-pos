<x-data-entry.form action="{{route('expenses.store')}}">
    <x-data-entry.select name="expense_category_id" label="Expense Category" :options="$expenseCategories" class="select select-search" />
    <x-data-entry.input type="text" name="reference_no" placeholder="Enter Reference No" />
    <x-data-entry.input type="date" name="date" placeholder="Enter Reference No" />
    <x-data-entry.input type="text" name="expense_for" placeholder="Enter date" />
    <x-data-entry.input type="number" name="total_amount" placeholder="Enter Total Amount" />
    <x-data-entry.select name="payment_method_id" label="Payment Method" :options="$paymentMethods" class="select select-search" />
    <x-data-entry.text-area name="expense_note" value="Enter Expense Note" label="Expense Note"/>
</x-data-entry.form>
