<x-layouts.master>
    <x-data-display.card>
        <x-slot name="heading">
            Order: #{{ $order->id }}
        </x-slot>

        <x-slot name="body">
            <div class="row">
                <!-- Shipping Address Card -->
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <h4>Shipping address</h4>
                                <address>
                                    {{ $order->first_name . ' ' . $order->last_name }} <br>
                                    {{ $order->address }} <br>
                                    {{ $order->city }} , {{ $order->zip }}, {{ $order->countryName }}<br>
                                    Phone: {{ $order->mobile }} <br>
                                    Email: {{ $order->email }}
                                </address>
                                <strong>Shipped Date </strong> <br>
                                @if (!empty($order->shipped_date))
                                    {{ \Carbon\Carbon::parse($order->shipped_date)->format('d M, Y')}}
                                    @else
                                    n/a
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Card -->
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <b>Order Id:</b> {{ $order->id }} <br>
                                <b>Total:</b> ${{ number_format($order->grand_total) }} <br>
                                <b>Status:</b> 
                                @if ($order->status == 'pending')
                                    <span class="badge bg-danger">Pending</span>
                                @elseif ($order->status == 'shipped')
                                    <span class="badge bg-info">Shipped</span>
                                @elseif ($order->status == 'delivered')
                                    <span class="badge bg-success">Delivered</span>
                                    @else
                                    <span class="badge bg-danger">Cancelled</span>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Status Form Card -->
                {{-- <div class="col-sm-6">
                    <div class="card">
                        <form action="" method="post" name="changeStatusForm" id="changeStatusForm">
                            @csrf
                            <h5 class="card-header">Order Status</h5>
                            <div class="card-body">
                                <div class="mb-3">
                                    <select name="status" id="status" class="form-control">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="shipped_date">Shipped Date</label>
                                    <input type="text" name="shipped_date" id="shipped_date" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Send Invoice Email</h5>
                        <div class="card-body">
                            <select name="" id="" class="form-control">
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                    </div>
                </div> --}}

                <!-- Order Status Form Card -->
<div class="col-sm-6">
    <div class="card">
        <form action="{{ route('orders.changeOrderStatus', $order->id) }}" method="post" name="changeStatusForm" id="updateStatus">
            @csrf
            <h5 class="card-header">Order Status</h5>
            <div class="card-body">
                <div class="mb-3">
                    <select name="status" id="status" class="form-control">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="shipped_date">Shipped Date</label>
                    <input value="{{ $order->shipped_date }}" type="text" name="shipped_date" id="shipped_date" class="form-control" placeholder="Shipped Date">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" onclick="confirmUpdateStatus()">Update</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card">
        <form action="{{ route('orders.sendInvoiceEmail', $order->id) }}" method="post" name="sendInvoiceEmail" id="sendInvoiceEmail">
            @csrf
        <h5 class="card-header">Send Invoice Email</h5>
        <div class="card-body">
            <select name="userType" id="userType" class="form-control">
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary" onclick="confirmSendEmail()">Send Invoice</button>
            </div>

        </div>
    </form>
    </div>
</div>

            </div>

            <!-- Order Items Table -->
            <div class="table">
                <table class="table datatable-basic">
                    <thead class="bg-indigo-600">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ number_format($item->price, 2) }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>${{ number_format($item->total, 2) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th colspan="3" class="text-right">Subtotal:</th>
                            <td>${{ number_format($order->subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Discount: {{ !empty($order->coupon_code) ? '(' . $order->coupon_code . ')' : '' }}</th>
                            <td>${{ number_format($order->discount, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Shipping:</th>
                            <td>${{ number_format($order->shipping, 2) }}</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">Grand Total:</th>
                            <td>${{ number_format($order->grand_total, 2) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="cardFooterCenter">
            <a href="{{ route('orders.index') }}" class="btn btn-sm bg-success border-2 border-success btn-icon rounded-round legitRipple shadow mr-1">
                <i class="icon-plus2"></i>
            </a>
        </x-slot>
    </x-data-display.card>
</x-layouts.master>

