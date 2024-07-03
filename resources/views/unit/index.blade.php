<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            unit
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </x-slot>
                    <x-slot name="body">
                        @foreach ($units as $unit)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $unit->title }}</td>
                               <td class="text-center">
                                <x-data-display.table-actions :actions="[
                                    ['route' => 'unit.edit', 'params' => $unit->id, 'label' => 'Edit unit', 'icon' => 'icon-pencil7'],
                                    ['route' => 'unit.destroy', 'params' => $unit->id, 'label' => 'Delete unit', 'icon' => 'icon-trash-alt', 'method' => 'delete']
                                ]" />
								</td>
                            </tr>
                        @endforeach


                    </x-slot>
                </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter"> 
            <x-action.create-btn route="{{ route('unit.create') }}" buttonLabel="Create unit" modalHeaderLabel="Create New unit" />
        </x-slot>
    </x-data-display.card>
</x-layouts.master>