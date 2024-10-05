<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Label</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 8.5in;
            height: 11in;
        }

        .page {
            width: 8.5in;
            height: 11in;
            padding: 0.5in;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 2.5in);
            grid-template-rows: repeat(10, 1.5in);
            gap: 0.1in;
            box-sizing: border-box;
            page-break-after: always;
        }

        .label {
            padding: 0.1in;
            box-sizing: border-box;
            text-align: center;
            border: 1px solid #ddd;
        }

        h6 {
            font-size: 12px;
            margin: 2px 0;
        }

        p {
            font-size: 10px;
            margin: 1px 0;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        small {
            font-size: 8px;
            color: #888;
        }

        strong {
            font-size: 10px;
        }

        @media print {
            body {
                width: 8.5in;
                height: 11in;
            }

            .page {
                break-inside: avoid;
                page-break-inside: avoid;
            }

            .label {
                break-inside: avoid;
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    <div class="page">
        @if ($product->variations->isEmpty())
            @for ($i = 0; $i < $product->opening_stock; $i++)
                <div class="label">
                    <h6>{{ env('APP_NAME') }}</h6>
                    <p>{{ $product->name }}</p>
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($product->sku, 'C128') }}" alt="barcode" /><br>
                    <small>{{ $product->sku }}</small>
                    <p><strong>Price: {{ $product->selling_price }}/-</strong></p>
                </div>
            @endfor
        @else
            @foreach ($product->variations as $variation)
                @for ($i = 0; $i < $variation->stock; $i++)
                    <div class="label">
                        <h6>{{ env('APP_NAME') }}</h6>
                        <p>{{ $variation->product->name }}</p>
                        <p>{{ $variation->product_variation }} - {{ $variation->value }}</p>
                        <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($variation->variation_sku, 'C128') }}"
                            alt="barcode" /><br>
                        <small>{{ $variation->variation_sku }}</small>
                        <p><strong>Price: {{ $variation->selling_price }}/-</strong></p>
                    </div>
                @endfor
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
