<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Product Label</title>
   <style>
      body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 20px;
         text-align: center;
      }
      .content {
         max-width: 300px;
         margin: 0 auto;
      }
      h6 {
         font-size: 16px;
         margin: 5px 0;
      }
      p {
         font-size: 14px;
         margin: 3px 0;
      }
      img {
         margin-top: 5px;
         max-width: 100%;
         height: auto;
      }
      small {
         font-size: 12px;
         color: #888;
         margin-top: 3px;
      }
      strong {
         font-size: 16px;
         margin-top: 3px;
      }
   </style>
</head>
<body>
   <div class="content">
      @if ($product->variations->isEmpty())
      <h6>{{env('APP_NAME')}}</h6>
      <p>{{$product->name}}</p>
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->sku, 'C128')}}" alt="barcode" /><br>
      <small>{{$product->sku}}</small>
      <p><strong>Price: {{$product->selling_price}}/-</strong></p>
      <hr>
      @else
      @foreach ($product->variations as $variation)
      <h6>{{env('APP_NAME')}}</h6>
      <p>{{$variation->product->name}}</p>
      <p>{{$variation->product_variation}} - {{$variation->value}}</p>
      <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($variation->variation_sku, 'C128')}}" alt="barcode" /><br>
      <small>{{$variation->variation_sku}}</small>
      <p><strong>Price: {{$variation->selling_price}}/-</strong></p>
      <hr>
   @endforeach
      @endif
      
   </div>

   <script>
      window.onload = function() {
         window.print();
      };
   </script>
</body>
</html>
