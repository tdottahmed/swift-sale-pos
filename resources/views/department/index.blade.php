<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Department
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                            <th>SL</th>
                            <th>Title</th>
                            <th class="text-center">Action</th>
                    </x-slot>
                    <x-slot name="body">
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $department->title }}</td>
                               <td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a onclick="openModal('{{route('department.edit', $department->id)}}', 'Create Department')"
                                                 class="dropdown-item"><i class="icon-pencil7"></i> Edit department</a>
                                                {{-- <form style="display:inline" action="{{ route('department.destroy', $department->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this department?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item"
                                                        title="Delete department">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form> --}}
                                                @if ($department->depars->isEmpty())
                                                <form style="display:inline" action="{{ route('department.edit', $department->id)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this Department?')){ this.closest('form').submit(); }" class="dropdown-item" title="Delete department">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
                                            @endif
												{{-- <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to .csv</a>
												<a href="#" class="dropdown-item"><i class="icon-file-word"></i> Export to .doc</a> --}}
											</div>
										</div>
									</div>
								</td>
                            </tr>
                        @endforeach

                    </x-slot>
                </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">

            <button type="button" class="btn bg-indigo-800" onclick="openModal('{{route('department.create')}}', 'Create Department')">
                Create <i class="icon-plus3 ml-2"></i>
            </button>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>