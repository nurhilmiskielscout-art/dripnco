<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-orange-50 font-sans">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-60 bg-orange-100 p-4">
            <h2 class="text-xl font-bold mb-6">Dashboard</h2>
            <ul class="space-y-3">
                <li><a href="{{route('admin.dashboard')}}" class="block p-2 hover:bg-orange-200 rounded">Dashboard</a></li>
                <li><a href="{{route('stok.index')}}" class="block p-2 hover:bg-orange-200 rounded">Stok produk</a></li>
                <li><a href="#" class="block p-2 hover:bg-orange-200 rounded">Pendapatan</a></li>
                <li><a href="#" class="block p-2 hover:bg-orange-200 rounded">Ubah Menu</a></li>
                <li><a href="#" class="block p-2 hover:bg-orange-200 rounded">Detail pesanan</a></li>
                <li><a href="{{ route('transaksi') }}" class="block p-2 hover:bg-orange-200 rounded">Transaksi</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="mb-6">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
                    </form>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

            <!-- Statistik -->
            <div class="grid grid-cols-3 gap-4 mb-6">
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-gray-500">Total Produk</h3>
                    <p class="text-2xl font-bold">18</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-gray-500">Pesanan hari ini</h3>
                    <p class="text-2xl font-bold">213</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-gray-500">Stok hampir habis</h3>
                    <p class="text-2xl font-bold">0</p>
                </div>
            </div>

            <!-- Chart -->
            <div class="bg-white p-4 rounded shadow mb-6">
                <h3 class="mb-4 font-semibold">Penjualan berdasarkan Kategori</h3>
                <canvas id="kategoriChart" height="120"></canvas>
            </div>

            <!-- Tabel Pesanan -->
            <div class="bg-white p-4 rounded shadow">
                <h3 class="mb-4 font-semibold">Pesanan terbaru</h3>
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-orange-100">
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
                        <tr>
                            <td class="border p-2 text-blue-600 font-bold">#039473</td>
                            <td class="border p-2">sofiayputriy@gmail.com</td>
                            <td class="border p-2">ICE004, COFFE005</td>
                            <td class="border p-2">10-8-2025 (13.38)</td>
                            <td class="border p-2">Rp31.500</td>
                        </tr>
                        <tr>
                            <td class="border p-2 text-blue-600 font-bold">#039473</td>
                            <td class="border p-2">wanitareg@gmail.com</td>
                            <td class="border p-2">Roti001, COFFE003</td>
                            <td class="border p-2">10-8-2025 (13.34)</td>
                            <td class="border p-2">Rp29.200</td>
                        </tr>
                        <tr>
                            <td class="border p-2 text-blue-600 font-bold">#039473</td>
                            <td class="border p-2">akbar453@gmail.com</td>
                            <td class="border p-2">Roti006, Roti003</td>
                            <td class="border p-2">10-8-2025 (13.33)</td>
                            <td class="border p-2">Rp33.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Chart Script -->
    <script>
        const ctx = document.getElementById('kategoriChart');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Kopi', 'Roti', 'Ice cream'],
                datasets: [{
                    label: 'Penjualan',
                    data: [12, 8, 5],
                    backgroundColor: ['#3b82f6', '#f59e0b', '#10b981'],
                }]
            }
        });
    </script>
</body>

</html>