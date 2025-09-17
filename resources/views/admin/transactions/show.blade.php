<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Transaksi</title>
</head>
<body>
  <h1>Detail Transaksi #{{ $transaction->id }}</h1>

  <p><strong>Pembeli:</strong> {{ $transaction->user->username }} ({{ $transaction->user->email }})</p>
  <p><strong>Produk:</strong> {{ $transaction->menu->nama_produk }}</p>
  <p><strong>Jumlah:</strong> {{ $transaction->quantity }}</p>
  <p><strong>Total:</strong> Rp {{ number_format($transaction->total, 0, ',', '.') }}</p>
  <p><strong>Metode Pembayaran:</strong> {{ ucfirst($transaction->payment_method) }}</p>
  <p><strong>Status:</strong> {{ ucfirst($transaction->status) }}</p>
  <p><strong>Tanggal:</strong> {{ $transaction->created_at->format('d M Y H:i') }}</p>

  @if(!in_array($transaction->status, ['cancelled','done']))
    <form action="{{ route('pesanan.siap', ['id' => $transaction->id]) }}" method="POST" style="margin-top: 12px;">
      @csrf
      <button type="submit" style="background:#1d4ed8;color:#fff;border:none;border-radius:6px;padding:8px 12px;cursor:pointer;">Pesanan Siap</button>
    </form>
  @endif

  <br>
  <a href="{{ route('transaksi') }}">← Kembali ke daftar transaksi</a>
</body>
</html>
