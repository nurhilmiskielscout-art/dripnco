<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drip&Co - Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            margin: 0;
            font-family: "Poppins", Arial, sans-serif;
            display: flex;
            background-color: #fdf3e7;
            /* cream muda background */
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #fcecd2;
            /* warna cream sama figma */
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            border-right: 3px solid #e0b989;
            /* garis tepi kayak figma */
        }

        .logo {
            text-align: left;
            margin-bottom: 40px;
        }

        .logo img {
            width: 60px;
            margin-bottom: 10px;
        }

        .logo h3 {
            font-size: 18px;
            margin: 0;
            color: #4b3621;
            font-weight: 600;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .menu a {
            text-decoration: none;
            font-size: 16px;
            color: #4b3621;
            font-weight: 400;
            padding: 5px 0;
            text-align: left;
            display: block;
        }

        .menu a.active {
            font-weight: 700;
            /* Bold untuk Halaman Utama */
        }

        /* Bagian bawah sidebar */
        .bottom {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .bottom a {
            text-decoration: none;
            font-size: 15px;
            color: #4b3621;
            font-weight: 400;
        }

        /* Konten */
        .content {
            margin-left: 220px;
            /* kasih jarak sidebar */
            padding: 30px;
            flex: 1;
            text-align: center;
            background-color: #FAF7F2;
            min-height: 100vh;
        }

        .content img {
            width: 80%;
            border-radius: 0;
            margin-bottom: 20px;
        }

        .welcome {
            font-size: 28px;
            font-weight: 700;
            color: #2b1b10;
            background: rgba(255, 255, 255, 0.6);
            padding: 10px 20px;
            display: inline-block;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <div class="logo">
                <img src="{{ asset('image/logoh.jpg') }}" alt="Drip&Co">
                <h3>DRIP&CO</h3>
            </div>
            <div class="menu">
                <a href="#" class="active">Halaman Utama</a>
                <a href="#">Tentang kami</a>
                <a href="{{ route('user.menu') }}">Menu</a>
                <a href="#">Notifikasi</a>
                <a href="#">Lokasi</a>
                <form action="{{ route('logout') }}" method="POST" class="mb-6">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
                </form>
            </div>
        </div>
        <div class="bottom">
            <a href="#">Sosial media</a>
            <a href="#">Logout</a>
        </div>
    </div>

    <!-- Konten -->
    <div class="content">
        <img src="https://source.unsplash.com/1200x500/?coffee,cafe" alt="Cafe Image">
        <div class="welcome">SELAMAT DATANG DI WEBSITE DRIP&CO</div>
    </div>

</body>

</html>