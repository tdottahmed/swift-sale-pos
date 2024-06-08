<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Title</title>
</head>
<body>


    @if ($mailData['userType'] == 'customer')
    <h1>Thanks for your order!!</h1>
    <h2>Your order Id Is: #{{ $mailData['order']->id }}</h2>

    @else
    <h1>You have Received an order: </h1>
    <h2> Order Id: #{{ $mailData['order']->id }}</h2>
    @endif
   
    <h4>Shipping address</h4>
                                <address>
                                    {{ $mailData['order']->first_name . ' ' . $mailData['order']->last_name }} <br>
                                    {{ $mailData['order']->address }} <br>
                                    {{ $mailData['order']->city }} , {{ $mailData['order']->zip }}, {{ getCountryInfo($mailData['order']->country_id)->name }}<br>
                                    Phone: {{ $mailData['order']->mobile }} <br>
                                    Email: {{ $mailData['order']->email }}
                                </address>


    <h2>Products</h2>



    <div class="table">
        <table callpadding="3" cellspacing="3" border="0" width="700">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mailData['order']->items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>${{ number_format($item->total, 2) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="3" class="text-right">Subtotal:</th>
                    <td>${{ number_format($mailData['order']->subtotal, 2) }}</td>
                </tr>
                <tr>
                    <th colspan="3" class="text-right">Discount: {{ !empty($mailData['order']->coupon_code) ? '(' . $mailData['order']->coupon_code . ')' : '' }}</th>
                    <td>${{ number_format($mailData['order']->discount, 2) }}</td>
                </tr>
                <tr>
                    <th colspan="3" class="text-right">Shipping:</th>
                    <td>${{ number_format($mailData['order']->shipping, 2) }}</td>
                </tr>
                <tr>
                    <th colspan="3" class="text-right">Grand Total:</th>
                    <td>${{ number_format($mailData['order']->grand_total, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>