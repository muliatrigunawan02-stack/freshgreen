<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Produk - Admin FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans">

    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-emerald-100">
        <div class="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-emerald-600">🍃 FreshGreen Admin</a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-gray-600">Dashboard</a>
                <a href="{{ route('home') }}" class="text-sm font-semibold text-emerald-700">← Ke Toko</a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 py-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-900">Kelola Produk Segar 🥦</h1>
            <a href="{{ route('admin.products.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-5 py-2.5 rounded-2xl text-sm transition">
                + Tambah Produk Baru
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-100 border border-emerald-200 text-emerald-800 rounded-2xl text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-emerald-50 text-emerald-900 text-sm font-bold border-b border-emerald-100">
                        <th class="p-4">Gambar</th>
                        <th class="p-4">Nama Produk</th>
                        <th class="p-4">Kategori</th>
                        <th class="p-4">Harga</th>
                        <th class="p-4">Stok</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    @forelse($products as $product)
                        <tr class="hover:bg-emerald-50/30">
                            <!-- Tag Gambar Sudah Diperbaiki dengan asset() -->
                            <td class="p-4">
                                <img src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/80' }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-12 h-12 object-cover rounded-xl border shadow-sm">
                            </td>
                            <td class="p-4 font-bold text-gray-900">{{ $product->name }}</td>
                            <td class="p-4"><span class="bg-emerald-100 text-emerald-800 text-xs px-2.5 py-1 rounded-full font-semibold">{{ $product->category->name ?? 'Umum' }}</span></td>
                            <td class="p-4 font-extrabold text-emerald-600">Rp {{ number_format($product->price, 0, ',', '.') }} / {{ $product->unit }}</td>
                            <td class="p-4 font-bold">{{ $product->stock }}</td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white text-xs font-bold px-3 py-1.5 rounded-xl transition">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-xl transition">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-gray-500">Belum ada produk. Silakan tambah produk baru!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>