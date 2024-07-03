<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Expense Category') }}
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th class="text-center">{{ __('Action') }}</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($expenseCategories as $expense_category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $expense_category->title }}</td>
                            <td>{{ $expense_category->description }}</td>
                            <td class="text-center">
                                <x-data-display.table-actions :actions="[
                                    [
                                        'route' => 'expense-category.edit',
                                        'params' => $expense_category->id,
                                        'label' => 'Edit Payment-Method',
                                        'icon' => 'icon-pencil7',
                                    ],
                                    [
                                        'route' => 'expense-category.destroy',
                                        'params' => $expense_category->id,
                                        'label' => 'Delete payment-method',
                                        'icon' => 'icon-trash-alt',
                                        'method' => 'delete',
                                    ],
                                ]" />
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-action.create-btn route="{{ route('expense-category.create') }}" buttonLabel="Create Expense Category"
                modalHeaderLabel="Create Expense Category" />
            </button>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
