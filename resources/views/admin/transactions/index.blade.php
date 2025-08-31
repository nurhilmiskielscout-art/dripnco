<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Transaksi</title>
</head>
<body>
  <h1>Daftar Transaksi</h1>

  <table border="1" cellpadding="8" cellspacing="0">
    <thead>
      <tr>
        <th>ID</th>
        <th>Pembeli</th>
        <th>Produk</th>
        <th>Jumlah</th>
        <th>Total</th>
        <th>Metode</th>
        <th>Status</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($transactions as $trx)
        <tr>
          <td>{{ $trx->id }}</td>
          <td>{{ $trx->user->username }}</td>
          <td>{{ $trx->menu->nama_produk }}</td>
          <td>{{ $trx->quantity }}</td>
          <td>Rp {{ number_format($trx->total, 0, ',', '.') }}</td>
          <td>{{ ucfirst($trx->payment_method) }}</td>
          <td>{{ ucfirst($trx->status) }}</td>
          <td>{{ $trx->created_at->format('d M Y') }}</td>
          <td><a href="{{ route('transaksi.show', $trx->id) }}">Detail</a></td>
        </tr>
      @empty
        <tr>
          <td colspan="9">Belum ada transaksi</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <br>
  <a href="{{ route('admin.dashboard') }}">← Kembali ke Dashboard</a>
</body>
</html>
