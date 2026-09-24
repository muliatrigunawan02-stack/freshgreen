<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans antialiased min-h-screen flex flex-col justify-center items-center px-4 py-8">

    <div class="mb-6 text-center">
        <a href="{{ route('home') }}" class="text-3xl font-extrabold text-emerald-600">🍃 FreshGreen</a>
        <p class="text-gray-500 text-sm mt-1">Buat akun baru untuk menikmati layanan FreshGreen</p>
    </div>

    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-emerald-100 p-8">
        
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                @if ($errors->has('name'))
                    <span class="text-red-500 text-xs mt-1 block">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                @if ($errors->has('email'))
                    <span class="text-red-500 text-xs mt-1 block">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                @if ($errors->has('password'))
                    <span class="text-red-500 text-xs mt-1 block">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
            </div>

            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 rounded-2xl transition shadow-lg shadow-emerald-600/20 text-sm mt-2">
                Daftar Sekarang
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-500">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-emerald-600 font-bold hover:underline">Masuk di Sini</a>
        </p>
    </div>

</body>
</html>