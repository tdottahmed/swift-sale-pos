<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            {{ __('Brands') }}
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>{{ __('SL') }}</th>
                    <th>{{ __('Title') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th class="text-center">{{ __('Action') }}</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $brand->title }}</td>
                            <td><img src="{{ imagePath($brand->image) }}" width="100" height="70" alt="no image">
                            </td>
                            <td class="text-center">
                                <x-data-display.table-actions :actions="[
                                    [
                                        'route' => 'brand.edit',
                                        'params' => $brand->id,
                                        'label' => 'Edit Brand',
                                        'icon' => 'icon-pencil7',
                                    ],
                                    [
                                        'route' => 'brand.destroy',
                                        'params' => $brand->id,
                                        'label' => 'Delete brand',
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
            <x-action.create-btn route="{{ route('brand.create') }}" buttonLabel="Create Brand"
                modalHeaderLabel="Create New Brand" />
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
