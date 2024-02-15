<x-layouts.master>
    <div class="card">
        <div class="card-header">
            <h2>{{ __('Brand') }}</h2>
        </div>

        <div class="card-body">
            <div class="table">
                <table class="table table-bordered">
                    <thead class="bg-teal">
                        <tr>
                            <th class="text-center">Sl</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->title }}</td>
                                <td><img src="{{ asset('storage/brand') . '/' . $brand->image }}" width="100"
                                        height="70" alt="no image">
                                </td>

                                <td>
                                    <a href="{{ route('brand.edit', $brand->id) }}"
                                        class="btn btn-success btn-sm">edit</a>
                                    <form style="display:inline" action="{{ route('brand.destroy', $brand->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this brand?')){ this.closest('form').submit(); }"
                                            class="btn btn-icon btn-sm btn-danger btn-icon-mini d-flex align-items-center"
                                            title="Delete Brand">
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
          
                <a href="{{ route('brand.create') }}" class="btn btn-success btn-sm">Create</a>
           
        </div>



    </div>


</x-layouts.master>
