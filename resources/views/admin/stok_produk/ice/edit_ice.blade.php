<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk Ice Cream</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6">Edit Produk Ice Cream</h2>

        <form action="{{ route('update.iceCream', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" value="{{ $product->nama_produk }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="harga" id="harga" value="{{ $product->harga }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                <input type="number" name="stok" id="stok" value="{{ $product->stok }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <div class="mb-4">
                <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar Produk</label>
                <input type="file" name="gambar" id="gambar" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @if($product->gambar)
                    <img src="{{ asset('storage/'.$product->gambar) }}" alt="Gambar Produk" class="mt-2 w-32 h-32 object-cover rounded">
                @endif
            </div>

            <div class="flex justify-end">
                <a href="{{ route('stok.index', ['category' => 'ice_cream']) }}" class="px-4 py-2 bg-gray-500 text-white rounded-md mr-2">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
