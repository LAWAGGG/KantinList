<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KantinList</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full">
        <h1 class="text-3xl font-bold mb-4 text-center">{{$product->name}}</h1>

        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                 class="w-full h-64 object-cover rounded mb-4">
        @endif

        <p class="text-gray-700 mb-2">{{ $product->description }}</p>
        <p class="font-medium mb-1">Price: Rp{{ number_format($product->price, 2, ',', '.') }}</p>
        <p class="font-medium mb-1">Stock: {{ $product->stock }}</p>
        <p class="font-medium mb-4">
            Category:
            <span class="@if($product->category == 'food') bg-green-200
                         @elseif($product->category == 'drink') bg-blue-200
                         @else bg-gray-200 @endif px-2 py-1 rounded">
                {{ ucfirst($product->category) }}
            </span>
        </p>

        <a href="{{ route('products.index') }}"
           class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">
           Back to List
        </a>
    </div>

</body>

</html>
