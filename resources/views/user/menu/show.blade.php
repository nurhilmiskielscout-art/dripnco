<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>{{ $produk->nama_produk }}</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      background: linear-gradient(to bottom, #fff7ef, #ffe9cc);
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background-color: #5a3921;
      color: white;
      height: 100vh;
      padding: 20px;
      position: fixed;
      top: 0;
      left: 0;
    }
    .sidebar .logo {
      display: flex;
      align-items: center;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 30px;
    }
    .sidebar .logo img {
      height: 30px;
      margin-right: 8px;
    }
    .sidebar a {
      display: block;
      text-decoration: none;
      color: white;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 8px;
    }
    .sidebar a:hover {
      background-color: #7a5235;
    }

    /* Content */
    .content {
      margin-left: 240px;
      padding: 30px;
      flex: 1;
    }

    .product-card {
      background: white;
      border-radius: 20px;
      padding: 20px;
      max-width: 600px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .product-card img {
      width: 100%;
      border-radius: 15px;
      margin-bottom: 15px;
    }

    .product-card h1 {
      font-size: 24px;
      margin-bottom: 10px;
      color: #333;
    }

    .product-info {
      margin-bottom: 15px;
      font-size: 14px;
      color: #555;
    }
    .product-info strong {
      color: #5a3921;
    }

    .product-desc {
      margin-top: 10px;
      font-size: 14px;
      line-height: 1.5;
      color: #444;
    }

    /* Buttons */
    .btn {
      display: inline-block;
      padding: 10px 20px;
      border-radius: 10px;
      font-size: 14px;
      text-decoration: none;
      cursor: pointer;
      transition: 0.2s ease;
    }
    .btn-buy {
      background-color: #5a3921;
      color: white;
      margin-right: 10px;
    }
    .btn-buy:hover {
      background-color: #7a5235;
    }
    .btn-back {
      background-color: #ddd;
      color: #333;
    }
    .btn-back:hover {
      background-color: #bbb;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="logo">
      <img src="https://cdn-icons-png.flaticon.com/512/2935/2935411.png" alt="Logo">
      DRIP&CO
    </div>
    <a href="{{ route('user.dashboard')}}">Dashboard</a>
    <a href="#">Tentang Kami</a>
    <a href="#">Menu</a>
    <a href="#">Notifikasi</a>
    <a href="#">Keranjang 🛒</a>
  </aside>

  <!-- Content -->
  <main class="content">
    <div class="product-card">
      @if($produk->gambar)
        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}">
      @endif

      <h1>{{ $produk->nama_produk }}</h1>
      
      <div class="product-info"><strong>Harga:</strong> Rp {{ number_format($produk->harga,0,',','.') }}</div>
      <div class="product-info"><strong>Stok:</strong> {{ $produk->stok }}</div>
      <div class="product-info"><strong>Kategori:</strong> {{ ucfirst($produk->category) }}</div>
      <p class="product-desc">{{ $produk->deskripsi }}</p>

      <br>
      <a href="{{ route('user.transaction.create', $produk->id) }}" class="btn btn-buy">Beli Sekarang</a>
      <a href="{{ route('user.menu') }}" class="btn btn-back">← Kembali ke menu</a>
    </div>
  </main>

</body>
</html>
