<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hubungi Kami - FreshGreen</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Header Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-emerald-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-emerald-600 flex items-center space-x-2">
                <span>🍃 FreshGreen</span>
            </a>
            <a href="{{ route('home') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-900 bg-emerald-50 px-4 py-2 rounded-full border border-emerald-200 transition">
                ← Kembali ke Toko
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-3xl mx-auto px-4 py-12 w-full">
        <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 p-8 md:p-12">
            
            <div class="text-center mb-8">
                <span class="text-4xl mb-2 inline-block">📞</span>
                <h1 class="text-3xl font-extrabold text-gray-900">Hubungi Tim FreshGreen</h1>
                <p class="text-gray-500 mt-2 text-sm md:text-base">Punya pertanyaan seputar pengiriman sayur, buah, atau mau kerjasama petani? Kirimkan pesan Anda di bawah ini.</p>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-100 border border-emerald-200 text-emerald-800 rounded-2xl font-medium text-sm flex items-center space-x-2">
                    <span>✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Masukkan nama lengkap Anda" 
                           class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Email</label>
                    <input type="email" name="email" required placeholder="contoh@email.com" 
                           class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Pesan Anda</label>
                    <textarea name="message" rows="4" required placeholder="Tuliskan pertanyaan atau kebutuhan Anda di sini..." 
                              class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition text-sm"></textarea>
                </div>

                <button type="submit" 
                        class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 rounded-2xl transition shadow-lg shadow-emerald-600/20 text-sm md:text-base">
                    Kirim Pesan Sekarang
                </button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-emerald-100 py-6 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} FreshGreen E-Commerce. All rights reserved.
    </footer>

</body>
</html>