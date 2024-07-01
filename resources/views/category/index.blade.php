<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Category
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                            <th>SL</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th class="text-center">Action</th>
                </x-slot>
                <x-slot name="body">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->title }}</td>
                                <td><img src="{{imagePath($category->image)}}" width="100"
                                    height="70" alt="no image"></td>
                               <td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">

												<a onclick="openModal('{{ route('category.edit', $category->id) }}', 'Edit category')" class="dropdown-item"><i class="icon-pencil7"></i> Edit category</a>
                                                {{-- <button type="button" class="btn bg-indigo-800" onclick="openModal('{{ route('category.edit', $category->id) }}', 'Edit category')">
                                                    Create <i class="icon-plus3 ml-2"></i>
                                                </button> --}}

                                                <form style="display:inline" action="{{ route('category.destroy', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this category?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item"
                                                        title="Delete category">
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
                    </x-slot>
                </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            {{-- <a href="{{ route('category.create') }}" class="btn  --}}
           <button type="button" class="btn bg-indigo-800" onclick="openModal('{{ route('category.create')}}', 'Create Category')">
               Create <i class="icon-plus3 ml-2"></i>
           </button>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>