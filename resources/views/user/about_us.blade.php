<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - DRIP&CO</title>
    <link rel="stylesheet" href="{{ asset('css/about_us.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Sidebar pakai include -->
    @include('layouts.user')

    <div class="about-container">
        <div class="about-image">
            <img src="{{ asset('asset/aboutus.jpg') }}" alt="Drip&Co Cafe">
        </div>
        <div class="about-content">
            <h2>Apa itu DRIP&CO?</h2>
            <p>
                Drip & Co adalah sebuah kafe sekaligus website pemesanan minuman kopi yang mengusung konsep ramah lingkungan. Drip & Co mengajak pelanggan membawa tumbler sendiri saat membeli minuman, jangan khawatir jika kamu belum punya tumbler kami tetap sediakan cup dengan biaya tambahan Rp7.000. Dukung gaya hidup earth (sustain) di kafe kami!<br>
                Setiap pembeli kontribusi untuk lingkungan, ketentuan ini adalah kebijakan dari kafe kami.
            </p>
            <p>
                Namun lain dari Drip & Co tidak sepenuhnya kami hanya menyajikan menu minuman.<br>
                Melainkan, kafe kami memiliki 2 menu lainnya, berikut menu yang ada ditoko kami:<br>
                1.) Coffee<br>
                2.) Ice Cream<br>
                3.) Roti
            </p>
            <h3>Mengenal toko kami</h3>
            <p>
                Toko kami buka setiap Pukul 07.00 Pagi, tutup hingga Pukul 21.00 Malam.<br>
                Buka setiap hari (termasuk minggu)
            </p>
            <p>
                ---Kami menyediakan tempat yang nyaman dan asik untuk customer. Tempat kami sangat cocok untuk pertemuan seperti:<br>
                (Nongkrong, kerja bareng, kumpul keluarga, Teman dan Sahabat, dll)
            </p>
            <p>
                Ditempat kami tersedia Colokan (untuk cas hp) diberbagai sudut meja serta Wifi Internet Full Akses. Ruangan kami juga sangat nyaman untuk belajar, meeting, atau sekedar bersantai. Kami juga menyediakan berbagai pilihan menu yang bisa dinikmati di tempat maupun dibawa pulang.
            </p>
            <p>
                Mau pesan menu favoritmu secara langsung atau ingin di tempat? boleh kok! asalkan minimal beli 1 menu produk dari kafe kami yaaa...
            </p>
            <div class="note">
                <b>NOTE:</b><br>
                <span>Discount dapat diperoleh melalui akun sosial media kami, STAY TUNE ALL.</span>
            </div>
        </div>
    </div>
</body>
</html>
