<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Pesanan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 min-h-screen">
  <div class="flex min-h-screen">
    <!-- Sidebar di-include dari file terpisah -->
    @include('layouts.admin')

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
          <div class="text-xs text-brown-700">Order Code: {{ $order?->order_code ?? '-' }}</div>
        </div>
      </div>

      <!-- Notifikasi -->
      @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
      @endif

      @if(session('error'))
        <div class="mb-4 p-3 rounded bg-red-100 text-red-800">{{ session('error') }}</div>
      @endif

      <!-- Card Detail Pesanan -->
      <div class="bg-orange-100 rounded-lg p-6 mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
          <div>
            <div class="text-xs text-brown-700 mb-1">Dipesan oleh</div>
            <div class="font-bold text-brown-900 text-lg">{{ $order?->user?->email ?? '-' }}</div>
          </div>
        </div>

        <div class="text-xs text-brown-700">
          Order Code:
          <span class="text-brown-900 font-semibold">{{ $order?->order_code ?? '-' }}</span>
          <span class="ml-2">{{ $order?->created_at ? $order->created_at->format('d-m-Y (H.i)') : '-' }}</span>
        </div>

        @if($order && !in_array($order->status, ['cancelled', 'completed']))
          <form action="{{ route('pesanan.siap', ['id' => $order->id]) }}" method="POST" class="mb-4 mt-4">
            @csrf
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
              <div class="flex items-center gap-2">
                <span class="text-xs text-brown-700">Atur pesanan siap diambil dalam</span>
                <span class="bg-[#5C2E0B] text-white rounded px-3 py-1 text-sm font-bold">10 menit</span>
              </div>
              <button type="submit" class="w-full md:w-auto bg-[#5C2E0B] hover:bg-[#3d1e07] text-white font-semibold py-2 px-4 rounded">
                Tandai pesanan siap
              </button>
            </div>
          </form>
        @endif

        <!-- List Produk -->
        <div class="bg-white rounded p-4">
          @if($order)
            @foreach($order->orderItems as $item)
              <div class="mb-2 flex items-center justify-between">
                <div>
                  <span class="font-bold">{{ $item->qty }}x</span>
                  <span class="font-bold text-brown-900">{{ $item->menu?->nama_produk ?? '-' }}</span>
                </div>
                <div class="font-bold text-brown-900">
                  Rp{{ number_format($item->price * $item->qty, 0, ',', '.') }}
                </div>
              </div>
            @endforeach

            <div class="text-xs text-brown-900 ml-6 mb-2">
              Status: <span class="font-bold">{{ ucfirst($order->status) }}</span>
            </div>

            <div class="border-t border-brown-200 my-2"></div>

            <div class="flex justify-between items-center">
              <span class="font-bold text-brown-900">Subtotal</span>
              <span class="font-bold text-brown-900 text-lg">
                Rp{{ number_format($order->total, 0, ',', '.') }}
              </span>
            </div>
          @else
            <div class="text-center text-gray-600">Order tidak ditemukan.</div>
          @endif
        </div>
      </div>
    </div>
  </div>
</body>
</html>
