<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kopi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Produk Kopi</h2>

    <form action="{{ route('create.kopi') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nama Produk</label>
            <input type="text" name="nama_produk" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Harga</label>
            <input type="number" name="harga" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Stok</label>
            <input type="number" name="stok" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Gambar Produk</label>
            <input type="file" name="gambar" class="w-full">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('stok.index', ['category' => 'kopi']) }}" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        </div>
    </form>
</div>

</body>
</html>
