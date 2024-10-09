<table class="table table-bordered">
    <thead class="bg-indigo-600">
        <tr>
            <th>SL</th>
            <th>Product</th>
            <th>Customer</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Paid Amount</th>
            <th>Date and Time</th>
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
                        {{ \App\Models\Customer::find($sale->customer_id)->name }}
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
            </tr>
        @endforeach
    </tbody>
</table>
