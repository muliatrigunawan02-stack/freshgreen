<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans antialiased min-h-screen flex flex-col justify-center items-center px-4">

    <div class="mb-6 text-center">
        <a href="{{ route('home') }}" class="text-3xl font-extrabold text-emerald-600">🍃 FreshGreen</a>
        <p class="text-gray-500 text-sm mt-1">Masuk untuk mulai belanja sayur & buah segar</p>
    </div>

    <div class="w-full max-w-md bg-white rounded-3xl shadow-xl border border-emerald-100 p-8">
        
        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-emerald-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition text-sm">
                @if ($errors->has('email'))
                    <span class="text-red-500 text-xs mt-1 block">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-3 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 focus:outline-none transition text-sm">
                @if ($errors->has('password'))
                    <span class="text-red-500 text-xs mt-1 block">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-600">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
                    <span class="ml-2">Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 rounded-2xl transition shadow-lg shadow-emerald-600/20 text-sm">
                Masuk Sekarang
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-500">
            Belum punya akun? 
            <a href="{{ route('register') }}" class="text-emerald-600 font-bold hover:underline">Daftar Akun Baru</a>
        </p>
    </div>

</body>
</html>