<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Produk Segar - FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-gray-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Header Navbar -->
    <header class="bg-slate-900 text-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center space-x-2 text-emerald-400 font-bold text-xl tracking-wide">
                <span>FRESH-GREEN</span>
            </a>
            
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-emerald-400 transition">Home</a>
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-emerald-400 transition">About</a>
                <a href="{{ route('contact') }}" class="text-gray-300 hover:text-emerald-400 transition">Contact</a>
                <a href="{{ route('products.index') }}" class="text-emerald-400 font-semibold border-b-2 border-emerald-400 pb-1">Produk Segar</a>
            </nav>

            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                        Login Admin
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Content Halaman Produk Segar -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Katalog Produk Segar</h1>
            <p class="text-gray-500 text-sm mt-1">Daftar pasokan sayur dan buah-buahan berkualitas tinggi yang siap dipesan.</p>
        </div>

        <!-- Filter / Search Bar -->
        <div class="mb-8 flex flex-col sm:flex-row gap-4 items-center justify-between bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
            <input type="text" placeholder="Cari nama sayur atau buah..." class="w-full sm:w-80 px-4 py-2 rounded-lg border border-gray-300 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <div class="flex gap-2 w-full sm:w-auto">
                <button class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-emerald-700 transition w-full sm:w-auto">
                    Cari
                </button>
            </div>
        </div>

        <!-- Grid Produk -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            @forelse($products ?? [] as $product)
                <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between">
                    <div>
                        <!-- Wadah Gambar Produk -->
                        <div class="h-44 bg-slate-100 rounded-xl overflow-hidden flex items-center justify-center mb-4">
                            @if($product->image && file_exists(public_path($product->image)))
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            @elseif($product->image && file_exists(public_path(str_replace('images/', 'image/', $product->image))))
                                <img src="{{ asset(str_replace('images/', 'image/', $product->image)) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-slate-400 flex flex-col items-center">
                                    <svg class="w-10 h-10 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="text-xs">Foto Tidak Ada</span>
                                </div>
                            @endif
                        </div>

                        <h3 class="font-bold text-gray-800 text-base line-clamp-1">{{ $product->name }}</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $product->description ?? 'Stok Segar Hari Ini' }}</p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-emerald-600 font-extrabold text-base">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>

                        <!-- Tombol Beli / Checkout -->
                        <a href="{{ route('products.show', $product->slug) }}" 
                           class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs px-4 py-2 rounded-lg font-medium transition">
                            Beli
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-2xl border border-dashed border-gray-300">
                    <p class="text-gray-500 text-sm">Belum ada data produk yang tersedia.</p>
                </div>
            @endforelse

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} FreshGreen. All rights reserved.
    </footer>

</body>
</html>