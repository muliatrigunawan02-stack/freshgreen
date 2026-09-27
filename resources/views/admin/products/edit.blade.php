<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit {{ $product->name }} - FreshGreen Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans">

    <main class="max-w-2xl mx-auto px-4 py-10">
        <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 p-8">
            <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Edit Produk: {{ $product->name }} ✏️</h1>

            <!-- WAJIB tambahkan enctype="multipart/form-data" -->
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Kategori</label>
                    <select name="category_id" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Nama Produk -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                </div>

                <!-- Harga, Stok, Satuan -->
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Stok</label>
                        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Satuan</label>
                        <input type="text" name="unit" value="{{ old('unit', $product->unit) }}" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none" required>
                    </div>
                </div>

                <!-- Upload Gambar File (Bukan URL Lagi) -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Upload Gambar Produk Baru (Opsional)</label>
                    <input type="file" name="image" accept="image/*" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 bg-gray-50 text-sm focus:ring-2 focus:ring-emerald-500 outline-none">
                    
                    @if($product->image)
                        <div class="mt-2 flex items-center space-x-3">
                            <span class="text-xs text-gray-500">Gambar Saat Ini:</span>
                            <img src="{{ asset($product->image) }}" class="w-12 h-12 object-cover rounded-lg border">
                        </div>
                    @endif
                </div>

                <!-- Deskripsi Produk -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi Produk</label>
                    <textarea name="description" rows="3" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-emerald-500 outline-none">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Tombol Simpan -->
                <div class="flex space-x-3 pt-3">
                    <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-xl transition">
                        Update Produk
                    </button>
                    <a href="{{ route('admin.products.index') }}" class="px-5 py-3 border border-gray-300 rounded-xl font-bold text-gray-600 hover:bg-gray-100 transition">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>