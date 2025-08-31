<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Menu Drip&Co</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #fff7ef;
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 220px;
      background: #5a3921;
      color: white;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      padding: 20px;
      display: flex;
      flex-direction: column;
    }

    .sidebar .logo {
      display: flex;
      align-items: center;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 30px;
    }

    .sidebar .logo img {
      height: 35px;
      margin-right: 10px;
    }

    .sidebar a {
      color: white;
      text-decoration: none;
      margin: 8px 0;
      font-size: 14px;
      display: block;
      padding: 8px;
      border-radius: 6px;
    }

    .sidebar a:hover {
      background: #7a5235;
    }

    /* Content area */
    .content {
      margin-left: 260px;
      padding: 20px;
      flex: 1;
    }

    /* Search bar */
    .search-bar {
      margin: 10px 0 20px;
      max-width: 600px;
      display: flex;
      border: 2px solid #d4a373;
      border-radius: 10px;
      padding: 10px;
      color: #aaa;
    }

    .search-bar input {
      border: none;
      outline: none;
      flex: 1;
      font-size: 14px;
      color: #5a3921;
      background: transparent;
    }

    /* Kategori title */
    .kategori-title {
      margin: 20px 0 10px;
      font-size: 18px;
      font-weight: bold;
      color: #5a3921;
      border-bottom: 2px solid #c29b7a;
      padding-bottom: 5px;
    }

    /* Menu Grid */
    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
      gap: 20px;
    }

    .menu-item {
      background: white;
      border-radius: 15px;
      padding: 10px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
      text-align: center;
      position: relative;
    }

    .menu-item img {
      width: 100%;
      border-radius: 12px;
      height: 130px;
      object-fit: cover;
    }

    .menu-item h3 {
      margin: 10px 0 5px;
      font-size: 16px;
      color: #333;
    }

    .menu-item p {
      margin: 0;
      font-size: 14px;
      color: #5a3921;
      font-weight: bold;
    }

    .menu-item a.detail-btn {
      display: inline-block;
      margin-top: 8px;
      font-size: 13px;
      padding: 5px 10px;
      background: #5a3921;
      color: white;
      border-radius: 6px;
      text-decoration: none;
    }

    .lihat-semua {
      margin: 10px 0 30px;
      text-align: right;
    }

    .lihat-semua a {
      font-size: 13px;
      text-decoration: none;
      color: #5a3921;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="logo">
      <img src="https://cdn-icons-png.flaticon.com/512/2935/2935411.png" alt="Logo">
      DRIP&CO
    </div>
    <a href="{{ route('user.dashboard') }}">Dashboard</a>
    <a href="#">Tentang Kami</a>
    <a href="{{ route('user.menu') }}">Menu</a>
    <a href="#">Notifikasi</a>
    <a href="#">Keranjang 🛒</a>
  </div>

  <!-- Content -->
  <div class="content">
    <!-- Search -->
    <div class="search-bar">
      <input type="text" placeholder="Cari menu yang tersedia di toko kami..">
    </div>

    <!-- Daftar Menu Berdasarkan Kategori -->
    @foreach($menus as $kategori => $items)
      <div class="kategori-title">{{ ucfirst($kategori) }}</div>

      <div class="menu-grid">
        @foreach($items as $produk)
          <div class="menu-item">
            @if($produk->gambar)
              <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}">
            @else
              <img src="https://via.placeholder.com/150" alt="no image">
            @endif

            <h3>{{ $produk->nama_produk }}</h3>
            <p>Rp {{ number_format($produk->harga,0,',','.') }}</p>
            <a href="{{ route('user.menu.show', $produk->id) }}" class="detail-btn">Detail</a>
          </div>
        @endforeach
      </div>

      <div class="lihat-semua">
        <a href="{{ route('user.menu.kategori', $kategori) }}">Lihat semua {{ ucfirst($kategori) }} →</a>
      </div>
    @endforeach
  </div>

</body>
</html>
