<button class="btn bg-success-800 mx-2" data-toggle="modal" data-target="#recentSales"><i
        class="icon icon-arrow-up15 mr-2"></i>Recent Sales</button>

<div id="recentSales" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Recent Sales</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
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
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
