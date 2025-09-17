<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Drip & Co</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <h1 class="text-2xl font-bold mb-6 text-gray-700">Dashboard Admin</h1>

      <!-- Statistik Dashboard -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded shadow border border-gray-200">
          <h3 class="text-gray-500">Total Produk</h3>
          <p class="text-2xl font-bold">18</p>
        </div>
        <div class="bg-white p-4 rounded shadow border border-gray-200">
          <h3 class="text-gray-500">Pesanan Hari Ini</h3>
          <p class="text-2xl font-bold">213</p>
        </div>
        <div class="bg-white p-4 rounded shadow border border-gray-200">
          <h3 class="text-gray-500">Stok Hampir Habis</h3>
          <p class="text-2xl font-bold">0</p>
        </div>
      </div>

      <!-- Chart Penjualan -->
      <div class="bg-white p-4 rounded shadow mb-6 max-w-md border border-gray-200">
        <h3 class="mb-4 font-semibold">Penjualan Berdasarkan Kategori</h3>
        <div class="w-48 h-48 mx-auto">
          <canvas id="kategoriChart"></canvas>
        </div>
      </div>

      <!-- Tabel Pesanan Terbaru -->
      <div class="bg-white p-4 rounded shadow border border-gray-200">
        <h3 class="mb-4 font-semibold">Pesanan Terbaru</h3>
        <div class="overflow-x-auto">
          <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-orange-100">
              <tr>
                <th class="border p-2">Order ID</th>
                <th class="border p-2">Customer</th>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Tanggal</th>
                <th class="border p-2">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border p-2 text-blue-600 font-bold">#1234567</td>
                <td class="border p-2">hajibb21@gmail.com</td>
                <td class="border p-2">ICE004, 005 COFFE004</td>
                <td class="border p-2">10-8-2025 (13.38)</td>
                <td class="border p-2">Rp53.000</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <!-- Chart Script -->
  <script>
    const ctx = document.getElementById('kategoriChart');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Kopi', 'Roti', 'Ice Cream'],
        datasets: [{
          label: 'Penjualan',
          data: [12, 8, 5],
          backgroundColor: ['#3b82f6', '#f59e0b', '#10b981'],
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  </script>
</body>
</html>
