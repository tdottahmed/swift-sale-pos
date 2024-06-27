<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }
        .invoice {
            width: 58mm; /* Width of the thermal paper */
            margin: 0 auto;
            padding: 5px;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 5px;
            border-bottom: 1px dashed #000;
        }
        .invoice-details {
            margin-bottom: 5px;
        }
        .invoice-details h2 {
            margin: 0;
            font-size: 10px;
            text-decoration: underline;
        }
        .invoice-details p {
            margin: 3px 0;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #000;
            padding: 3px;
            text-align: left;
        }
        .invoice-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .total {
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 5px;
        }
        .barcode {
            text-align: center;
            margin-top: 5px;
        }
    </style>
    
    
    
    
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h2>{{env('APP_NAME')}}</h2>
        </div>
        <div class="invoice-details">
            <h2>Order Details</h2>
            <p><strong>Order ID:</strong> {{$sale->uuid}}</p>
            <p><strong>Date:</strong> {{$sale->created_at->format('jS F, Y h:i:s A')}}</p>
        </div>
        <div class="invoice-details">
            <h2>Customer Details</h2>
            <p><strong>Customer:</strong> {{$customersInfos['fname']}} {{$customersInfos['lname']}}</p>
            <p><strong>Phone:</strong> {{$customersInfos['phone']}}</p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th colspan="2">Product</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sale->saleProduct as $product)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td colspan="2">
                        <strong>{{\App\Models\Product::find($product->product_id)->name}}</strong><br>
                        @if ($product->variation_id != null)
                        @php
                        $variation = \App\Models\Variation::find($product->variation_id)
                        @endphp
                        {{$variation->product_variation}} - {{$variation->value}}
                        @else
                        N/A
                        @endif
                    </td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->unit_total}}</td>
                    <td>{{$product->sub_total}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Total Qty:</td>
                    <td>{{$sale->total_quantity}}</td>
                    <td class="total">Total:</td>
                    <td><strong>{{$sale->total_price}}</strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="total">Discount:</td>
                    <td colspan="2"><strong>{{$sale->discountedAmount}}</strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="total">Paid:</td>
                    <td colspan="2"><strong>{{$sale->paid_amount}}</strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="barcode">
            <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($sale->uuid, 'C128')}}" alt="barcode" style="width: 100%; height: auto;">
        </div>
        <div class="footer">
            <p>Thank you for shopping with {{env('APP_NAME')}}!</p>
        </div>
    </div>
    
       
</body>
<script>
   window.print()
</script>
</html>
