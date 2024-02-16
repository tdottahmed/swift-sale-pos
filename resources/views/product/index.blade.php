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
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->title }}</td>
                                <td><img src="{{ asset('storage/product') . '/' . $product->logo }}"
                                        width="100" height="70" alt="no image">
                                </td>
                              
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}"
                                        class="btn btn-success btn-sm">edit</a>
                                </td>
                            </tr>
                        @empty
                            <td colspan="6" class="text-center">
                                No data
                            </td>
                        @endforelse


                    </tbody> --}}
                </table>
            </div>
        </div>
        <div class="card-footer text-center">
           
                <a href="{{ route('product.create') }}" class="btn btn-success btn-sm">Create</a>
           
        </div>



    </div>


</x-layouts.master>
