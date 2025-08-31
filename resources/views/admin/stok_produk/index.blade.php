<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Stok Produk - Pilih Kategori</title>
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

        .sidebar a.active, .sidebar a:hover {
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

        .btn {
            padding: 12px 20px;
            border: 1px solid #5e2f1c;
            border-radius: 6px;
            background: #fff;
            cursor: pointer;
            font-weight: bold;
            color: #5e2f1c;
            margin-bottom: 10px;
            display: block;
            text-align: center;
        }

        .btn:hover {
            background: #f3e0d0;
        }
    </style>
</head>
<body>
<div class="container">
  <!-- Sidebar -->
  <div class="sidebar">
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="#" class="active">Stok produk</a>
    <a href="#">Pendapatan</a>
    <a href="#">CRUD</a>
    <a href="#">Ubah Menu</a>
    <a href="#">Detail pesanan</a>
    <a href="#">Transaksi</a>
  </div>

  <!-- Content -->
  <div class="content">
    <h2>Stok Produk <span>Kopi, Ice Cream, Roti</span></h2>

    <a href="{{ route('stok.kopi') }}" class="btn">Stok Produk Kopi</a>
    <a href="{{ route('stok.iceCream') }}" class="btn">Stok Produk Ice Cream</a>
    <a href="{{ route('stok.roti') }}" class="btn">Stok Produk Roti</a>
  </div>
</div>
</body>
</html>
