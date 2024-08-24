<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Purchase Order Details
        </x-slot>
        <x-slot name="body">
            <h6>Purchase Details</h6>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <p><strong>Supplier:</strong> {{ $purchase->supplier->fname . ' ' . $purchase->supplier->lname }}
                    </p>
                    <p><strong>Status:</strong> {{ $purchase->status }}</p>
                    <p><strong>Total Quantity:</strong> {{ $purchase->total_qty }}</p>
                    <p><strong>Total Amount:</strong> {{ $purchase->grand_total }}</p>
                </div>
                <div class="col-lg-6">
                    <p><strong>Date:</strong> {{ now()->parse($purchase->date)->format('jS F, Y') }}</p>
                    <p><strong>Shipping Cost:</strong> {{ $purchase->shipping_cost }}</p>
                    <p><strong>Order Tax:</strong> {{ $purchase->order_tax_rate }}%</p>
                    <p><strong>Order Discount:</strong> {{ $purchase->order_discount }}</p>
                </div>
            </div>
            <h6>Ordered Items</h6>
            <hr>
            <x-data-display.table class="table-striped table-hover">
                <x-slot name="header">
                    <th>SL</th>
                    <th>Product Name</th>
                    <th>Sku</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Discount</th>
                    <th>Total Price</th>
                </x-slot>
                <x-slot name="body">
                    @foreach ($purchase->items as $index => $purchaseDetail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $purchaseDetail->product_name }}</td>
                            <td>{{ $purchaseDetail->product_sku }}</td>
                            <td>{{ $purchaseDetail->qty }}</td>
                            <td>{{ $purchaseDetail->unit_cost }}</td>
                            <td>{{ $purchaseDetail->discount }}</td>
                            <td>{{ $purchaseDetail->total }}</td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-data-display.table>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <x-action.list-btn :route="route('purchase.index')" />
        </x-slot>
    </x-data-display.card>
</x-layouts.master>
