<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Purchase List
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>SL</th>
                    <th>Date</th>
                    <th>Supplier</th>
                    <th>Status</th>
                    <th>Total Qty</th>
                    <th>Total Amount</th>
                    <th class="text-center">Actions</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($purchases as $index => $purchase)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ now()->parse($purchase->date)->format('jS F, Y') }}</td>
                            <td>{{ $purchase->supplier->fname . ' ' . $purchase->supplier->lname }}</td>
                            <td>{{ $purchase->status }}</td>
                            <td>{{ $purchase->total_qty }}</td>
                            <td>{{ $purchase->grand_total }}</td>
                            <td class="text-center">
                                <div class="list-icons">
                                    <div class="dropdown">
                                        <a href="#" class="list-icons-item" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="{{ route('purchase.edit', $purchase->id) }}"
                                                class="dropdown-item"><i class="icon-pencil7"></i> Edit
                                                Purchase</a>
                                            <a href="{{ route('purchase.show', $purchase->id) }}"
                                                class="dropdown-item"><i class="icon-eye"></i> Order
                                                Details</a>

                                            <form style="display:inline"
                                                action="{{ route('purchase.destroy', $purchase->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this category?')){ this.closest('form').submit(); }"
                                                    class="dropdown-item" title="Delete category">
                                                    <i class="icon-trash-alt"></i>Delete
                                                </button>
                                            </form>

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
            <a href="{{ route('purchase.create') }}"
                class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i
                    class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
