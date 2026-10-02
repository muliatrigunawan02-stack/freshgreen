<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        // Simpan logik ulasan ke database di sini

        return back()->with('success', 'Terima kasih! Ulasan Anda berhasil dikirim.');
    }
}