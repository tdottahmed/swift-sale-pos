<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .invoice {
            border: 1px solid #ddd;
            background-color: #fff;
            padding: 20px;
            width: 80%;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .invoice-details {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
        }
        .invoice-details h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
            border-bottom: 1px solid #ddd;
        }
        .invoice-details p {
            margin: 5px 0;
            font-size: 16px;
            color: #666;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .invoice-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
        .total {
            font-weight: bold;
            color: #333;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 16px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="header">
            <h1>{{env('APP_NAME')}}</h1>
         </div>
         <div class="invoice-details">
           <h2>Order Details</h2>
            <p><strong>Order ID:</strong> {{$sale->uuid}}</p>
            <p><strong>Date:</strong> {{$sale->created_at}}</p>
        </div>
         <div class="invoice-details">
           <h2>Customer Details</h2>
            <p><strong>Custumer:</strong> {{$customersInfos['name']}}</p>
            <p><strong>Phone:</strong> {{$customersInfos['phone']}}</p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Product Nme</th>
                    <th>Product Variation</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($sale->saleProduct as $product)
                  <tr>
                     <td>{{$loop->iteration}}</td>
                     <td>{{\App\Models\Product::find($product->product_id)->name}}</td>
                     <td>
                        @php
                            $variation = \App\Models\Variation::find($product->variation_id)
                        @endphp
                        {{$variation->product_variation}} - {{$variation->value}}
                    </td>
                     <td>{{$product->quantity}}</td>
                     <td>{{$product->unit_total}}</td>
                     <td>{{$product->sub_total}}</td>
                  </tr>                   
               @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" class="total">Total Quantity:</td>
                    <td>{{$sale->total_quantity}}</td>
                    <td colspan="2" class="total">Total Amount:</td>
                    <td><strong>{{$sale->total_price}}</strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="total">Discount Amount:</td>
                    <td colspan="2"><strong>{{$sale->discountedAmount}}</strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="total">Total Paid Amount:</td>
                    <td colspan="2"><strong>{{$sale->paid_amount}}</strong></td>
                </tr>
            </tfoot>
        </table>
        <div class="footer">
         <div style="text-align: center; margin-bottom: 10px;">
             <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($sale->uuid, 'C128')}}" alt="barcode" style="width: 300px; height: auto;">
         </div>
         <p style="text-align: center;">Thank you for shopping with {{env('APP_NAME')}}!</p>
     </div>
     
    </div>
</body>
<script>
   window.print()
</script>
</html>
