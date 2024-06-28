<x-layouts.master>
    <x-data-display.card>
        <x-slot name="Heading">
            {{ __('Customers') }}
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Level</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->fname }} {{ $customer->lname }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->city }}</td>
                                >
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button type="button"
                                                    onclick="openModal('{{ route('customer.edit', $customer->id) }}', 'Create New Customer')"
                                                    class="dropdown-item "><i class="icon-pencil7"></i> Edit
                                                    customer</button>
                                                <button
                                                    onclick="openModal('{{ route('customer.show', $customer->id) }}')"
                                                    class="dropdown-item"><i class="icon-eye"></i> View
                                                    customer</button>
                                                <form style="display:inline"
                                                    action="{{ route('customer.destroy', $customer->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this customer?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete customer">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <button type="button" onclick="openModal('{{ route('customer.create') }}', 'Create New Customer')"
                class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1">
                <i class="icon-plus3"></i>
                Create New Customer
            </button>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
