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
                            <th>{{__('SL')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Address')}}</th>
                            <th>{{__('City')}}</th>
                            <th class="text-center">{{__('Action')}}</th>
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
                                    <x-data-display.table-actions :actions="[
                                        [
                                            'route' => 'customer.edit',
                                            'params' => $customer->id,
                                            'label' => 'Edit Customer',
                                            'icon' => 'icon-pencil7',
                                        ],
                                        [
                                            'route' => 'customer.destroy',
                                            'params' => $customer->id,
                                            'label' => 'Delete Customer',
                                            'icon' => 'icon-trash-alt',
                                            'method' => 'delete',
                                        ],
                                        [
                                            'route' => 'customer.show',
                                            'params' => $customer->id,
                                            'label' => 'Details',
                                            'icon' => 'icon-eye',
                                        ],
                                    ]" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            
            <button type="button" class="btn bg-indigo-800" onclick="openModal('{{ route('customer.create') }}', 'Create New Customer')">
                Create <i class="icon-plus3 ml-2"></i>
            </button>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
