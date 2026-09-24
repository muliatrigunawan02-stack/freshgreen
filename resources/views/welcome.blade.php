<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreshGreen - Belanja Sayur Segar</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans antialiased scroll-smooth">

    <!-- Navbar Atas (Dark Navigation Bar) -->
    <nav class="bg-[#1e232a] text-white py-3.5 px-6 md:px-12 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            
            <!-- Logo FreshGreen (Gambar JPG) -->
            <a href="{{ route('home') }}" class="flex items-center space-x-3 hover:opacity-90">
                <img src="{{ asset('images/FreshGreen.jpeg') }}" alt="FreshGreen Logo" class="w-8 h-8 rounded-full object-cover">
                <span class="text-emerald-500 font-extrabold tracking-wider text-lg">FRESH-GREEN</span>
            </a>

            <!-- Menu Navigasi & Tombol Login -->
            <div class="flex items-center space-x-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="text-gray-200 hover:text-white transition">Home</a>
                <a href="#about" class="text-gray-300 hover:text-white transition">About</a>
                <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition">Contact</a>
                <a href="#produk-segar" class="text-gray-300 hover:text-white transition">Produk Segar</a>
                
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-4 py-1.5 rounded-md transition text-xs">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-4 py-1.5 rounded-md transition text-xs">
                        Login Admin
                    </a>
                @endauth
            </div>

        </div>
    </nav>

    <!-- Hero Section -->
    <main class="min-h-[calc(100vh-80px)] flex flex-col justify-center items-center text-center px-4 py-16">
        
        <!-- Icon/Gambar Bulat di Tengah -->
        <div class="w-24 h-24 rounded-full overflow-hidden shadow-lg shadow-emerald-500/20 mb-8 border-2 border-emerald-500/20">
            <img src="{{ asset('images/FreshGreen.jpeg') }}" alt="FreshGreen Icon" class="w-full h-full object-cover">
        </div>

        <!-- Judul Utama -->
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight max-w-3xl mb-6">
            FreshGreen Belanja Sayur Segar
        </h1>

        <!-- Subtitle Singkat -->
        <p class="text-gray-500 text-base md:text-lg max-w-2xl font-normal leading-relaxed mb-8">
            Platform terintegrasi untuk mendata, memonitor, dan melacak informasi pasokan, harga, serta belanja sayuran dan buah-buahan segar secara praktis dan terstruktur.
        </p>

        <!-- Tombol Aksi -->
        <div class="flex flex-col sm:flex-row items-center space-y-3 sm:space-y-0 sm:space-x-4">
            <!-- Tombol Jelajahi Produk -->
            <a href="#produk-segar" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-medium px-6 py-3 rounded-lg shadow-md transition flex items-center justify-center space-x-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <span>Jelajahi Produk Segar</span>
            </a>

            <!-- Tombol Tentang Kami -->
            <a href="#about" class="w-full sm:w-auto border border-gray-300 hover:border-gray-400 text-gray-700 font-medium px-6 py-3 rounded-lg transition text-sm">
                Tentang Kami
            </a>
        </div>

    </main>

    <!-- Section About (Tentang Kami) -->
    <section id="about" class="bg-emerald-50/50 py-20 px-4 sm:px-6 lg:px-8 border-t border-emerald-100">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10">
                <span class="text-emerald-600 font-extrabold text-xs tracking-wider uppercase bg-emerald-100 px-3 py-1 rounded-full">Tentang FreshGreen</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-3">Solusi Praktis Bahan Makanan Segar</h2>
            </div>

            <!-- Teks Keterangan Tentang Kami -->
            <div class="bg-white p-8 md:p-10 rounded-3xl border border-emerald-100 shadow-sm space-y-6 text-gray-600 leading-relaxed text-base md:text-lg">
                <p>
                    <strong class="text-emerald-700 font-bold">Fresh Green</strong> adalah website belanja online yang menyediakan berbagai kebutuhan bahan makanan segar untuk kehidupan sehari-hari. Fresh Green hadir sebagai solusi praktis bagi masyarakat yang ingin membeli sayuran, buah-buahan, dan ikan segar dengan mudah tanpa harus datang langsung ke pasar atau toko.
                </p>
                <p>
                    Fresh Green berdomisili di wilayah <span class="font-semibold text-gray-800">Jalan Suryakencana, Pamulang Barat</span>, dan melayani kebutuhan masyarakat sekitar serta wilayah yang dapat dijangkau oleh layanan pengantaran. Dengan memanfaatkan teknologi digital, Fresh Green membantu pelanggan mendapatkan bahan makanan segar dengan cara yang lebih praktis, mudah, dan efisien.
                </p>
                <p>
                    Melalui website Fresh Green, pelanggan dapat menemukan berbagai pilihan produk dalam satu tempat.
                </p>
            </div>
        </div>
    </section>

    <!-- Section Katalog Produk Segar -->
    <section id="produk-segar" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 border-t border-gray-100">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">Katalog Produk Segar</h2>
            <p class="text-gray-500 mt-2 text-sm">Pilih produk berkualitas langsung dari mitra FreshGreen</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products ?? [] as $product)
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition">
                    <img src="{{ $product->image ?? 'https://images.unsplash.com/photo-1540420773420-3366772f4999?w=500' }}" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <span class="text-xs bg-emerald-100 text-emerald-800 font-bold px-2.5 py-0.5 rounded-full">
                            {{ $product->category->name ?? 'Segar' }}
                        </span>
                        <h3 class="font-bold text-gray-900 mt-2 text-lg">{{ $product->name }}</h3>
                        <p class="text-emerald-600 font-extrabold mt-1 text-base">
                            Rp {{ number_format($product->price, 0, ',', '.') }} <span class="text-xs text-gray-500 font-normal">/ {{ $product->unit }}</span>
                        </p>
                        <a href="{{ route('products.show', $product->slug ?? $product->id) }}" class="mt-4 block w-full text-center bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-bold py-2 rounded-xl text-xs transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-400">
                    Belum ada produk yang tersedia saat ini.
                </div>
            @endforelse
        </div>
    </section>

</body>
</html>