<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <img src="{{ asset('asset/logo.png') }}" alt="Logo DRIP&CO">
        <h1>DRIP&CO</h1>
    </div>
    <nav>
        <a href="{{ route('user.dashboard') }}"><i class="fa-solid fa-house"></i><span>Halaman Utama</span></a>
        <a href="{{ route('about_us') }}"><i class="fa-solid fa-users"></i><span>Tentang Kami</span></a>
        <a href="{{route('user.menu')}}" class="active"><i class="fa-solid fa-mug-saucer"></i><span>Menu</span></a>
        <a href="{{ route('notifikasi') }}"><i class="fa-solid fa-bell"></i><span>Notifikasi</span></a>
        <a href="{{ route('lokasi') }}"><i class="fa-solid fa-location-dot"></i><span>Lokasi</span></a>
        <a href="{{ route('sosmed') }}"><i class="fa-brands fa-facebook"></i><span>Sosial Media</span></a>
        <a id="logoutBtn"><i class="fa-solid fa-right-from-bracket"></i><span>Logout</span></a>
    </nav>
</aside>

<!-- Floating Hamburger -->
<div class="toggle-btn" id="toggleBtn">
    <div class="bar bar1"></div>
    <div class="bar bar2"></div>
    <div class="bar bar3"></div>
</div>

<!-- Popup Logout -->
<div class="popup-overlay" id="popupOverlay">
    <div class="popup">
        <h3>Yakin ingin logout?</h3>
        <form id="logoutForm" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-yes">Ya</button>
            <button type="button" class="btn-no" id="cancelLogout">Batal</button>
        </form>
    </div>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>
/* Sidebar Background dan Shadow */
.sidebar {
    width: 250px;
    height: 100vh;
    position: fixed;
    top: 0;
    left: -260px;
    display: flex;
    flex-direction: column;
    background: #f4e3cf; /* Beige terang sesuai desain */
    color: #5e4632; /* Cokelat gelap untuk teks */
    box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
    transition: left 0.4s ease;
    z-index: 1000;
}

.sidebar.open {
    left: 0;
}

.sidebar-logo {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 1.5rem 0;
    gap: 10px;
}

.sidebar-logo img {
    width: 60px;
    height: 60px;
    object-fit: contain;
}

.sidebar-logo h1 {
    font-size: 1.5rem;
    font-weight: bold;
    color: #5e4632; /* Cokelat gelap */
}

/* Navigation Links */
.sidebar nav {
    flex: 1;
    display: flex;
    flex-direction: column;
    margin-top: 1rem;
}

.sidebar nav a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 20px;
    color: #5e4632; /* Warna teks cokelat gelap */
    text-decoration: none;
    border-radius: 8px;
    margin: 5px 10px;
    transition: background 0.3s;
}

.sidebar nav a i {
    min-width: 25px;
    font-size: 1.2rem;
    color: #5e4632; /* Ikon sama warna dengan teks */
}

.sidebar nav a:hover,
.sidebar nav a.active {
    background-color: rgba(94, 70, 50, 0.15); /* Efek hover cokelat transparan */
}

/* Floating Hamburger */
.toggle-btn {
    position: fixed;
    top: 20px;
    left: 20px;
    width: 35px;
    height: 30px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    cursor: pointer;
    z-index: 2000;
}

.toggle-btn .bar {
    height: 4px;
    width: 100%;
    background-color: #c19a6b; /* Soft cokelat seperti desain */
    border-radius: 3px;
    transition: all 0.4s ease;
}

.toggle-btn.active .bar1 {
    transform: rotate(45deg) translate(6px, 6px);
}
.toggle-btn.active .bar2 {
    opacity: 0;
}
.toggle-btn.active .bar3 {
    transform: rotate(-45deg) translate(6px, -6px);
}

/* Popup Logout */
.popup-overlay {
    display: none;
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.65);
    justify-content: center;
    align-items: center;
    z-index: 3000;
}

.popup {
    background: #fff;
    padding: 2rem;
    border-radius: 12px;
    text-align: center;
    width: 320px;
    box-shadow: 0 6px 25px rgba(0,0,0,0.35);
}

.popup h3 {
    margin-bottom: 1.5rem;
    font-size: 1.2rem;
    color: #333;
}

.popup button {
    padding: 0.5rem 1.2rem;
    margin: 0 0.5rem;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s, transform 0.2s;
}

.popup .btn-yes { background-color: #e74c3c; color: #fff;}
.popup .btn-yes:hover { background-color: #c0392b; transform: scale(1.05);}
.popup .btn-no { background-color: #ccc; color: #000;}
.popup .btn-no:hover { background-color: #999; transform: scale(1.05);}
</style>

<script>
const sidebar = document.getElementById("sidebar");
const toggleBtn = document.getElementById("toggleBtn");
const logoutBtn = document.getElementById("logoutBtn");
const popupOverlay = document.getElementById("popupOverlay");
const cancelLogout = document.getElementById("cancelLogout");

toggleBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    toggleBtn.classList.toggle("active");
});

logoutBtn.addEventListener("click", () => {
    popupOverlay.style.display = "flex";
});

cancelLogout.addEventListener("click", () => {
    popupOverlay.style.display = "none";
});
</script>
