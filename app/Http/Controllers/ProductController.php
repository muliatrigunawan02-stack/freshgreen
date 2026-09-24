<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // ==========================================
    // TAMPILAN DEPAN / SISI PEMBELI (PUBLIC)
    // ==========================================

    // Halaman Utam / Landing Page Toko
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->latest()->get();

        return view('welcome', compact('categories', 'products'));
    }

    // Halaman Detail Produk
    public function show($slug)
    {
        $product = Product::with('category')->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    // ==========================================
    // TAMPILAN ADMIN (MANAJEMEN KELOLA PRODUK)
    // ==========================================

    // Halaman Tabel Kelola Produk Admin
    public function adminIndex()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    // Halaman Form Tambah Produk Baru
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Proses Simpan Produk Baru (Upload File Gambar)
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'unit'        => 'required|string|max:20',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Maksimal 2MB
            'description' => 'nullable|string',
        ]);

        $imagePath = null;

        // Cek jika ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $imagePath = 'images/' . $filename;
        }

        Product::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'unit'        => $request->unit,
            'image'       => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // Halaman Form Edit Produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Proses Update Produk (Upload File Gambar Baru)
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'unit'        => 'required|string|max:20',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Maksimal 2MB
            'description' => 'nullable|string',
        ]);

        $data = [
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'unit'        => $request->unit,
            'description' => $request->description,
        ];

        // Cek jika user mengunggah file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada di folder public/images/
            if ($product->image && File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            $file = $request->file('image');
            $filename = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);

            $data['image'] = 'images/' . $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // Proses Hapus Produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus file gambar dari server jika ada
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}