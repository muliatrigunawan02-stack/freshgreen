<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Produk - Admin FreshGreen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-emerald-50/50 text-gray-800 font-sans">

    <main class="max-w-2xl mx-auto px-4 py-12">
        <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 p-8">
            <h1 class="text-2xl font-extrabold text-gray-900 mb-6">Edit Produk: {{ $product->name }} ✏️</h1>

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Kategori</label>
                    <select name="category_id" required class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Nama Produk</label>
                    <input type="text" name="name" value="{{ $product->name }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Harga (Rp)</label>
                        <input type="number" name="price" value="{{ $product->price }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Stok</label>
                        <input type="number" name="stock" value="{{ $product->stock }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Satuan</label>
                        <input type="text" name="unit" value="{{ $product->unit }}" required class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">URL Gambar Produk</label>
                    <input type="url" name="image" value="{{ $product->image }}" class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi Produk</label>
                    <textarea name="description" rows="3" class="w-full px-4 py-2.5 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-emerald-500 focus:outline-none text-sm">{{ $product->description }}</textarea>
                </div>

                <div class="flex space-x-3 pt-4">
                    <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 rounded-2xl transition shadow-md text-sm">Update Produk</button>
                    <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-gray-200 rounded-2xl text-gray-600 hover:bg-gray-50 text-sm font-semibold">Batal</a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>-