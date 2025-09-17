<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Roti</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Edit Produk Roti</h2>

    <form action="{{ route('update.kopi', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Harga</label>
            <input type="number" name="harga" value="{{ $product->harga }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Stok</label>
            <input type="number" name="stok" value="{{ $product->stok }}" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Gambar Produk</label>
            <input type="file" name="gambar" class="w-full">
            @if($product->gambar)
                <img src="{{ asset('storage/'.$product->gambar) }}" class="mt-2 w-32 h-32 object-cover">
            @endif
        </div>

        <div class="flex justify-end">
            <a href="{{ route('stok.index', ['category' => 'roti']) }}" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
        </div>
    </form>
</div>

</body>
</html>
