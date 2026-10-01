<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - FreshGreen</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Header Navbar (Disamakan persis dengan halaman About & Home) -->
    <header class="bg-[#0f172a] text-white py-4 px-6 md:px-12 flex justify-between items-center shadow-md sticky top-0 z-50">
        <a href="{{ route('home') }}" class="text-xl font-extrabold tracking-wide text-emerald-400">
            FRESH-GREEN
        </a>
        
        <nav class="hidden md:flex space-x-6 text-sm font-medium">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'border-b-2 border-emerald-400 text-emerald-400 font-bold' : 'text-slate-300 hover:text-emerald-400' }}">
                Home
            </a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'border-b-2 border-emerald-400 text-emerald-400 font-bold' : 'text-slate-300 hover:text-emerald-400' }}">
                About
            </a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'border-b-2 border-emerald-400 text-emerald-400 font-bold' : 'text-slate-300 hover:text-emerald-400' }}">
                Contact
            </a>
            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'border-b-2 border-emerald-400 text-emerald-400 font-bold' : 'text-slate-300 hover:text-emerald-400' }}">
                Produk Segar
            </a>
        </nav>

        <div>
            @auth
                <a href="{{ route('dashboard') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-4 py-2 rounded-lg text-sm transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white font-semibold px-4 py-2 rounded-lg text-sm transition">
                    Login Admin
                </a>
            @endauth
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-4xl mx-auto px-4 py-12 w-full flex-grow">
        
        <!-- Section Header (Desain Serasi dengan Judul About) -->
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-3">
                Hubungi Tim FreshGreen
            </h1>
            <p class="text-slate-600 max-w-xl mx-auto text-sm md:text-base leading-relaxed">
                Punya pertanyaan seputar pengiriman sayur, buah, atau mau kerjasama petani? Kirimkan pesan Anda di bawah ini.
            </p>
        </div>

        <!-- Alert Notifikasi Sukses -->
        @if(session('success'))
            <div class="max-w-2xl mx-auto mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl font-medium text-sm flex items-center space-x-2 shadow-sm">
                <span>✅</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Card Form Kontak (Gaya Card Serasi dengan About) -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-10 max-w-2xl mx-auto">
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Masukkan nama lengkap Anda" 
                           class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" required placeholder="contoh@email.com" 
                           class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Pesan Anda</label>
                    <textarea name="message" rows="4" required placeholder="Tuliskan pertanyaan atau kebutuhan Anda di sini..." 
                              class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-emerald-500 text-sm transition"></textarea>
                </div>

                <button type="submit" 
                        class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-semibold py-3 rounded-lg transition shadow-md shadow-emerald-500/10 text-sm md:text-base">
                    Kirim Pesan Sekarang
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 py-6 text-center text-xs text-slate-500">
        &copy; {{ date('Y') }} FreshGreen. All rights reserved.
    </footer>

</body>
</html>