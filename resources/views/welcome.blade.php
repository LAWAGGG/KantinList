<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KantinList</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold text-center mb-6">Welcome to KantinList!</h1>
        <p>Total produk : {{ $product->count() }}</p>

        <div class="flex justify-end mb-6">
            <a href="{{ route('products.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">
                Add New Product
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($product as $item)
                <div
                    class="bg-white rounded-lg shadow p-4 flex flex-col gap-4 hover:shadow-lg  hover:-translate-y-1.5 transition-all">

                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                            class="rounded w-full h-70 object-cover">
                    @endif

                    <div class="flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold">{{ $item->name }}</h2>
                            <p
                                class="font-medium px-2 py-1 rounded-xl
                                @if ($item->category == 'food') bg-green-200
                                @elseif($item->category == 'drink') bg-blue-200
                                @else bg-gray-200 @endif">
                                {{ ucfirst($item->category) }}
                            </p>
                        </div>
                        <p class="font-medium">Rp{{ number_format($item->price, 2, ',', '.') }}</p>
                    </div>

                    <div class="mt-auto flex gap-2">
                        <a href="{{ route('products.show', $item) }}"
                            class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded">
                            Show
                        </a>
                        <a href="{{ route('products.edit', $item) }}"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-1 px-3 rounded">
                            Edit
                        </a>
                        <form action="{{ route('products.destroy', $item) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

</body>

</html>
