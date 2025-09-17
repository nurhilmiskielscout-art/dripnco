<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Drip&Co - Lokasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      display: flex;
      background: linear-gradient(to bottom, #fff, #fdf6ef);
    }

    /* Konten mepet sidebar */
    .content {
      margin-left: 220px; /* sesuai lebar sidebar */
      padding: 20px;
      width: calc(100% - 220px);
    }

    /* Foto utama */
    .lokasi-main {
      position: relative;
      width: 100%;
      max-width: 950px;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .lokasi-main img {
      width: 100%;
      height: 500px;
      object-fit: cover;
      display: block;
    }

    /* Alamat di atas foto */
    .lokasi-text {
      position: absolute;
      top: 15px;
      left: 15px;
      background: rgba(0,0,0,0.65);
      color: #fff;
      padding: 12px 18px;
      border-radius: 10px;
      font-size: 15px;
      line-height: 1.5;
      font-weight: 500;
      max-width: 70%;
    }

    .lokasi-text i {
      margin-right: 6px;
      color: #ffcc00;
    }

    /* Foto kecil menempel di dalam background */
    .lokasi-small {
      position: absolute;
      bottom: 20px;
      right: 20px;
      display: flex;
      gap: 12px;
    }

    .lokasi-small img {
      width: 180px;
      height: 120px;
      object-fit: cover;
      border-radius: 12px;
      border: 3px solid #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      transition: transform 0.2s ease;
    }

    .lokasi-small img:hover {
      transform: scale(1.05);
    }
  </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

  {{-- Sidebar --}}
  @include('layouts.user')

  <div class="content">
    <div class="lokasi-main">
      <!-- Foto utama -->
      <img src="{{ asset('asset/bg_lokasi.jpg') }}" alt="Kafe Drip&Co">

      <!-- Alamat -->
      <div class="lokasi-text">
        <i class="fa fa-map-marker-alt"></i>
        Bogor, Gn.Putri <br>
        Jln. Garuda, Singgasari, RT09/RW11 <br>
        Gang Melati nomor 03
      </div>

      <!-- Foto kecil (di dalam background) -->
      <div class="lokasi-small">
        <img src="{{ asset('asset/peta.jpg') }}" alt="Peta Lokasi Drip&Co">
        <img src="{{ asset('asset/img_kcl_lokasi.jpg') }}" alt="Lokasi Kafe Kami">
      </div>
    </div>
  </div>

</body>
</html>
