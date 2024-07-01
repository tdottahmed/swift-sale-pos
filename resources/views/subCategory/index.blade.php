<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Sub Category
        </x-slot>
        <x-slot name="body">
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                        <tr>
                            <th>SL</th>
                            <th>Sub Category</th>
                            <th>Category</th>
                            <th class="text-center">Action</th>
                        </tr>
                </x-slot>
                <x-slot name="body">
                        @foreach ($subCategorys as $subCategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subCategory->title }}</td>
                                <td>{{ $subCategory->category->title }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                {{-- <a href="{{ route('subCategory.edit', $subCategory->id) }}"
                                                    class="dropdown-item"><i class="icon-pencil7"></i> Edit Sub
                                                    Category</a> --}}
                                                
                                                    <a onclick="openModal('{{ route('subCategory.edit', $subCategory->id) }}', 'Edit Sub Category')" class="dropdown-item"><i class="icon-pencil7"></i> Edit Sub
                                                        Category</a>



                                                <form style="display:inline"
                                                    action="{{ route('subCategory.destroy', $subCategory->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this subCategory?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete subCategory">
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
            {{-- <a href="{{ route('subCategory.create') }}" --}}

            <button type="button" class="btn bg-indigo-800" onclick="openModal('{{route('subCategory.create')}}', 'Create Sub Category')">
                Create <i class="icon-plus3 ml-2"></i>
            </button>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
