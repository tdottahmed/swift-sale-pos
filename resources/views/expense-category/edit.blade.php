<x-data-entry.form action="{{ route('expense-category.update', $expenseCategory->id) }}" method="PATCH">
    <x-data-entry.input type="text" name="title" value="{{ $expenseCategory->title }}" />
    <x-data-entry.text-area label="Description" name="description" value="{{ $expenseCategory->description }}" />
</x-data-entry.form>
