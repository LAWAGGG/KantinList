<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KantinList</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Product</h1>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data"
              class="flex flex-col gap-4">
            @csrf
            @method('PUT')

            <div class="flex flex-col">
                <label for="name" class="mb-1 font-medium">Name:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" required
                       class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="description" class="mb-1 font-medium">Description:</label>
                <textarea id="description" name="description"
                          class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $product->description }}</textarea>
            </div>

            <div class="flex flex-col">
                <label for="price" class="mb-1 font-medium">Price:</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" step="0.01" required
                       class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="stock" class="mb-1 font-medium">Stock:</label>
                <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required
                       class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex flex-col">
                <label for="category" class="mb-1 font-medium">Category:</label>
                <select name="category" id=""
                        class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Select Category --</option>
                    <option value="food" {{ $product->category == 'food' ? 'selected' : '' }}>Food</option>
                    <option value="drink" {{ $product->category == 'drink' ? 'selected' : '' }}>Drink</option>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="image" class="mb-1 font-medium">Image:</label>
                <input type="file" id="image" name="image" accept="image/*"
                       class="border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <button type="submit"
                    class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-2 px-4 rounded shadow">
                Update Product
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('products.index') }}"
               class="text-blue-500 hover:underline font-medium">
                Back
            </a>
        </div>
    </div>

</body>

</html>
