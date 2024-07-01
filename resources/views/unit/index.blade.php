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
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a onclick="openModal('{{route('unit.edit', $unit->id, $unit->id)}}', 'Create Unit')" class="dropdown-item"><i class="icon-pencil7"></i> Edit unit</a>
                                                
                                                <form style="display:inline" action="{{ route('unit.destroy', $unit->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this unit?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item"
                                                        title="Delete unit">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
												
                                                
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
            {{-- <a href="{{ route('unit.create') }}" class="btn  --}}
            
            <button type="button" class="btn bg-indigo-800" onclick="openModal('{{route('unit.create')}}', 'Create Unit')">
               Create <i class="icon-plus3 ml-2"></i>
           </button>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>