<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Payment Method') }}
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th class="text-center">{{ __('Action') }}</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($paymentMethods as $paymentMethod)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $paymentMethod->title }}</td>
                            <td class="text-center">
                                <x-data-display.table-actions :actions="[
                                    [
                                        'route' => 'payment-method.edit',
                                        'params' => $paymentMethod->id,
                                        'label' => 'Edit Payment-Method',
                                        'icon' => 'icon-pencil7',
                                    ],
                                    [
                                        'route' => 'payment-method.destroy',
                                        'params' => $paymentMethod->id,
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
            <x-action.create-btn route="{{ route('payment-method.create') }}" buttonLabel="Create Payment Method"
                modalHeaderLabel="Create Payment Method" />
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
