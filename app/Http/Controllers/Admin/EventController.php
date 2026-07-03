<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // Menampilkan Daftar Event
    public function index()
    {
        $events = Event::with('category')->latest()->get();
        return view('admin.events.index', compact('events'));
    }

    // Menampilkan Form Tambah Event
    public function create()
    {
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }

    // Menyimpan Data Event Baru dengan Upload Gambar Poster
    public function store(Request $request)
    {
         $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'date'        => 'required|date',
            'location'    => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|numeric|min:1',
            'poster'      => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('poster')) {
            $data['poster_path'] = $request->file('poster')->store('posters', 'public');
        }
     
         Event::create($data);
         return redirect()->route('admin.events.index')->with('success', 'Data Event berhasil ditambahkan.');
    }

    /**
     * Menampilkan Form Edit
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    /**
     * UPDATE BERHASIL: Menyimpan Perubahan Data & Manajemen Penghapusan File Lama
     */
    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'date'        => 'required|date',
            'location'    => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|numeric|min:1',
            'poster'      => 'nullable|image|max:2048'
        ]); 

        if ($request->hasFile('poster')) {
            // Hapus gambar lama dari storage jika sebelumnya sudah memiliki poster
            if ($event->poster_path) {
                Storage::disk('public')->delete($event->poster_path);
            }
            // Upload gambar baru
            $data['poster_path'] = $request->file('poster')->store('posters', 'public');
        }

        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * PERUBAHAN DI SINI: Menghapus Event secara permanen dan menghapus gambar di storage
     */
    public function destroy(Event $event)
    {
        // TUGAS 9.5: Cek jika data event memiliki path poster di database
        if ($event->poster_path) {
            // Hapus file gambar fisik dari storage/app/public/posters
            Storage::disk('public')->delete($event->poster_path);
        }

        // Baru setelah itu hapus data di database
        $event->delete();
        
        return redirect()->route('admin.events.index')->with('success', 'Data event dan berkas poster berhasil dihapus secara permanen.');
    }

    public function transactions()
    {
        return view('admin.transactions');
    }
}