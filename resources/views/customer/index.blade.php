<x-layouts.master>
    <x-data-display.card>
        <x-slot name="Heading">
            {{ __('Customers') }}
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <tr>
                        <th>{{ __('SL') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('Address') }}</th>
                        <th>{{ __('City') }}</th>
                        <th class="text-center">{{ __('Action') }}</th>
                    </tr>
                </x-slot>
                <x-slot name="body">
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
                </x-slot>
            </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-action.create-btn route="{{ route('customer.create') }}" buttonLabel="Create Customer"
                modalHeaderLabel="Create New Customer" />
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
