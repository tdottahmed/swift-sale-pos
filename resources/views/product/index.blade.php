<x-layouts.master>
    <div class="card">
        <div class="card-header">
            <h2>{{ __('Product') }}</h2>
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
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->title }}</td>
                                <td><img src="{{ asset('storage/product') . '/' . $product->image }}" width="100"
                                        height="70" alt="no image">
                                </td>

                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-success btn-sm">edit</a>

                                    <form style="display:inline" action="{{ route('product.destroy', $product->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button
                                            onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')){ this.closest('form').submit(); }"
                                            class="btn btn-icon btn-sm btn-danger btn-icon-mini d-flex align-items-center"
                                            title="Delete product">
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

            <a href="{{ route('product.create') }}" class="btn btn-success btn-sm">Create</a>

        </div>



    </div>


</x-layouts.master>
