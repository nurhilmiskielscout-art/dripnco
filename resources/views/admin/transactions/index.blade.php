<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Riwayat Transaksi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 min-h-screen">
  <div class="flex min-h-screen">

    <!-- Include Sidebar -->
    @include('layouts.admin')

    <!-- Konten Utama -->
    <div class="flex-1 p-6">

      <!-- Header -->
      <div class="mb-2">
        <h1 class="text-2xl font-bold text-brown-900">Riwayat Transaksi</h1>
        <p class="text-brown-700 text-sm">Orderan terbaru-terlama</p>
      </div>

      <!-- Statistik Ringkasan -->
      <div class="flex flex-wrap gap-4 mb-6">
        <div class="bg-orange-100 rounded-lg p-4 flex-1 min-w-[180px]">
          <div class="text-3xl font-bold text-brown-900">175</div>
          <div class="text-xs text-brown-700">Total seluruh produk laku terjual hari ini</div>
          <div class="text-sm font-semibold mt-1">Orderan hari ini</div>
        </div>

        <div class="bg-orange-50 border-2 border-blue-400 rounded-lg p-4 flex-1 min-w-[180px]">
          <div class="flex items-center gap-2">
            <span class="text-2xl font-bold text-brown-900">5</span>
            <span class="text-xs text-brown-700">Total pending seluruh produk</span>
          </div>
          <div class="flex items-center gap-2 mt-1">
            <span class="text-2xl font-bold text-brown-900">22</span>
            <span class="text-xs text-brown-700">Total batal seluruh produk</span>
          </div>
          <div class="text-sm font-semibold mt-1">Pending/Batal hari ini</div>
        </div>

        <div class="bg-orange-100 rounded-lg p-4 flex-1 min-w-[180px]">
          <div class="text-3xl font-bold text-brown-900">1.051</div>
          <div class="text-xs text-brown-700">Total seluruh produk laku</div>
          <div class="text-sm font-semibold mt-1">Penjualan bulan ini</div>
        </div>
      </div>

      <!-- Search Bar -->
      <div class="mb-4">
        <input type="text" placeholder="Cari riwayat order ID .." 
               class="w-full border border-orange-200 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300 bg-white" />
      </div>

      <!-- Tabs -->
      <div class="flex gap-4 mb-2 text-brown-900 font-semibold">
        <button class="border-b-2 border-brown-900 pb-1">Semua Order</button>
        {{-- 
        <button class="hover:text-orange-600">Pending Order</button>
        <button class="hover:text-orange-600">Order Diterima</button>
        <button class="hover:text-orange-600">Batal Order</button>
        --}}
      </div>

      <!-- Table -->
      <div class="overflow-x-auto bg-white rounded-lg shadow border border-orange-100">
        <table class="min-w-full text-sm">
          <thead class="bg-orange-50 border-b border-orange-200">
            <tr>
              <th class="py-3 px-4 text-left font-bold">Order ID</th>
              <th class="py-3 px-4 text-left font-bold">Ordered Date</th>
              <th class="py-3 px-4 text-left font-bold">Product Name</th>
              <th class="py-3 px-4 text-left font-bold">Product Price</th>
              <th class="py-3 px-4 text-left font-bold">Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($transactions as $trx)
              <tr class="border-b border-orange-100 hover:bg-orange-50">
                <td class="py-2 px-4 text-blue-700 font-semibold">
                  <a href="{{ route('transaksi.show', $trx->id) }}" class="hover:underline">
                    {{ $trx->order?->order_code ?? $trx->id }}
                  </a>
                </td>
                <td class="py-2 px-4">{{ $trx->created_at->format('d-m-Y (H.i)') }}</td>
                <td class="py-2 px-4">{{ $trx->menu->nama_produk }}</td>
                <td class="py-2 px-4">Rp{{ number_format($trx->total, 0, ',', '.') }}</td>
                <td class="py-2 px-4">
                  @if($trx->status === 'pending')
                    <span class="inline-flex items-center text-green-600 font-semibold">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                        <path stroke="currentColor" stroke-width="2" d="M9 12l2 2 4-4"/>
                      </svg>
                      Pending
                    </span>
                  @elseif($trx->status === 'diterima')
                    <span class="inline-flex items-center text-blue-600 font-semibold">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                        <path stroke="currentColor" stroke-width="2" d="M9 12l2 2 4-4"/>
                      </svg>
                      Diterima
                    </span>
                  @elseif($trx->status === 'dibatalkan')
                    <span class="inline-flex items-center text-red-600 font-semibold">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                        <path stroke="currentColor" stroke-width="2" d="M15 9l-6 6M9 9l6 6"/>
                      </svg>
                      Dibatalkan
                    </span>
                  @else
                    <span class="inline-flex items-center text-gray-600 font-semibold">
                      {{ ucfirst($trx->status) }}
                    </span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center py-6 text-gray-500">Belum ada transaksi</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Tombol Kembali -->
      <div class="mt-6">
        <a href="{{ route('admin.dashboard') }}" class="text-orange-700 hover:underline">&larr; Kembali ke Dashboard</a>
      </div>
    </div>
  </div>
</body>
</html>
