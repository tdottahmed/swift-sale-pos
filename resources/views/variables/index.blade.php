<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Variations') }}
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Value') }}</th>
                    <th class="text-center">{{ __('Action') }}</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($variables as $variable)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $variable->title }}</td>
                            <td>
                                @foreach (json_decode($variable->values) as $value)
                                    <span
                                        class="badge badge-light badge-striped badge-striped-left border-left-success">{{ $value }}</span>
                                @endforeach
                            </td>
                            <td class="text-center">
                                <x-data-display.table-actions :actions="[
                                    [
                                        'route' => 'variables.edit',
                                        'params' => $variable->id,
                                        'label' => 'Edit variables',
                                        'icon' => 'icon-pencil7',
                                    ],
                                    [
                                        'route' => 'variables.destroy',
                                        'params' => $variable->id,
                                        'label' => 'Delete variables',
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
            <x-action.create-btn route="{{ route('variables.create') }}" buttonLabel="Create Variatios"
                modalHeaderLabel="Create New Variatios" />
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
