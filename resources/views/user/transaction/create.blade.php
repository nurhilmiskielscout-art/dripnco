<!DOCTYPE html>
<html>
<head>
  <title>Pembayaran</title>
</head>
<body>
  <h1>Beli {{ $menu->nama_produk }}</h1>
  <p>Harga: Rp {{ number_format($menu->harga,0,',','.') }}</p>

  <form method="POST" action="{{ route('user.transaction.store', $menu->id) }}">
    @csrf
    <label>Jumlah:</label>
    <input type="number" name="quantity" value="1" min="1"><br><br>

    <label>Metode Pembayaran:</label>
    <select name="payment_method" required>
      <option value="transfer">Transfer Bank</option>
      <option value="cod">Cash on Delivery</option>
    </select><br><br>

    <button type="submit">Konfirmasi Pembelian</button>
  </form>

  <a href="{{ route('user.menu') }}">← Kembali</a>
</body>
</html>
