<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Drip & Co - Minimalis Rasa Maksimal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom font style similar to the mockup for headings */
        @import url('https://fonts.googleapis.com/css2?family=Alumni+Sans+Inline+One&family=Baloo+2&display=swap');

        body {
            font-family: 'Baloo 2', cursive;
            background: #fff7eb;
            background-image: url('https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/your-background-image.jpg');
            /* Replace with the actual image URL */
            background-size: cover;
            /* Cover the entire area */
            background-position: center;
            /* Center the image */
            background-repeat: no-repeat;
            /* Prevent repeating */
            color: #633a00;
            line-height: 1.4;
        }

        .font-special {
            font-family: 'Baloo 2', cursive;
        }

        /* Drip & Co heading style */
        .heading-drip {
            font-weight: 900;
            font-size: 2.75rem;
            letter-spacing: 0.03em;
        }

        /* Strikethrough original price styling */
        .original-price {
            text-decoration: line-through;
            font-size: 0.875rem;
            color: #c45100;
            font-weight: 700;
        }

        /* Best seller badge style */
        .best-seller-badge {
            background: #f3ddbd;
            color: #4d2f00;
            font-weight: 700;
            border-radius: 12px;
            font-size: 0.75rem;
            padding: 0 10px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            cursor: default;
            user-select: none;
        }

        /* Button style for login */
        .btn-login {
            background-color: #633a00;
            color: #f6d8a1;
            font-weight: 700;
            padding: 0.6rem 1.6rem;
            border-radius: 10px;
            transition: background-color 0.25s ease;
            font-size: 0.875rem;
        }

        .btn-login:hover,
        .btn-login:focus {
            background-color: #805300;
            outline: none;
            text-decoration: none;
        }

        /* Navigation links style */
        nav a {
            font-weight: 600;
            font-size: 0.875rem;
            color: #7a4e1e;
            transition: color 0.3s ease;
        }

        nav a:hover,
        nav a:focus {
            color: #633a00;
            outline: none;
        }

        /* Icon arrow in nav */
        .nav-arrow {
            background-color: #633a00;
            color: #fbc156ff;
            border-radius: 50%;
            padding: 0.125rem 0.4rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 1rem;
            line-height: 1;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .nav-arrow:hover,
        .nav-arrow:focus {
            background-color: #805300;
            outline: none;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col">

    <!-- Navigation -->
    <header class="bg-[#fbedd9] border-b border-[#cc9f59]">
        <nav class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4 text-sm select-none">
            <div class="flex space-x-8 font-semibold font-special">
                <a href="#" class="hover:underline focus:underline">Lihat Menu</a>
                <a href="#" class="hover:underline focus:underline">Tentang kami</a>
            </div>
            <div>
                <a href="{{ route('login') }}" class="flex items-center gap-2 font-semibold tracking-wide text-[#633a00]">
                    <span>LOGIN & JELAJAHI</span>
                    <span aria-label="Arrow right" class="nav-arrow" role="button" tabindex="0">></span>
                </a>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto flex-grow pt-12 px-6 sm:px-12 lg:px-20">
        <section class="lg:flex lg:gap-24">

            <!-- Left Content Block -->
            <article class="flex-1 max-w-xl">
                <div class="inline-flex items-center gap-3 mb-2 bg-[#fde7bd] text-[#633a00] text-xs font-semibold rounded-full py-1 px-3 w-max">
                    <span class="font-sans uppercase tracking-widest">#1</span>
                    <span>E-commerce Platform</span>
                </div>
                <h1 class="heading-drip mb-1 leading-tight max-w-[400px]">
                    DRIP & CO
                </h1>
                <p class="text-lg font-semibold max-w-[380px] mb-8" style="letter-spacing:0.02em;">
                    NGOPI DENGAN GAYA MINIMALIS RASA MAKSIMAL.
                </p>

                <section aria-labelledby="pembayaran-title" class="bg-[#fde7bd] rounded-xl p-6 max-w-md mb-12 shadow-sm">
                    <h2 id="pembayaran-title" class="font-special font-semibold text-[#633a00] text-xl mb-3 border-b border-[#c7ac6b] pb-1">Pembayaran cepat Satu-klik</h2>
                    <p class="text-sm mb-6 leading-relaxed">
                        Daftar/Login untuk mendapatkan Keunggulan promo dari kafe kami, Dengan mengikuti panduan dan Info yang selalu hadir dalam - Mingguan. Menarik!
                    </p>

                    @if(Route::has('login'))

                    @auth
                    <a
                        href="{{ auth()->check() ? (auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard')) : '#' }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>

                    @else
                    <a href="{{route('login')}}" class="btn-login inline-block" role="button" tabindex="0">LOGIN</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register')}}" class="btn-login inline-block" role="button" tabindex="0">DAFTAR</a>
                        @endif
                    @endauth
                    @endif
                </section>

                <div class="flex flex-col sm:flex-row sm:items-center gap-6 max-w-md text-[#633a00] mb-6">
                    <span class="font-special font-extrabold text-3xl sm:text-4xl tracking-tight select-none">2.2K+</span>
                    <p class="text-sm max-w-xs">Pengguna aktif dalam sehari</p>
                </div>

                <p class="text-sm max-w-xl leading-relaxed">
                    Drip & Co mengajak pelanggan membawa tumbler sendiri saat membeli minuman. Tapi jangan khawatir, – jika kamu belum punya tumbler, kami tetap sediakan cup dengan biaya tambahan sebagai bentuk kontribusi untuk lingkungan.
                </p>
            </article>

            <!-- Right Content Block - Images -->
            <article class="flex-1 relative w-full">
                <div class="best-seller-badge absolute top-0 left-0 m-4 cursor-default select-none z-10" aria-label="Best seller cup of coffee">
                    BEST SELLER >
                </div>

                <div class="flex flex-col sm:flex-row items-start gap-4 sm:gap-6">
                    <!-- First Image - Coffee Cup -->
                    <div class="relative w-full sm:w-48 md:w-56 rounded-lg shadow-lg overflow-hidden flex-shrink-0" aria-label="Photo of a cup of latte coffee with latte art on top and coffee beans around the cup">
                        <img
                            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/3acc4bda-19e2-47e4-9796-07a5d24fa9b8.png"
                            alt="A cup of latte coffee with beautiful latte art on a wooden surface surrounded by coffee beans, style: warm, cozy cafe ambiance with wooden textures and natural lighting"
                            class="w-full h-auto object-cover rounded-lg shadow-md"
                            style="aspect-ratio: 4/3;"
                            onerror="this.style.display='none'" />
                        <div class="absolute bottom-0 right-0 bg-[#fde7bd] text-[#804000] text-xs font-semibold px-3 py-1 rounded-tr-lg rounded-bl-lg border border-[#c7ac6b]">
                            <p>
                                <span class="original-price">Rp29.000</span><br />
                                <span class="font-bold text-base">Rp19.000</span>
                            </p>
                        </div>
                    </div>

                    <!-- Second Image - Barista -->
                    <div
                        class="rounded-xl shadow-lg w-full sm:w-48 md:w-56 flex-shrink-0 overflow-hidden"
                        aria-label="Photo of a smiling young woman barista pouring milk into a coffee cup forming latte art in a cozy coffee shop counter interior">
                        <img
                            src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/b0099b9c-b571-4356-84db-66b68d92b59e.png"
                            alt="Smiling young woman barista wearing a beige apron carefully pouring steamed milk into a coffee cup creating latte art inside a warm, cozy coffee shop with espresso machines in background"
                            class="w-full h-auto object-cover"
                            style="aspect-ratio: 3/4;"
                            onerror="this.style.display='none'" />
                    </div>
                </div>

                <!-- Sponsor Box - positioned below images -->
                <div class="p-2 mt-6 bg-[#fde7bd] text-[#633a00] rounded text-xs max-w-xs font-semibold tracking-tight text-left border border-[#c7ac6b] shadow-sm">
                    <p>Disponsori oleh:</p>
                    <p>PT.Beli kopi indonesia <br /><a href="https://www.BeliKopi.com" target="_blank" rel="noopener noreferrer" class="underline">www.BeliKopi.com</a></p>
                </div>
            </article>
        </section>
    </main>

    <footer class="bg-[#fbedd9] border-t border-[#cc9f59] text-center p-4 text-sm text-[#7a4e1e] select-none">
        © 2024 Drip & Co. Hak cipta dilindungi.
    </footer>

</body>

</html>