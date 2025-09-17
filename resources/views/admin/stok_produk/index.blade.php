<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Menu & Stok Produk - Drip&Co</title>
  <style>
    /* ======== Global Style ======== */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #fff, #fdebd0);
    }
    .container {
      margin-left: 220px;
      padding: 20px;
    }

    /* ======== Header ======== */
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .search-box {
      flex: 1;
      margin: 0 20px;
    }
    .search-box input {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #aaa;
    }
    .icons {
      display: flex;
      gap: 15px;
      font-size: 20px;
      cursor: pointer;
    }
    .notification-badge, .cart-badge {
      position: relative;
    }
    .notification-badge span, .cart-badge span {
      position: absolute;
      top: -8px;
      right: -8px;
      background: red;
      color: white;
      font-size: 10px;
      border-radius: 50%;
      padding: 2px 5px;
      min-width: 16px;
      text-align: center;
    }
    .cart-badge span {
      display: none;
    }
    .cart-badge.show-badge span {
      display: block;
    }

    /* ======== Kategori ======== */
    .categories {
      margin: 20px 0;
      font-size: 16px;
      font-weight: bold;
    }
    .categories span {
      margin-right: 20px;
      cursor: pointer;
      color: #666;
      padding-bottom: 5px;
      transition: 0.3s;
    }
    .categories span.active {
      color: #b87333;
      border-bottom: 2px solid #b87333;
    }

    /* ======== Menu Produk Grid ======== */
    .menu-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 20px;
    }
    .menu-item {
      background: white;
      border-radius: 12px;
      padding: 10px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .menu-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
    .menu-item img {
      width: 100%;
      height: 120px;
      object-fit: cover;
      border-radius: 10px;
    }
    .menu-item button {
      margin-top: 10px;
      background: #b87333;
      border: none;
      color: white;
      padding: 6px 12px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 18px;
      transition: 0.2s;
    }
    .menu-item button:hover {
      background: #a3622a;
    }

    /* ======== Modal Global ======== */
    .modal {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.4);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      transition: 0.3s;
    }
    .modal-content {
      background: #fff;
      border-radius: 15px;
      padding: 20px;
      width: 400px;
      max-height: 80%;
      overflow-y: auto;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }
    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: bold;
      font-size: 18px;
      margin-bottom: 10px;
    }
    .close-btn {
      cursor: pointer;
      font-size: 22px;
      font-weight: bold;
    }

    /* ======== Cart Modern ======== */
    .cart-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 15px;
      padding: 12px;
      border-bottom: 1px solid #eee;
      background: #fff;
      border-radius: 8px;
      margin-bottom: 10px;
      box-shadow: 0 1px 4px rgba(0,0,0,0.05);
    }
    .cart-item img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 8px;
      flex-shrink: 0;
    }
    .cart-item .item-info {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      font-size: 14px;
      color: #333;
    }
    .cart-item .item-info span:first-child {
      font-weight: bold;
      margin-bottom: 3px;
    }
    .cart-controls {
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .cart-controls button {
      border: none;
      background: #b87333;
      color: white;
      font-size: 16px;
      padding: 5px 10px;
      border-radius: 50%;
      cursor: pointer;
      transition: 0.2s;
    }
    .cart-controls button:hover {
      background: #a3622a;
    }

    /* ======== Total dan Checkout ======== */
    .total {
      font-weight: bold;
      margin-top: 15px;
      text-align: right;
    }
    .checkout-btn {
      margin-top: 10px;
      background: #b87333;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.2s;
    }
    .checkout-btn:hover {
      background: #a3622a;
    }
  </style>
</head>
<body>

  @include('layouts.user')

  <div class="container">
    <!-- Header -->
    <div class="header">
      <div class="search-box">
        <input type="text" id="search" placeholder="Cari menu yang tersedia di toko kami..">
      </div>
      <div class="icons">
        <div class="notification-badge" onclick="openNotif()">🔔 <span id="notif-count">0</span></div>
        <div class="cart-badge" onclick="openCart()">🛒 <span id="cart-count">0</span></div>
      </div>
    </div>

    <!-- Kategori -->
    <div class="categories">
      <span class="active" onclick="filterMenu('coffee', this)">Coffee</span>
      <span onclick="filterMenu('ice', this)">Ice Cream</span>
      <span onclick="filterMenu('roti', this)">Roti</span>
      <span onclick="filterMenu('all', this)">Semua</span>
    </div>

    <!-- Menu Produk -->
    <div class="menu-grid" id="menuGrid">
      @foreach($menus as $category => $menuItems)
        @foreach($menuItems as $menu)
          @php
            $dataCategory = match($category) {
              'kopi' => 'coffee',
              'ice_cream' => 'ice',
              'roti' => 'roti',
              default => $category
            };
          @endphp
          <div class="menu-item" data-category="{{ $dataCategory }}">
            <img src="{{ asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_produk }}">
            <h4>{{ $menu->nama_produk }}</h4>
            <p>Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
            <button onclick="addToCart({{ $menu->id }}, @json($menu->nama_produk), {{ $menu->harga }}, @json(asset('storage/' . $menu->gambar)))">+</button>
          </div>
        @endforeach
      @endforeach
    </div>
  </div>

  <!-- Modal Keranjang -->
  <div class="modal" id="cartModal">
    <div class="modal-content">
      <div class="modal-header">
        <span>Keranjang Belanja</span>
        <span class="close-btn" onclick="closeCart()">×</span>
      </div>
      <div id="cartItems"></div>
      <p style="font-size:12px; color:#888; margin-top:10px;">Wajib bawa tumbler! Jika tidak, beli tumbler di kasir.</p>
      <div class="total" id="totalPrice">Total harga: Rp 0</div>
      <button class="checkout-btn" onclick="openPaymentModal()">Pilih metode pembayaran</button>
    </div>
  </div>

  <!-- Modal Pembayaran -->
  <div class="modal" id="paymentModal">
    <div class="modal-content">
      <div class="modal-header">
        <span>Pembayaran</span>
        <span class="close-btn" onclick="closePaymentModal()">×</span>
      </div>

      <form id="paymentForm" method="POST" action="{{ route('user.transaction.store') }}">
        @csrf
        <input type="hidden" name="cartData" id="cartData">

        <label>Metode Pembayaran:</label>
        <select name="payment_method" required style="width:100%; padding:8px; border-radius:5px; margin-top:5px;">
          <option value="transfer">Transfer Bank</option>
          <option value="cod">Cash on Delivery</option>
        </select>

        <div class="total" style="margin-top:15px;" id="paymentTotal"></div>

        <button type="submit" class="checkout-btn" style="margin-top:15px;">Konfirmasi Pembelian</button>
      </form>
    </div>
  </div>

  <!-- Script Cart dan Payment -->
  <script>
    let cart = [];
    let totalAmount = 0;

    function openNotif() {
      alert("Fitur notifikasi belum tersedia");
    }

    function addToCart(id, name, price, img) {
      let item = cart.find(i => i.id === id);
      if (item) {
        item.qty++;
      } else {
        cart.push({ id, name, price, qty: 1, img });
      }
      renderCart();
    }

    function renderCart() {
      const cartItems = document.getElementById("cartItems");
      cartItems.innerHTML = "";
      totalAmount = 0;
      let totalItems = 0;

      cart.forEach((item, index) => {
        totalAmount += item.price * item.qty;
        totalItems += item.qty;
        cartItems.innerHTML += `
          <div class="cart-item">
            <img src="${item.img}" alt="${item.name}">
            <div class="item-info">
              <span>${item.name}</span>
              <small>Rp ${item.price.toLocaleString("id-ID")}</small>
            </div>
            <div class="cart-controls">
              <button onclick="changeQty(${index}, -1)">-</button>
              <span>${item.qty}</span>
              <button onclick="changeQty(${index}, 1)">+</button>
            </div>
          </div>
        `;
      });

      document.getElementById("totalPrice").innerText = "Total harga: Rp " + totalAmount.toLocaleString("id-ID");
      updateCartBadge(totalItems);
    }

    function updateCartBadge(count) {
      const cartBadge = document.querySelector('.cart-badge');
      const cartCount = document.getElementById('cart-count');
      if (count > 0) {
        cartBadge.classList.add('show-badge');
        cartCount.innerText = count;
      } else {
        cartBadge.classList.remove('show-badge');
        cartCount.innerText = '0';
      }
    }

    function changeQty(index, delta) {
      cart[index].qty += delta;
      if (cart[index].qty <= 0) cart.splice(index, 1);
      renderCart();
    }

    function openCart() {
      document.getElementById("cartModal").style.display = "flex";
    }
    function closeCart() {
      document.getElementById("cartModal").style.display = "none";
    }

    function openPaymentModal() {
      if (cart.length === 0) {
        alert("Keranjang belanja masih kosong!");
        return;
      }

      console.log("Open payment modal clicked", cart); // Debug
      document.getElementById("cartData").value = JSON.stringify(cart);
      document.getElementById("paymentTotal").innerText = "Total harga: Rp " + totalAmount.toLocaleString("id-ID");
      document.getElementById("paymentModal").style.display = "flex";
    }

    function closePaymentModal() {
      document.getElementById("paymentModal").style.display = "none";
    }

    document.getElementById("search").addEventListener("input", function() {
      const filter = this.value.toLowerCase().trim();
      document.querySelectorAll(".menu-item").forEach(item => {
        const text = item.innerText.toLowerCase();
        item.style.display = text.includes(filter) ? "block" : "none";
      });
    });

    function filterMenu(category, element) {
      document.querySelectorAll(".categories span").forEach(el => el.classList.remove("active"));
      element.classList.add("active");

      document.querySelectorAll(".menu-item").forEach(item => {
        if (category === "all" || item.getAttribute("data-category") === category) {
          item.style.display = "block";
        } else {
          item.style.display = "none";
        }
      });
    }
  </script>
</body>
</html>
