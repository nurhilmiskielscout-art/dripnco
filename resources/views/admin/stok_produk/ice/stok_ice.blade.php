<!-- resources/views/stok_produk/stok_ice.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Stok Produk Ice Cream</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background-color: #fdf5e6;
    }

    .container {
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 200px;
      background-color: #f5e2c8;
      height: 100vh;
      padding-top: 20px;
    }

    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: #5e4632;
      text-decoration: none;
      font-weight: 500;
    }

    .sidebar a.active,
    .sidebar a:hover {
      background-color: #e2cba5;
      border-radius: 8px;
    }

    /* Content */
    .content {
      flex: 1;
      padding: 20px;
    }

    h2 {
      margin: 0 0 20px;
      color: #5e4632;
    }

    h2 span {
      font-weight: normal;
      color: #7a6a58;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
    }

    thead {
      background: #e2cba5;
    }

    th,
    td {
      padding: 12px 15px;
      text-align: left;
      color: #5e4632;
    }

    th {
      font-weight: bold;
    }

    td img {
      width: 50px;
      height: 50px;
      border-radius: 6px;
      margin-right: 10px;
      vertical-align: middle;
    }

    .product-name {
      display: flex;
      align-items: center;
      font-weight: bold;
    }

    .btn {
      padding: 6px 14px;
      border: 1px solid #5e2f1c;
      border-radius: 6px;
      background: #fff;
      cursor: pointer;
      font-weight: bold;
      color: #5e2f1c;
    }

    .btn:hover {
      background: #f3e0d0;
    }
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

</head>

<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <a href="{{ route('stok.index')}}">Dashboard Menu</a>
      <a href="{{ route('stok.kopi')}}">Stok Kopi</a>
      <a href="{{ route('stok.iceCream')}}">Stok Eskrim</a>
      <a href="{{ route('stok.roti')}}">Stok Roti</a>
      <!-- <a href="#">Ubah Menu</a>
      <a href="#">Detail pesanan</a>
      <a href="#">Transaksi</a> -->
    </div>

    <!-- Content -->
    <div class="content">
      <h2>Stok Produk <span>Ice</span></h2>

      <a href="{{ route('form.iceCream') }}"
        class="px-4 py-2 bg-green-600 text-white rounded-md">
        Tambah Produk
      </a>

      <table>
        <thead>
          <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Edit</th>
            <th>Hapus</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <td>
              <img src="{{ asset('storage/' . $product->gambar) }}" width="50">
              {{ $product->nama_produk }}
            </td>
            <td><b>Rp{{ number_format($product->harga, 0, ',', '.') }}</b></td>
            <td>{{ $product->stok }}</td>
            <td><a href="{{ route('edit.iceCream', $product->id) }}" class="btn">Edit</a></td>
            <td>
              <form action="{{ route('delete.iceCream', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</body>

</html>