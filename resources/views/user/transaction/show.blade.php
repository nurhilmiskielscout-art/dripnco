<!DOCTYPE html>
<html>
<head>
  <title>Detail Transaksi</title>
</head>
<body>
  <h1>Detail Transaksi</h1>
  <p>Produk: {{ $transaction->menu->nama_produk }}</p>
  <p>Jumlah: {{ $transaction->quantity }}</p>
  <p>Total: Rp {{ number_format($transaction->total,0,',','.') }}</p>
  <p>Metode Pembayaran: {{ ucfirst($transaction->payment_method) }}</p>
  <p>Status: {{ ucfirst($transaction->status) }}</p>

  <a href="{{ route('user.menu') }}">← Kembali ke Menu</a>
</body>
</html>
