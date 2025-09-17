<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Pesanan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 min-h-screen">
  <div class="flex min-h-screen">

    <!-- Include Sidebar -->
    @include('layouts.admin')

    <!-- Konten Utama -->
    <div class="flex-1 p-8">
      <!-- Header -->
      <div class="mb-6 flex items-center gap-2">
        <a href="{{ url()->previous() }}" class="text-brown-900 hover:text-orange-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </a>
        <div>
          <div class="text-lg font-bold text-brown-900">Detail Pesanan</div>
          <div class="text-xs text-brown-700">F-123456789</div>
        </div>
      </div>

      <!-- List Pesanan -->
      <div class="space-y-4">
        @foreach($orders as $order)
          <div class="bg-orange-100 rounded-lg flex flex-col md:flex-row items-center justify-between p-4 gap-4">
            <div>
              <div class="text-xs text-brown-700 mb-1">Dipesan oleh</div>
              <div class="font-bold text-brown-900 text-lg">{{ $order->user?->email }}</div>
              <div class="text-xs text-brown-700">Order Code: {{ $order->order_code }}</div>
              <div class="text-xs text-brown-700">Total: Rp {{ number_format($order->total, 0, ',', '.') }}</div>
            </div>
            <div class="flex items-center gap-2">
              <a href="{{ route('pesanan.show', ['id' => $order->id]) }}" 
                 class="px-6 py-2 rounded font-semibold text-white text-base bg-[#5C2E0B] hover:bg-[#3d1e07]">
                Cek pesanan
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</body>
</html>
