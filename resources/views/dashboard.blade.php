<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans">

    <!-- Header Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-emerald-100">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-emerald-600">🍃 FreshGreen</a>
            
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="text-sm font-medium text-gray-600 hover:text-emerald-600">Mulai Belanja</a>
                <a href="{{ route('profile.edit') }}" class="text-sm font-semibold text-emerald-700 hover:underline">Profil Saya</a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-500 hover:underline">Keluar</button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-10">
        
        <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 p-8 mb-8">
            <h1 class="text-2xl md:text-3xl font-extrabold text-gray-900">Halo, {{ Auth::user()->name }}! 👋</h1>
            <p class="text-gray-500 text-sm mt-1">Selamat datang di Dashboard FreshGreen. Kelola belanjaan dan produk toko kamu di sini.</p>
        </div>

        <!-- Menu Dashboard -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl border border-emerald-100 shadow-sm">
                <span class="text-3xl mb-2 block">🛍️</span>
                <h3 class="font-bold text-gray-800 text-lg">Kelola Produk (Admin)</h3>
                <p class="text-gray-500 text-sm mt-1">Tambah, edit, atau hapus daftar produk toko.</p>
                <a href="{{ route('admin.products.index') }}" class="mt-4 inline-block text-emerald-600 font-bold text-sm hover:underline">Buka CRUD Produk →</a>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-emerald-100 shadow-sm">
                <span class="text-3xl mb-2 block">🛒</span>
                <h3 class="font-bold text-gray-800 text-lg">Keranjang Belanja</h3>
                <p class="text-gray-500 text-sm mt-1">Cek barang yang siap kamu beli.</p>
                <a href="{{ route('cart.index') }}" class="mt-4 inline-block text-emerald-600 font-bold text-sm hover:underline">Lihat Keranjang →</a>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-emerald-100 shadow-sm">
                <span class="text-3xl mb-2 block">👤</span>
                <h3 class="font-bold text-gray-800 text-lg">Pengaturan Profil</h3>
                <p class="text-gray-500 text-sm mt-1">Ubah nama, email, atau password akunmu.</p>
                <a href="{{ route('profile.edit') }}" class="mt-4 inline-block text-emerald-600 font-bold text-sm hover:underline">Edit Profil →</a>
            </div>
        </div>

    </main>

</body>
</html>