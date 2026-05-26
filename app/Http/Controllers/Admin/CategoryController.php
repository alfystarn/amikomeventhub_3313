<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // Menampilkan daftar kategori dengan Fitur Search (Soal 3)
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Menggunakan sintaks LIKE sesuai instruksi soal UTS
        $categories = Category::when($search, function($query) use ($search) {
            return $query->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    // Form Tambah (Sudah ada biasanya, pastikan saja)
    public function create()
    {
        return view('admin.categories.create');
    }

    // Simpan Kategori Baru
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    // Soal 1: Menampilkan Form Edit
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Soal 1: Memproses Update Nama Kategori
    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Nama Kategori berhasil diperbarui.');
    }

    // Soal 1: Fungsi Hapus Kategori
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Kategori telah dihapus.');
    }
}