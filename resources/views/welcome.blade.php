<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MABA STORE</title>
        <style>
            body { font-family: sans-serif; padding: 2em; }
            ul { list-style: none; padding: 0; }
            li { background: #f4f4f4; margin-bottom: 8px; padding: 12px; border-radius: 4px; }
        </style>
    </head>
    <body>
        <h1>Our Products</h1>
        <ul>
            @foreach ($products as $product)
                <li>{{ $product->name }} - Rp{{ number_format($product->price, 0) }}</li>
            @endforeach
        </ul>
    </body>
</html>
    
