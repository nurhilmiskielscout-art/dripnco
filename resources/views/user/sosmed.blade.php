<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Drip&Co - Sosial Media</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      display: flex;
      background: linear-gradient(to bottom, #fff, #fdf6ef);
    }

    .content {
      margin-left: 220px; /* ruang sidebar */
      padding: 30px;
      width: calc(100% - 220px);
    }

    .content h2 {
      text-align: center;
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 30px;
      color: #3b2b20;
    }

    .social-card {
      display: flex;
      align-items: center;
      background: #fff;
      border-radius: 12px;
      padding: 15px 20px;
      margin-bottom: 15px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.08);
      transition: transform 0.2s ease;
    }

    .social-card:hover {
      transform: scale(1.02);
    }

    .icon {
      font-size: 28px;
      margin-right: 20px;
      width: 40px;
      text-align: center;
    }

    .social-text {
      display: flex;
      flex-direction: column;
    }

    .social-text strong {
      font-size: 16px;
      color: #2c1c14;
    }

    .social-text span {
      font-size: 14px;
      color: #555;
    }
  </style>
</head>
<body>

  {{-- Sidebar --}}
  @include('layouts.user')

  <div class="content">
    <h2>Ikuti sosial media kami untuk info menarik setiap hari</h2>

    <div class="social-card">
      <i class="fa-solid fa-envelope icon" style="color:#d93025;"></i>
      <div class="social-text">
        <strong>Email</strong>
        <span>dripco097@gmail.com</span>
      </div>
    </div>

    <div class="social-card">
      <i class="fa-brands fa-facebook icon" style="color:#1877f2;"></i>
      <div class="social-text">
        <strong>Facebook</strong>
        <span>www.facebook.drip&co.com</span>
      </div>
    </div>

    <div class="social-card">
      <i class="fa-brands fa-whatsapp icon" style="color:#25d366;"></i>
      <div class="social-text">
        <strong>Saluran WhatsApp</strong>
        <span>www.saluran.whatsapp.drip&co.com</span>
      </div>
    </div>

    <div class="social-card">
      <i class="fa-brands fa-instagram icon" style="color:#e4405f;"></i>
      <div class="social-text">
        <strong>Instagram</strong>
        <span>www.instagram.drip&co.com</span>
      </div>
    </div>
  </div>

</body>
</html>
