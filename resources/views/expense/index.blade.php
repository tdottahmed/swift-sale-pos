<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Expense List
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                            <th>SL</th>
                            <th>Expense Category</th>
                            <th>Expense For</th>
                            <th>Expense Amount</th>
                            <th>Payment Method</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
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
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                

                                                <a onclick="openModal('{{ route('expenses.edit', $expense->id) }}', 'Edit category')" class="dropdown-item"><i class="icon-pencil7"></i> Edit expense</a>
   
                                                <form style="display:inline"
                                                    action="{{ route('expenses.destroy', $expense->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this expense?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete expense">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
                                                {{-- <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
												<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </x-slot>
                </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('expenses.create') }}"
                class="btn bg-indigo-800"
                data-toggle="modal" data-target="#createExpense"> Create <i class="icon-plus3 ml-2"></i></a>

        </x-slot>
    </x-data-display.card>
    @include('expense.create-modal')
</x-layouts.master>
