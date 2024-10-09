<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Repairs
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>SL</th>
                    <th>Delivery Date</th>
                    <th>Repair Completed On</th>
                    <th>Status</th>
                    <th>Brand</th>
                    <th>Serial Number</th>
                    <th>Problem Reported By Customer</th>
                    <th class="text-center">Action</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($repairs as $repair)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $repair->delivery_date }}</td>
                            <td>{{ $repair->repair_completed_on }}</td>
                            <td>{{ $repair->status }}</td>
                            <td>{{ $repair->brand_id }}</td>
                            <td>{{ $repair->serial_number }}</td>
                            <td>{{ $repair->prb_reported_by_customer }}</td>
                            <td class="text-center">

                                <x-data-display.table-actions :actions="[
                                    [
                                        'route' => 'repair.edit',
                                        'params' => $repair->id,
                                        'label' => 'Edit repair',
                                        'icon' => 'icon-pencil7',
                                    ],
                                    [
                                        'route' => 'repair.destroy',
                                        'params' => $repair->id,
                                        'label' => 'Delete repair',
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
            {{-- <x-action.create-btn route="{{ route('repair.create') }}" buttonLabel="Create Repair"
                modalHeaderLabel="Create New Repair" /> --}}

            <a href="{{ route('repair.create') }}" class="btn btn-sm bg-indigo-800">
                <i class="icon-plus2 mr-2"></i>
                Create Reapir
            </a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
