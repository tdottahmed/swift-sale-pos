<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{__('Expense List')}}
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>{{__('SL')}}</th>
                    <th>{{__('Expense Category')}}</th>
                            <th>{{__('Expense For')}}</th>
                            <th>{{__('Expense Amount')}}</th>
                            <th>{{__('Payment Method')}}</th>
                            <th>{{__('Date')}}</th>
                            <th class="text-center">{{__('Action')}}</th>
                        </x-slot>
                        <x-slot name="body">
                        @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $expense->expenseCategory->title }}</td>
                                <td>{{ $expense->expense_for }}</td>
                                <td>{{ $expense->total_amount }}</td>
                                <td>{{ $expense->paymentMethod->title }}</td>
                                <td>{{ $expense->date }}</td>
                                <td class="text-center">
                                    <x-data-display.table-actions :actions="[
                                    [
                                        'route' => 'expenses.edit',
                                        'params' => $expense->id,
                                        'label' => 'Edit Payment-Method',
                                        'icon' => 'icon-pencil7',
                                    ],
                                    [
                                        'route' => 'expenses.destroy',
                                        'params' => $expense->id,
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
            <x-action.create-btn route="{{ route('expenses.create') }}" buttonLabel="Create Expense"
            modalHeaderLabel="Create New Expense" />
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
