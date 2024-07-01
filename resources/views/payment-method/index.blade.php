<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Payment Method
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                            <th>SL</th>
                            <th>Title</th>
                            <th class="text-center">Action</th>
                        </x-slot>
                        <x-slot name="body">
                        @foreach ($paymentMethods as $paymentMethod)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $paymentMethod->title }}</td>
                               <td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												{{-- <a href="{{ route('payment-method.edit', $paymentMethod->id) }}" class="dropdown-item"><i class="icon-pencil7"></i> Edit Payment</a> --}}
                                                
                                                <a onclick="openModal('{{ route('payment-method.edit', $paymentMethod->id) }}', 'Edit category')" class="dropdown-item"><i class="icon-pencil7"></i> Edit category</a>

                                                <form style="display:inline" action="{{ route('payment-method.destroy', $paymentMethod->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this payment method?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item"
                                                        title="Delete Payment Method">
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

            
            <button type="button" class="btn bg-indigo-800" onclick="openModal('{{route('payment-method.create')}}', 'Create Payment Method')">
               Create <i class="icon-plus3 ml-2"></i>
           </button>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>