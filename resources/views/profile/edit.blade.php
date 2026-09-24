<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Saya - FreshGreen</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans antialiased min-h-screen">

    <!-- Header / Navbar -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-emerald-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-emerald-600">🍃 FreshGreen</a>
            
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="text-sm font-medium text-gray-600 hover:text-emerald-600">Ke Toko</a>
                <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-emerald-700 hover:underline">Dashboard</a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-500 hover:underline">Keluar</button>
                </form>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-10">
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900">Pengaturan Profil 👤</h1>
            <p class="text-gray-500 text-sm mt-1">Perbarui informasi akun dan keamanan kata sandi Anda di sini.</p>
        </div>

        @if (session('status') === 'profile-updated')
            <div class="mb-6 p-4 bg-emerald-100 border border-emerald-200 text-emerald-800 rounded-2xl text-sm font-semibold">
                ✅ Informasi profil berhasil diperbarui!
            </div>
        @elseif (session('status') === 'password-updated')
            <div class="mb-6 p-4 bg-emerald-100 border border-emerald-200 text-emerald-800 rounded-2xl text-sm font-semibold">
                ✅ Password berhasil diperbarui!
            </div>
        @endif

        <div class="space-y-8">
            <!-- Form Update Informasi Profil -->
            <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-1">Informasi Profil</h2>
                <p class="text-sm text-gray-500 mb-6">Perbarui nama lengkap dan alamat email akun Anda.</p>

                <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
                    @csrf
                    @method('patch')

                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus
                               class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                        @if ($errors->updateProfileInformation->has('name'))
                            <span class="text-red-500 text-xs mt-1 block">{{ $errors->updateProfileInformation->first('name') }}</span>
                        @endif
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Alamat Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                        @if ($errors->updateProfileInformation->has('email'))
                            <span class="text-red-500 text-xs mt-1 block">{{ $errors->updateProfileInformation->first('email') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-6 py-3 rounded-2xl transition shadow-md text-sm">
                        Simpan Perubahan
                    </button>
                </form>
            </div>

            <!-- Form Update Password -->
            <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-1">Perbarui Password</h2>
                <p class="text-sm text-gray-500 mb-6">Gunakan password yang panjang dan acak demi keamanan akun Anda.</p>

                <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                    @csrf
                    @method('put')

                    <div>
                        <label for="update_password_current_password" class="block text-sm font-bold text-gray-700 mb-1">Password Saat Ini</label>
                        <input id="update_password_current_password" name="current_password" type="password" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                        @if ($errors->updatePassword->has('current_password'))
                            <span class="text-red-500 text-xs mt-1 block">{{ $errors->updatePassword->first('current_password') }}</span>
                        @endif
                    </div>

                    <div>
                        <label for="update_password_password" class="block text-sm font-bold text-gray-700 mb-1">Password Baru</label>
                        <input id="update_password_password" name="password" type="password" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                        @if ($errors->updatePassword->has('password'))
                            <span class="text-red-500 text-xs mt-1 block">{{ $errors->updatePassword->first('password') }}</span>
                        @endif
                    </div>

                    <div>
                        <label for="update_password_password_confirmation" class="block text-sm font-bold text-gray-700 mb-1">Konfirmasi Password Baru</label>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password" required
                               class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                    </div>

                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-6 py-3 rounded-2xl transition shadow-md text-sm">
                        Update Password
                    </button>
                </form>
            </div>

            <!-- Hapus Akun -->
            <div class="bg-white rounded-3xl shadow-xl border border-red-100 p-8">
                <h2 class="text-xl font-bold text-red-600 mb-1">Hapus Akun</h2>
                <p class="text-sm text-gray-500 mb-6">Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen.</p>

                <form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini secara permanen?')">
                    @csrf
                    @method('delete')

                    <div class="mb-4">
                        <label for="delete_account_password" class="block text-sm font-bold text-gray-700 mb-1">Masukkan Password untuk Konfirmasi</label>
                        <input id="delete_account_password" name="password" type="password" required placeholder="Password Anda"
                               class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-red-500 focus:outline-none text-sm">
                        @if ($errors->userDeletion->has('password'))
                            <span class="text-red-500 text-xs mt-1 block">{{ $errors->userDeletion->first('password') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold px-6 py-3 rounded-2xl transition shadow-md text-sm">
                        Hapus Akun Permanen
                    </button>
                </form>
            </div>
        </div>
    </main>

</body>
</html>