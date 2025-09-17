# TODO: Fix PesananController and Status Updates

## Completed Tasks
- [x] Updated PesananController to use 'done' instead of 'selesai' for status
- [x] Changed redirect to route('pesanan.show', $id) after marking as ready
- [x] Updated all view files to use 'cancelled' and 'done' instead of 'dibatalkan' and 'selesai'
- [x] Updated user notification view to filter by 'done' status
- [x] Updated JavaScript message in user menu to use 'done'
- [x] Updated user menu view to include sidebar using @include('layouts.user')
- [x] Added receipt modal functionality for transaction receipts

## Summary of Changes
- **Controller**: app/Http/Controllers/Admin/PesananController.php
  - Changed status from 'selesai' to 'done'
  - Changed redirect from back() to route('pesanan.show', $id)

- **Views Updated**:
  - resources/views/admin/pesanan/detail.blade.php
  - resources/views/admin/pesanan/pesanan.blade.php
  - resources/views/admin/transactions/show.blade.php
  - resources/views/admin/transactions/index.blade.php
  - resources/views/user/notifikasi.blade.php
  - resources/views/user/menu/index.blade.php

- **Status Values**:
  - Old: 'dibatalkan', 'selesai'
  - New: 'cancelled', 'done'

## New Features Added
- **Receipt Modal**: Added transaction receipt functionality in user menu
  - Shows order details, payment method, total price, and transaction time
  - Modal appears after successful payment confirmation
- **Payment Method Selection**: Added modal for selecting payment methods (QRIS, DANA, GoPay)
- **Sidebar Integration**: Integrated user sidebar layout using @include('layouts.user')

## Testing
- Test marking orders as ready from different views
- Verify redirect goes to detail page
- Check notifications show correctly for completed orders
- Test receipt modal functionality after payment
- Verify sidebar integration works properly
- Test payment method selection modal
