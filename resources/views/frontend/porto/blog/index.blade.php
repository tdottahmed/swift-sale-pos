<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Blog
        </x-slot>
        <x-slot name="body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blog->title }}</td>
                                <td><img src="{{imagePath($blog->image)}}" width="100"
                                    height="70" alt="no image"></td>
                               <td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right">
												<a href="{{ route('blogs.edit', $blog->id) }}" class="dropdown-item"><i class="icon-pencil7"></i> Edit blog</a>
												{{-- <a href="{{ route('blogs.show', $blog->id) }}" class="dropdown-item"><i class="icon-pencil7"></i> Show blog</a> --}}
                                                <form style="display:inline" action="{{ route('blogs.destroy', $blog->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this blog?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item"
                                                        title="Delete blog">
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
            <a href="{{ route('blogs.create') }}" class="btn 
            btn-sm 
            bg-success 
            border-2 
            border-success
            btn-icon 
            rounded-round 
            legitRipple 
            shadow 
            mr-1"><i class="icon-plus2"></i></a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>