<x-layouts.master>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                Point of Sale List
            </div>
            <div>
                <a href="{{ route('pos.create') }}" class="btn bg-indigo"> <i class="icon-store2 mr-2"></i> Ruturn To
                    Pos</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>SL</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Quantity</th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Date and Time</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @foreach ($sale->saleProduct as $product)
                                        <span
                                            class="badge badge-success mr-2">{{ \App\Models\Product::find($product->product_id)->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if ($sale->customer_id == 0)
                                        Walking Customer
                                    @else
                                        {{ \App\Models\Customer::find($sale->customer_id)->fname }}
                                    @endif
                                </td>
                                <td>
                                    {{ $sale->total_quantity }}
                                </td>
                                <td>
                                    {{ $sale->total_price }}
                                </td>
                                <td>
                                    {{ $sale->paid_amount }}
                                </td>
                                <td>
                                    {{ $sale->created_at->format('jS F, Y h:i:s A') }}
                                </td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('sale.suspend', $sale->id) }}"
                                                    class="dropdown-item"><i class="icon-pause"></i> Suspend Sale</a>
                                                <a href="{{ route('returned.list', $sale->id) }}"
                                                    class="dropdown-item"><i class="icon-reset"></i> Return Sale</a>
                                                <form style="display:inline" action="" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')){ this.closest('form').submit(); }"
                                                        class="dropdown-item" title="Delete product">
                                                        <i class="icon-trash-alt"></i>Delete
                                                    </button>
                                                </form>
                                                <a href="{{ route('pos.invoice', $sale->id) }}" class="dropdown-item"><i
                                                        class="icon-printer"></i> Print Label</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.master>
