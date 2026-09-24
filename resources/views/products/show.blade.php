<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans antialiased">

    <!-- Header Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-emerald-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-emerald-600">🍃 FreshGreen</a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('cart.index') }}" class="bg-emerald-50 p-2 rounded-full text-emerald-700 font-bold text-sm px-3">
                    🛒 Keranjang ({{ count((array) session('cart')) }})
                </a>
                <a href="{{ route('home') }}" class="text-sm font-semibold text-emerald-700 hover:underline">← Kembali</a>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-10">
        <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 overflow-hidden p-6 md:p-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Gambar Produk (Sudah Diperbaiki) -->
            <div>
                <img src="{{ $product->image ? asset($product->image) : 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=500' }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-80 md:h-96 object-cover rounded-2xl shadow-inner">
            </div>

            <!-- Detail Produk & Harga -->
            <div class="flex flex-col justify-between">
                <div>
                    <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full uppercase">
                        {{ $product->category->name ?? 'Segar' }}
                    </span>
                    <h1 class="text-3xl font-extrabold text-gray-900 mt-3 mb-2">{{ $product->name }}</h1>
                    
                    <div class="flex items-baseline space-x-2 my-4">
                        <span class="text-3xl font-black text-emerald-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <span class="text-gray-500 font-medium">/ {{ $product->unit }}</span>
                    </div>

                    <p class="text-gray-600 leading-relaxed mb-6 text-sm md:text-base">
                        {{ $product->description ?? 'Produk sayur dan buah segar berkualitas tinggi dipetik langsung dari kebun mitra petani FreshGreen.' }}
                    </p>

                    <div class="border-t border-gray-100 pt-4 mb-6">
                        <p class="text-sm text-gray-500">Stok Tersedia: <span class="font-bold text-gray-800">{{ $product->stock }} {{ $product->unit }}</span></p>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 rounded-2xl transition shadow-lg shadow-emerald-600/20 text-center text-sm md:text-base">
                            + Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>
</html>