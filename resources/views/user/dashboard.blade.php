<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drip&Co - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Sidebar dipanggil dari file terpisah -->
  @include('layouts.user')


    <!-- Konten -->
    <div class="content">
        <img src="{{ asset('asset/dashboard.jpg') }}" alt="Cafe Background" class="bg">
        <div class="welcome">
            SELAMAT DATANG, <br>
           DI WEBSITE DRIP&CO<br>
        </div>
    </div>

</body>

</html>
