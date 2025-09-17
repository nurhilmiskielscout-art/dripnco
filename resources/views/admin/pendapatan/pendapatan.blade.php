<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pendapatan Saya</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 min-h-screen">
  <div class="flex min-h-screen">
    
    <!-- Sidebar di-include -->
    @include('layouts.admin')

    <!-- Main Content -->
    <div class="flex-1 p-8">
      @php
        $totalRevenue = \App\Models\Transaction::where('status', 'diterima')->sum('total');
        $pendingRevenue = \App\Models\Transaction::where('status', 'pending')->sum('total');
      @endphp

      <!-- Header -->
      <div class="mb-4">
        <h1 class="text-lg font-bold text-brown-900">Pendapatan Saya</h1>
        <p class="text-xs text-brown-700">Keuangan dompet</p>
      </div>

      <!-- Saldo Card -->
      <div class="bg-orange-100 rounded-lg p-6 mb-4">
        <div class="flex items-center gap-2 mb-2">
          <span class="text-brown-700">Saldo yang dapat dicairkan</span>
          <span class="text-xs bg-brown-200 text-brown-900 rounded-full px-2 py-0.5 cursor-pointer" title="Saldo yang bisa langsung dicairkan">i</span>
        </div>
        <div class="text-3xl font-bold text-brown-900 mb-2">
          Rp{{ number_format($totalRevenue, 0, ',', '.') }}
          <span class="text-xs align-top">i</span>
        </div>
        <button class="border border-brown-900 text-brown-900 font-semibold px-6 py-2 rounded mb-2">
          Cairkan ke akun Bank
        </button>
        <div class="text-xs text-brown-900 mt-2 flex items-center gap-2">
          <span class="font-semibold">Pencairan manual esok hari</span>
          <span class="text-xs">ke Bank Jago</span>
          <span class="ml-auto bg-brown-200 text-brown-900 rounded-full px-2 py-0.5 cursor-pointer" title="Info">i</span>
        </div>
      </div>

      <!-- Saldo dalam proses -->
      <div class="flex justify-between mb-4">
        <div class="text-brown-700">Saldo dalam proses</div>
        <div class="font-bold text-brown-900">
          Rp{{ number_format($pendingRevenue, 0, ',', '.') }}
        </div>
      </div>

      <!-- Pemotongan harian -->
      <div class="flex justify-between mb-6">
        <div class="text-brown-700">Pemotongan harian</div>
        <div class="font-bold text-brown-900">Rp200.000</div>
      </div>

      <!-- Riwayat Card -->
      <div class="bg-orange-100 rounded-lg p-6">
        <div class="flex justify-between mb-2">
          <div class="text-xs text-brown-700">10 Agustus 2025</div>
          <div class="font-bold text-brown-900">Rp6.999.000</div>
        </div>
        <div class="font-bold text-brown-900 mb-2">Saldo Awal</div>
        <div class="text-xs font-bold text-brown-900 mb-1">
          Ringkasan <span class="font-normal">&#9660;</span>
        </div>
        <div class="pl-2 text-sm">
          <div class="flex justify-between">
            <span>Penjualan bersih</span><span>Rp6.700.000</span>
          </div>
          <div class="flex justify-between">
            <span>Pemotongan</span><span>Rp5.000</span>
          </div>
          <div class="flex justify-between">
            <span>Pencairan</span><span>Rp6.700.000</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
