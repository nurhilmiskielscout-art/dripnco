<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* ========== SIDEBAR STYLE ========== */
    .sidebar {
      background-color: #F5E9D7;
      /* Warna krem lembut */
      min-height: 100vh;
      width: 240px;
      padding: 1rem;
      border-right: 1px solid #E6D8C6;
      font-family: 'Inter', sans-serif;
    }

    /* Logo */
    .sidebar .logo {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .sidebar .logo img {
      width: 100px;
      height: auto;
      margin-bottom: 0.5rem;
    }

    /* Judul */
    .sidebar h2 {
      color: #5C4B3B;
      font-size: 1.25rem;
      font-weight: bold;
      text-align: center;
    }

    /* Menu List */
    .sidebar ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar ul li {
      margin-bottom: 0.75rem;
    }

    /* Link */
    .sidebar ul li a {
      display: block;
      padding: 0.5rem 0.75rem;
      color: #5C4B3B;
      text-decoration: none;
      border-radius: 6px;
      transition: background-color 0.2s ease, color 0.2s ease;
      font-weight: 500;
    }

    /* Hover */
    .sidebar ul li a:hover {
      background-color: #E7D3B0;
    }

    /* Active */
    .sidebar ul li a.active {
      background-color: #E7D3B0;
      font-weight: 600;
    }

    /* Logout Button */
    .sidebar form button {
      width: 100%;
      background-color: #B74141;
      color: #fff;
      padding: 0.5rem 1rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      text-align: left;
      transition: background-color 0.2s ease;
    }

    .sidebar form button:hover {
      background-color: #993333;
    }
  </style>
</head>

<body class="bg-[#F9F8F6] font-sans">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="sidebar">
      <!-- Logo -->
      <div class="logo">
        <img src="{{ asset('asset/logo.png') }}" alt="Logo">
        <h2>Drip & Co</h2>
      </div>

      <!-- Menu Sidebar -->
      <ul>
        <li>
          <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
        </li>
        <li>
          <a href="{{ route('stok.index') }}">Stok Produk</a>
        </li>
        <li>
          <a href="{{ route('admin.pendapatan') }}">Pendapatan</a>
        </li>
        <li>
          <a href="{{ route('admin.data.pelanggan') }}">Data Pelanggan</a>
        </li>
        <li>
          <a href="{{ route('pesanan.index') }}">Detail Pesanan</a>
        </li>
        <li>
          <a href="{{ route('transaksi') }}">Transaksi</a>
        </li>
        <li>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
          </form>
        </li>
      </ul>
    </aside>
  </div>
</body>
</html>
