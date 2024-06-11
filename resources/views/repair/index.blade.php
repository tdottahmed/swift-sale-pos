<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Repair
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Delivery Date</th>
                            <th>Repair Completed On</th>
                            <th>Status</th>
                            <th>Brand</th>
                            <th>Device</th>
                            <th>Device Model</th>
                            <th>Serial Number</th>
                            <th>Problem Reported By Customer</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repairs as $repair)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $repair->delivery_date }}</td>
                                <td>{{ $repair->repair_completed_on }}</td>
                                <td>{{ $repair->status }}</td>
                                <td>{{ $repair->brand_id }}</td>
                                <td>{{ $repair->device }}</td>
                                <td>{{ $repair->device_model }}</td>
                                <td>{{ $repair->serial_number }}</td>
                                <td>{{ $repair->prb_reported_by_customer }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('repair.edit', $repair->id) }}"
                                                    class="dropdown-item"
                                                    ><i class="icon-pencil7"></i> Edit
                                                    Repair</a>
                                                <form style="display:inline"
                                                    action="{{ route('repair.destroy', $repair->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this repair?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete expense">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
                                                {{-- <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
												<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
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
        {{-- <x-slot name="cardFooterCenter">
            <a href="{{ route('repair.create') }}"
                class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"
                data-toggle="modal" data-target="#createRepair"><i class="icon-plus2"></i></a>
        </x-slot> --}}
    </x-data-display.card>
    {{-- @include('repair.create-modal') --}}
</x-layouts.master>
