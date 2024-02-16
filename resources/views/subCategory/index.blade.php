<x-layouts.master>
    <div class="card">
        <div class="card-header">
            <h2>{{ __('SubCategory') }}</h2>
        </div>

        <div class="card-body">
            <div class="table">
                <table class="table table-bordered">
                    <thead class="bg-teal">
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subCategorys as $subCategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subCategory->category->title }}</td>
                                <td>{{ $subCategory->title }}</td>
                                <td>
                                    <a href="{{ route('subCategory.edit', $subCategory->id) }}"
                                        class="btn btn-success btn-sm">edit</a>
                                    <form style="display:inline"
                                        action="{{ route('subCategory.destroy', $subCategory->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this subCategory?')){ this.closest('form').submit(); }"
                                            class="btn btn-icon btn-sm btn-danger btn-icon-mini d-flex align-items-center"
                                            title="Delete subCategory">
                                            <i class="zmdi zmdi-delete mx-auto">delete</i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">
                                No data
                            </td>
                        @endforelse


                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-center">

            <a href="{{ route('subCategory.create') }}" class="btn btn-success btn-sm">Create</a>

        </div>



    </div>


</x-layouts.master>
