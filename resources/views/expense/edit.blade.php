
<x-data-entry.form action="{{route('expenses.update', $expense->id)}}" method="PATCH">
    <x-data-entry.select name="expense_category_id" label="Expense Category" :options="$expenseCategories" class="select select-search" selected="{{$expense->expense_category_id}}" />
    <x-data-entry.input type="text" name="reference_no" value="{{$expense->reference_no}}" />
    <x-data-entry.input type="date" name="date" value="{{$expense->date}}" />
    <x-data-entry.input type="text" name="expense_for" value="{{$expense->expense_for}}" />
    <x-data-entry.input type="number" name="total_amount" value="{{$expense->total_amount}}" />
    <x-data-entry.select name="payment_method_id" label="Payment Method" :options="$paymentMethods" class="select select-search" selected="{{$expense->payment_method_id}}"/>
    <x-data-entry.text-area name="expense_note" value="{{$expense->expense_note}}" label="Expense Note"/>
</x-data-entry.form>

