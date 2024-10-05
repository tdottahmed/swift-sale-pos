<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Variations
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>SL</th>
                    <th>Title</th>
                    <th>Rate</th>
                    <th class="text-center">Action</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($taxes as $tax)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tax->title }}</td>
                            <td>
                                <span
                                    class="badge badge-light badge-striped badge-striped-left border-left-success">{{ $tax->value }}%
                                </span>
                            </td>
                            <td class="text-center">
                                
                                 <x-data-display.table-actions :actions="[
                                ['route' => 'tax.edit', 'params' => $tax->id, 'label' => 'Edit tax', 'icon' => 'icon-pencil7'],
                                ['route' => 'tax.destroy', 'params' => $tax->id, 'label' => 'Delete tax', 'icon' => 'icon-trash-alt', 'method' => 'delete']
                            ]" />
                                
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">
             <x-action.create-btn route="{{ route('tax.create') }}" buttonLabel="Create tax" modalHeaderLabel="Create New Tax" />
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
