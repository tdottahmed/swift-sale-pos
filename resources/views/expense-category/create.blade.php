<x-data-entry.form action="{{ route('expense-category.store') }}">
    <x-data-entry.input type="text" name="title" placeholder="Enter Expense Category Title" />
    <x-data-entry.text-area label="Description" name="description" value="Enter Expense Category Description" />
</x-data-entry.form>
