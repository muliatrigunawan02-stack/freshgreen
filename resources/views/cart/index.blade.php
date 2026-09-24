<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keranjang Belanja - FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans antialiased">

    <!-- Header Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-emerald-600">🍃 FreshGreen</a>
            <a href="{{ route('home') }}" class="text-sm font-medium text-emerald-700">← Lanjut Belanja</a>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-extrabold text-gray-900 mb-6">Keranjang Belanja 🛒</h1>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-100 text-emerald-800 rounded-xl font-medium text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(!empty($cart) && count($cart) > 0)
            <div class="bg-white rounded-2xl shadow-sm border border-emerald-100 overflow-hidden p-6 mb-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-gray-200 text-gray-500 text-sm">
                            <th class="pb-3">Produk</th>
                            <th class="pb-3">Harga</th>
                            <th class="pb-3">Jumlah</th>
                            <th class="pb-3">Subtotal</th>
                            <th class="pb-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $details)
                            @php 
                                $subtotal = $details['price'] * $details['quantity']; 
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td class="py-4 flex items-center space-x-3">
                                    <img src="{{ $details['image'] ?? 'https://via.placeholder.com/100' }}" class="w-12 h-12 rounded-lg object-cover">
                                    <span class="font-bold text-gray-800">{{ $details['name'] }}</span>
                                </td>
                                <td class="py-4">Rp {{ number_format($details['price'], 0, ',', '.') }} / {{ $details['unit'] }}</td>
                                <td class="py-4 font-bold">{{ $details['quantity'] }}</td>
                                <td class="py-4 font-extrabold text-emerald-600">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td class="py-4">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-semibold">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-emerald-100 flex items-center justify-between">
                <div>
                    <span class="text-gray-500 text-sm">Total Pembayaran:</span>
                    <h2 class="text-3xl font-black text-emerald-600">Rp {{ number_format($total, 0, ',', '.') }}</h2>
                </div>
                <a href="{{ route('checkout.index') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-8 py-3 rounded-xl transition shadow-md">
                    Lanjut ke Checkout →
                </a>
            </div>
        @else
            <div class="bg-white p-12 rounded-2xl border border-emerald-100 text-center">
                <p class="text-gray-500 mb-4">Keranjang belanjaanmu masih kosong blay!</p>
                <a href="{{ route('home') }}" class="inline-block bg-emerald-600 text-white font-bold px-6 py-2.5 rounded-xl">Mulai Belanja</a>
            </div>
        @endif
    </main>

</body>
</html>