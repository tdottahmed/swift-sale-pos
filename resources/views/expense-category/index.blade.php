<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            expense_category
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                            <th>SL</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th class="text-center">Action</th>
                        </x-slot>
                        <x-slot name="body">
                        @foreach ($expenseCategories as $expense_category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $expense_category->title }}</td>
                                <td>{{ $expense_category->description }}</td>
                               <td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a onclick="openModal('{{route('expense-category.edit', $expense_category->id)}}', 'Create Expense Category')"  class="dropdown-item"><i class="icon-pencil7"></i> Edit expense category</a>
                                                <form style="display:inline" action="{{ route('expense-category.destroy', $expense_category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this expense category?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item"
                                                        title="Delete expense category">
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
            {{-- <a href="{{ route('expense-category.create') }}" class="btn  --}}
            <button type="button" class="btn bg-indigo-800" onclick="openModal('{{route('expense-category.create')}}', 'Create Expense Category')">
               Create <i class="icon-plus3 ml-2"></i>
           </button>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>