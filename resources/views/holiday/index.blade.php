<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Holiday List
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Note</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($holidays as $holiday)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $holiday->from }}</td>
                                <td>{{ $holiday->to }}</td>
                                <td>{{ $holiday->note }}</td>
                               <td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a 
                                                onclick="openModal('{{route('holiday.edit', $holiday->id)}}', 'Create Holiday')"
                                                class="dropdown-item"><i class="icon-pencil7"></i> Edit holiday</a>
                                                <form style="display:inline" action="{{ route('holiday.destroy', $holiday->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this holiday?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item"
                                                        title="Delete holiday">
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
        <x-slot name="cardFooterCenter">


            <a href="{{ route('holiday.create') }}"
            class="btn bg-indigo-800"
            data-toggle="modal" data-target="#createEmployee">Create <i class="icon-plus3 ml-2"></i></a>
        </x-slot>
    </x-data-display.card>
    @include('holiday.create-modal')
</x-layouts.master>
