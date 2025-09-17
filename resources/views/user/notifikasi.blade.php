<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Drip&Co - Notifikasi</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      display: flex;
      background: linear-gradient(to bottom, #fff, #fdf6ef);
    }
    .content {
      margin-left: 220px; /* ruang untuk sidebar */
      padding: 20px;
      width: 100%;
    }
    .title {
      font-weight: 800;
      color: #5c2d0c;
      margin: 0 0 16px 0;
    }
    .notification {
      background: #f4e0c9;
      padding: 15px;
      border-radius: 6px;
      margin-bottom: 12px;
      font-size: 14px;
      border: 1px solid #e0d5c6;
    }
    .notification .time {
      color: #7a5a3a;
      font-size: 12px;
      margin-top: 6px;
      display: block;
    }
    .empty {
      background: #fff;
      border: 1px dashed #e0d5c6;
      color: #7a5a3a;
      padding: 16px;
      border-radius: 6px;
      text-align: center;
    }
  </style>
</head>
<body>

  {{-- Sidebar --}}
  @include('layouts.user')

  <div class="content">
    <h2 class="title">Notifikasi</h2>

    @php
      use App\Models\Transaction;
      $notifications = collect();
      if (auth()->check()) {
        $notifications = Transaction::with('menu')
          ->where('user_id', auth()->id())
          ->where('status', 'done')
          ->latest('updated_at')
          ->get();
      }
    @endphp

    @guest
      <div class="empty">Silakan login untuk melihat notifikasi pesanan Anda.</div>
    @endguest

    @auth
      @if($notifications->isEmpty())
        <div class="empty">Belum ada notifikasi pesanan siap.</div>
      @else
        @foreach($notifications as $trx)
          <div class="notification">
            Pesanan siap: <strong>{{ $trx->quantity }}x {{ $trx->menu?->nama_produk }}</strong> — Order #{{ $trx->id }}. Silakan ambil di outlet.
            <span class="time">{{ $trx->updated_at?->format('d-m-Y (H.i)') }}</span>
          </div>
        @endforeach
      @endif
    @endauth
  </div>

</body>
</html>
