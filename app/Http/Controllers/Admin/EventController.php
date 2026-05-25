<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    // Menampilkan Daftar Event
    public function index()
    {
        $events = Event::with('category')->latest()->get();
        return view('admin.events.index', compact('events'));
    }

    // Menampilkan Form Tambah Event (Poin 5.4.5)
    public function create()
    {
        // Mengambil semua data kategori untuk dropdown di form
        $categories = Category::all();
        
        return view('admin.events.create', compact('categories'));
    }

    // Menyimpan Data Event Baru (Poin 5.4.5)
    public function store(Request $request)
    {
        // 1. Menerapkan validasi data request dari pengguna
        $data = $request->validate([
            'category_id' => 'required',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'location'    => 'required|string|max:255',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

        // 2. Menyimpan data yang telah divalidasi ke database menggunakan Model
        Event::create($data);

        // 3. Kembali ke halaman index dengan pesan sukses
        return redirect()->route('admin.events.index')
                         ->with('success', 'Data Event berhasil ditambahkan.');
    }

    /**
     * 5.4.7. Implementasi Update - Menampilkan Form Edit
     * Menampilkan form berisi data lama untuk diubah.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * 5.4.7. Implementasi Update - Menyimpan Perubahan
     * Menyimpan hasil pembaruan data ke database.
     */
    public function update(Request $request, Event $event)
    {
        // Validasi data yang masuk
        $data = $request->validate([
            'category_id' => 'required',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'date'        => 'required|date',
            'location'    => 'required|string|max:255',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric'
        ]);

        // Memperbarui data event di database
        $event->update($data);

        return redirect()->route('admin.events.index')
                         ->with('success', 'Rincian data event berhasil diperbarui.');
    }

    /**
     * 5.4.6. Implementasi Delete - Menghapus Event
     * Operasi penghapusan data secara permanen menggunakan Directive metode DELETE.
     */
    public function destroy(Event $event)
    {
        // Menghapus data event
        $event->delete();

        // Redirect kembali ke index dengan pesan sukses sesuai modul
        return redirect()->route('admin.events.index')
                         ->with('success', 'Data event berhasil dihapus secara permanen.');
    }

    public function transactions()
    {
        // Memanggil view yang ada di resources/views/admin/transactions/index.blade.php
        return view('admin.transactions');
    }
}