<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-gray-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Header Navbar -->
    <header class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 text-emerald-600 font-bold text-xl tracking-wide">
                <span>FreshGreen</span>
            </a>
            
            <div class="flex items-center space-x-4 text-sm font-medium">
                <a href="{{ route('cart.index') }}" class="flex items-center space-x-1 bg-emerald-50 text-emerald-600 px-3 py-1.5 rounded-lg border border-emerald-100 hover:bg-emerald-100 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                    </svg>
                    <span>Keranjang (0)</span>
                </a>
                <a href="{{ route('products.index') }}" class="text-gray-500 hover:text-emerald-600 transition">
                    &larr; Kembali
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        
        <!-- Card Detail Produk -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-100 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            
            <!-- Foto Produk -->
            <div class="bg-emerald-50/50 rounded-2xl overflow-hidden h-80 flex items-center justify-center p-4">
                @if($product->image && file_exists(public_path($product->image)))
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="max-h-full object-contain hover:scale-105 transition duration-300">
                @elseif($product->image && file_exists(public_path(str_replace('images/', 'image/', $product->image))))
                    <img src="{{ asset(str_replace('images/', 'image/', $product->image)) }}" alt="{{ $product->name }}" class="max-h-full object-contain hover:scale-105 transition duration-300">
                @else
                    <span class="text-7xl">🍎</span>
                @endif
            </div>

            <!-- Detail Info Produk -->
            <div class="flex flex-col justify-between h-full py-2">
                <div>
                    <span class="inline-block bg-emerald-100 text-emerald-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                        {{ $product->category->name ?? 'Buah Segar' }}
                    </span>

                    <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                    
                    <!-- Rating & Jumlah Ulasan singkat -->
                    <div class="flex items-center space-x-2 mt-2">
                        <div class="flex text-amber-400">
                            ★★★★★
                        </div>
                        <span class="text-xs text-gray-500 font-medium">(4.9 / 5.0 - 12 Ulasan)</span>
                    </div>

                    <div class="mt-4 flex items-baseline space-x-2">
                        <span class="text-3xl font-extrabold text-emerald-600">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                        <span class="text-gray-400 text-sm">/ kg</span>
                    </div>

                    <p class="text-gray-600 text-sm mt-4 leading-relaxed">
                        {{ $product->description ?? 'Produk segar pilihan yang dipanen langsung dan terjaga kualitas kebersihannya untuk konsumsi keluarga.' }}
                    </p>

                    <div class="mt-6 text-xs text-gray-500 font-medium">
                        Stok Tersedia: <span class="text-gray-800 font-bold">{{ $product->stock ?? 25 }} kg</span>
                    </div>
                </div>

                <!-- Tombol Action -->
                <div class="mt-8">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3.5 px-6 rounded-2xl shadow-sm transition flex items-center justify-center space-x-2">
                            <span>+ Tambah ke Keranjang</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Seksi Ulasan & Rating Produk -->
        <div class="mt-10 bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-slate-100">
            <div class="flex flex-col md:flex-row md:items-center justify-between border-b border-gray-100 pb-6 gap-4">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Ulasan Pembeli</h2>
                    <p class="text-gray-500 text-xs mt-1">Pengalaman pelanggan yang telah membeli produk ini.</p>
                </div>

                <!-- Ringkasan Nilai -->
                <div class="flex items-center space-x-4 bg-emerald-50/60 px-4 py-2.5 rounded-2xl">
                    <span class="text-3xl font-extrabold text-emerald-600">4.9</span>
                    <div>
                        <div class="flex text-amber-400 text-sm">★★★★★</div>
                        <span class="text-xs text-gray-500">Berdasarkan 12 ulasan</span>
                    </div>
                </div>
            </div>

            <!-- Daftar Ulasan Pelanggan -->
            <div class="mt-8 space-y-6">
                
                <!-- Item Ulasan 1 -->
                <div class="border-b border-gray-100 pb-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm">Budi Santoso</h4>
                            <div class="flex text-amber-400 text-xs mt-1">★★★★★</div>
                        </div>
                        <span class="text-xs text-gray-400">2 hari lalu</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">
                        Buahnya sangat segar dan Manis sekali! Pengiriman cepat dan dikemas sangat rapi dengan pembungkus jaring.
                    </p>
                </div>

                <!-- Item Ulasan 2 -->
                <div class="border-b border-gray-100 pb-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm">Siti Rahma</h4>
                            <div class="flex text-amber-400 text-xs mt-1">★★★★★</div>
                        </div>
                        <span class="text-xs text-gray-400">1 minggu lalu</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">
                        Kualitas produk sesuai ekspektasi. Apel tidak ada yang memar atau busuk. Nanti bakal langganan pesan di sini.
                    </p>
                </div>

            </div>

            <!-- Formulir Tambah Ulasan Baru -->
            <div class="mt-10 pt-6 border-t border-gray-100">
                <h3 class="font-bold text-gray-800 text-base mb-4">Tulis Ulasan Anda</h3>
                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <input type="text" placeholder="Nama Lengkap" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
                        <select class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 text-gray-600">
                            <option value="5">Rating: ★★★★★ (Sangat Puas)</option>
                            <option value="4">Rating: ★★★★☆ (Puas)</option>
                            <option value="3">Rating: ★★★☆☆ (Cukup)</option>
                            <option value="2">Rating: ★★☆☆☆ (Kurang)</option>
                            <option value="1">Rating: ★☆☆☆☆ (Buruk)</option>
                        </select>
                    </div>
                    <div>
                        <textarea rows="3" placeholder="Bagikan pengalaman Anda tentang kualitas dan kesegaran produk ini..." class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500"></textarea>
                    </div>
                    <button type="button" class="bg-slate-900 hover:bg-slate-800 text-white text-sm font-semibold px-6 py-2.5 rounded-xl transition">
                        Kirim Ulasan
                    </button>
                </form>
            </div>

        </div>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} FreshGreen. All rights reserved.
    </footer>

</body>
</html>