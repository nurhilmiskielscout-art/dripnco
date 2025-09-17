<!DOCTYPE html>
<html>
<head>
  <title>Detail Transaksi</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      font-size: 14px;
      display: flex;
      justify-content: center;
      background: #f5f5f5;
    }
    .receipt-container {
      background: #fff;
      max-width: 320px;
      width: 100%;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 6px;
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    }
    h3 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 16px;
    }
    .receipt-items {
      border-top: 1px dashed #aaa;
      margin-top: 10px;
      padding-top: 10px;
    }
    .receipt-items div {
      display: flex;
      justify-content: space-between;
      margin-bottom: 6px;
    }
    .receipt-total {
      font-weight: bold;
      border-top: 1px solid #000;
      padding-top: 10px;
      margin-top: 10px;
      display: flex;
      justify-content: space-between;
    }
    .back-link {
      display: block;
      text-align: center;
      margin-top: 15px;
      text-decoration: none;
      color: #007BFF;
      font-size: 13px;
    }
    .back-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="receipt-container">
    <h3>Detail Transaksi</h3>

    <div class="receipt-items">
      <div>
        <span>Produk</span>
        <span>{{ $transaction->menu->nama_produk }}</span>
      </div>
      <div>
        <span>Jumlah</span>
        <span>{{ $transaction->quantity }}</span>
      </div>
      <div>
        <span>Metode Pembayaran</span>
        <span>{{ ucfirst($transaction->payment_method) }}</span>
      </div>
      <div>
        <span>Status</span>
        <span>{{ ucfirst($transaction->status) }}</span>
      </div>
    </div>

    <div class="receipt-total">
      <span>Total</span>
      <span>Rp {{ number_format($transaction->total,0,',','.') }}</span>
    </div>

    <a href="{{ route('user.menu') }}" class="back-link">← Kembali ke Menu</a>
  </div>
</body>
</html>
