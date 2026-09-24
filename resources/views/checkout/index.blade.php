<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans antialiased">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-emerald-600">🍃 FreshGreen</a>
            <a href="{{ route('cart.index') }}" class="text-sm font-medium text-emerald-700">← Kembali ke Keranjang</a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Form Pengiriman & Pembayaran 📦</h1>

        <div class="bg-white rounded-2xl shadow-sm border border-emerald-100 p-8">
            <form action="{{ route('checkout.process') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Alamat Lengkap Pengiriman</label>
                    <textarea name="address" rows="3" required placeholder="Jalan, Nomor Rumah, RT/RW, Kecamatan, Kota" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nomor WhatsApp / HP Active</label>
                    <input type="text" name="phone" required placeholder="081234567890" class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Metode Pembayaran</label>
                    <select name="payment_method" required class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                        <option value="COD">COD (Bayar di Tempat saat Sayur Datang)</option>
                        <option value="Transfer Bank">Transfer Bank / QRIS</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-xl transition shadow-md text-lg">
                    Konfirmasi & Buat Pesanan
                </button>
            </form>
        </div>
    </main>

</body>
</html>