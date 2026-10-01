<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreshGreen - Belanja Sayur Segar</title>
    <!-- Tailwind CSS CDN -->
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
                <a href="{{ route('home') }}" class="text-emerald-400 font-semibold border-b-2 border-emerald-400 pb-1">Home</a>
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-emerald-400 transition">About</a>
                <a href="{{ route('contact') }}" class="text-gray-300 hover:text-emerald-400 transition">Contact</a>
                <a href="{{ route('products.index') }}" class="text-gray-300 hover:text-emerald-400 transition">Produk Segar</a>
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

    <!-- Main Content Area -->
    <main class="flex-grow">
        
        <!-- HERO SECTION -->
        <section class="py-16 md:py-24 px-4 text-center">
            <div class="max-w-3xl mx-auto">
                <div class="w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <span class="text-4xl">🥦</span>
                </div>

                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 tracking-tight mb-4">
                    FreshGreen Belanja Sayur Segar
                </h1>
                
                <p class="text-base sm:text-lg text-gray-600 mb-8 max-w-2xl mx-auto leading-relaxed">
                    Platform terintegrasi untuk mendata, memonitor, dan melacak informasi pasokan, harga, serta belanja sayuran dan buah-buahan segar secara praktis dan terstruktur.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('products.index') }}" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition duration-200 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Jelajahi Produk Segar
                    </a>
                    <a href="{{ route('about') }}" class="w-full sm:w-auto bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold px-6 py-3 rounded-xl shadow-sm transition duration-200">
                        Tentang Kami
                    </a>
                </div>
            </div>
        </section>

        <!-- FITUR / LAYANAN PLATFORM (Pengganti Katalog Produk) -->
        <section class="py-16 bg-white border-t border-slate-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Fitur Layanan FreshGreen</h2>
                    <p class="text-gray-500 text-sm mt-2 max-w-xl mx-auto">
                        Sistem terpadu untuk memastikan ketersediaan dan transparansi informasi sayuran serta buah-buahan segar.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Fitur 1 -->
                    <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:border-emerald-200 transition">
                        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-5 text-2xl font-bold">
                            📊
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Monitoring Stok & Pasokan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Pendataan persediaan produk segar secara terstruktur dari berbagai sumber petani dan pemasok secara realtime.
                        </p>
                    </div>

                    <!-- Fitur 2 -->
                    <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:border-emerald-200 transition">
                        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-5 text-2xl font-bold">
                            🏷️
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Informasi Harga Transparan</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Akses riwayat dan pembaruan harga pasar sayur serta buah-buahan secara konsisten dan transparan.
                        </p>
                    </div>

                    <!-- Fitur 3 -->
                    <div class="p-8 bg-slate-50 rounded-2xl border border-slate-100 hover:border-emerald-200 transition">
                        <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-5 text-2xl font-bold">
                            🔍
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg mb-2">Pencarian Produk Mudah</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Navigasi katalog produk segar terpadu yang memudahkan konsumen mencari komoditas yang dibutuhkan.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} FreshGreen. All rights reserved.
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/62895384204539?text=Halo%20FreshGreen,%20saya%20ingin%20bertanya%20mengenai%20produk%20sayur" 
       target="_blank" 
       rel="noopener noreferrer" 
       class="fixed bottom-6 right-6 z-50 bg-emerald-500 hover:bg-emerald-600 text-white p-4 rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 group"
       title="Chat via WhatsApp">
        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.888 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
        </svg>
        <span class="absolute right-16 top-2 bg-gray-900 text-white text-xs px-3 py-1.5 rounded-md shadow-md opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
            Chat via WhatsApp
        </span>
    </a>

</body>
</html>