<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Menu {{ ucfirst($category) }}</title>
</head>
<body>
  <h1>Menu {{ ucfirst($category) }}</h1>

  <ul>
    @foreach($menus as $produk)
      <li>
        {{ $produk->nama_produk }} - Rp {{ number_format($produk->harga,0,',','.') }}
        <a href="{{ route('user.menu.show', $produk->id) }}">Detail</a>
      </li>
    @endforeach
  </ul>

  <a href="{{ route('user.menu') }}">← Kembali ke semua menu</a>
</body>
</html>
