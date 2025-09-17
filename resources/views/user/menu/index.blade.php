<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Menu & Stok Produk - Drip&Co</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #fff, #fdebd0);
    }
    .container {
      margin-left: 220px;
      padding: 20px;
    }
    /* Header */
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
    /* Kategori */
    .categories {
      margin: 20px 0;
      font-size: 16px;
      font-weight: bold;
    }
    .categories span {
      margin-right: 20px;
      cursor: pointer;
      color: #666;
    }
    .categories span.active {
      color: #b87333;
      border-bottom: 2px solid #b87333;
      padding-bottom: 5px;
    }
    /* Menu Grid */
    .menu-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
    }
    .menu-item {
      background: white;
      border-radius: 12px;
      padding: 10px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
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
      padding: 5px 10px;
      border-radius: 50%;
      cursor: pointer;
      font-size: 16px;
    }

    /* ===== Modal Global ===== */
    .modal {
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.4);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }
    .modal-content {
      background: #fffdf8;
      border-radius: 12px;
      padding: 15px 20px;
      width: 350px; /* ✅ Lebih kecil agar pas */
      max-height: 80%;
      overflow-y: auto;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    /* ===== Header Modal ===== */
    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-weight: bold;
      font-size: 16px;
      margin-bottom: 8px;
    }
    .close-btn {
      cursor: pointer;
      font-size: 20px;
      font-weight: bold;
      padding: 0 5px;
    }

    /* ===== Item di dalam keranjang ===== */
    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 8px 0;
      border-bottom: 1px solid #eee;
    }

    /* Gambar item lebih kecil */
    .cart-item img {
      width: 38px;
      height: 38px;
      border-radius: 6px;
      margin-right: 10px;
    }

    /* Nama produk dan harga di dalam 1 kolom */
    .cart-item span {
      flex: 1;
      font-size: 14px;
    }

    /* Kontrol tambah/kurang */
    .cart-controls {
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .cart-controls button {
      border: none;
      background: #b87333;
      color: white;
      padding: 2px 8px;
      border-radius: 50%;
      font-size: 14px;
      cursor: pointer;
    }

    /* Total harga */
    .total {
      font-weight: bold;
      font-size: 14px;
      margin-top: 10px;
      text-align: right;
    }

    /* Tombol checkout */
    .checkout-btn {
      margin-top: 12px;
      background: #b87333;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 8px;
      font-size: 15px;
      cursor: pointer;
      transition: background 0.2s ease;
    }
    .checkout-btn:hover {
      background: #a0622d;
    }

    /* Pesan peringatan tumbler */
    #cartModal p {
      font-size: 12px;
      color: #555;
      margin-top: 6px;
      text-align: center;
    }

    /* Modal Struk */
    .receipt-details {
      font-size: 14px;
      line-height: 1.6;
    }
    .receipt-details h3 {
      text-align: center;
      margin-bottom: 10px;
    }
    .receipt-items {
      border-top: 1px dashed #aaa;
      margin-top: 10px;
      padding-top: 10px;
    }
    .receipt-items div {
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px;
    }
    .receipt-total {
      font-weight: bold;
      border-top: 1px solid #000;
      padding-top: 10px;
      margin-top: 10px;
      display: flex;
      justify-content: space-between;
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
            <button
              onclick="addToCart({{ $menu->id }}, '{{ $menu->nama_produk }}', {{ $menu->harga }}, '{{ asset('storage/' . $menu->gambar) }}')">
              +
            </button>
          </div>
        @endforeach
      @endforeach
    </div>
  </div>

  <!-- Modal Keranjang -->
  <div class="modal" id="cartModal">
    <div class="modal-content">
      <div class="modal-header">
        <span>Pembelianmu</span>
        <span class="close-btn" onclick="closeCart()">×</span>
      </div>
      <div id="cartItems"></div>
      <p>"Wajib Bawa Tumbler! Jika tidak, beli tumbler di kasir."</p>
      <div class="total" id="totalPrice">Total harga: Rp 0</div>
      <button class="checkout-btn" onclick="openPaymentModal()">Pilih metode pembayaran</button>
    </div>
  </div>

  <!-- Modal Pembayaran -->
  <div class="modal" id="paymentModal">
    <div class="modal-content">
      <div class="modal-header">
        <span>Pilih Metode Pembayaran</span>
        <span class="close-btn" onclick="closePaymentModal()">×</span>
      </div>
      <label><input type="radio" name="payment" value="QRIS"> QRIS</label><br>
      <label><input type="radio" name="payment" value="DANA"> DANA</label><br>
      <label><input type="radio" name="payment" value="GoPay"> GoPay</label>
      <div class="payment-total" id="paymentTotal">Total: Rp 0</div>
      <button class="checkout-btn" onclick="confirmPayment()">Beli</button>
    </div>
  </div>

  <!-- Modal Notifikasi -->
  <div class="modal" id="notifModal">
    <div class="modal-content">
      <div class="modal-header">
        <span>Notifikasi</span>
        <span class="close-btn" onclick="closeNotif()">×</span>
      </div>
      <div id="notifList"></div>
    </div>
  </div>

  <script>
    let cart = [];
    let totalAmount = 0;

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
            <img src="${item.img}">
            <span>${item.name} <br> Rp ${item.price.toLocaleString("id-ID")}</span>
            <div class="cart-controls">
              <button onclick="changeQty(${index}, -1)">-</button>
              ${item.qty}
              <button onclick="changeQty(${index}, 1)">+</button>
            </div>
          </div>
        `;
      });

      document.getElementById("totalPrice").innerText = "Total harga: Rp " + totalAmount.toLocaleString("id-ID");
      document.getElementById("paymentTotal").innerText = "Total: Rp " + totalAmount.toLocaleString("id-ID");

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
      closeCart();
      document.getElementById("paymentModal").style.display = "flex";
    }
    function closePaymentModal() {
      document.getElementById("paymentModal").style.display = "none";
    }

    function confirmPayment() {
      const selected = document.querySelector('input[name="payment"]:checked');

      if (!selected) {
        alert('Pilih metode pembayaran terlebih dahulu!');
        return;
      }

      if (cart.length === 0) {
        alert('Keranjang belanja masih kosong!');
        return;
      }

      localStorage.setItem('checkoutCart', JSON.stringify(cart));
      localStorage.setItem('checkoutPaymentMethod', selected.value);
      localStorage.setItem('checkoutTotal', totalAmount);

      window.location.href = '/user/checkout';
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
        if (item.getAttribute("data-category") === category || category === "all") {
          item.style.display = "block";
        } else {
          item.style.display = "none";
        }
      });
    }
  </script>
</body>
</html>
