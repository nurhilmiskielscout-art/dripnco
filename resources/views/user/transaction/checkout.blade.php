<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Checkout - Drip&Co</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #fefefe; }
        h2 { text-align: center; }
        .checkout-container { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .item { display: flex; justify-content: space-between; margin: 10px 0; }
        .total { font-weight: bold; border-top: 1px solid #ccc; padding-top: 10px; margin-top: 10px; }
        button { background: #b87333; color: #fff; padding: 10px 20px; border: none; border-radius: 8px; cursor: pointer; font-size: 16px; width: 100%; }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h2>Checkout</h2>
        <div id="checkoutItems"></div>
        <div class="total" id="checkoutTotal"></div>
        <form id="checkoutForm" action="{{ route('user.transaction.store') }}" method="POST">
            @csrf
            <input type="hidden" name="cart" id="cartInput">
            <input type="hidden" name="payment_method" id="paymentMethodInput">
            <input type="hidden" name="total" id="totalInput">

            <button type="submit">Beli Sekarang</button>
        </form>
    </div>

  <script>
    const cart = JSON.parse(localStorage.getItem('checkoutCart') || '[]');
    const paymentMethod = localStorage.getItem('checkoutPaymentMethod');
    const total = localStorage.getItem('checkoutTotal');

    const checkoutItems = document.getElementById('checkoutItems');
    const checkoutTotal = document.getElementById('checkoutTotal');

    if (cart.length === 0) {
        checkoutItems.innerHTML = "<p>Keranjang kosong!</p>";
    } else {
        cart.forEach(item => {
            checkoutItems.innerHTML += `
                <div class="item">
                    <span>${item.name} x${item.qty}</span>
                    <span>Rp ${(item.price * item.qty).toLocaleString('id-ID')}</span>
                </div>
            `;
        });

        checkoutTotal.innerHTML = `Total: Rp ${parseInt(total).toLocaleString('id-ID')}`;
    }

    // Isi hidden input untuk dikirim ke controller
    document.getElementById('cartInput').value = JSON.stringify(cart);
    document.getElementById('paymentMethodInput').value = paymentMethod;
    document.getElementById('totalInput').value = total;
</script>

</body>
</html>
