@extends('layouts.admin')

@section('content')
<header class="flex justify-between items-center mb-10">
    <div>
        <h1 class="text-3xl font-black">Manajemen Kategori</h1>
        <p class="text-slate-500 font-medium">Kelola kategori event seperti Seminar, Konser, dan Workshop.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg hover:bg-indigo-700 transition">
        + Tambah Kategori
    </a>
</header>

{{-- Form Pencarian (Soal 3) --}}
<div class="mb-6">
    <form action="{{ route('admin.categories.index') }}" method="GET" class="flex gap-2">
        <input type="text" name="search" placeholder="Cari nama kategori..." 
               value="{{ request('search') }}"
               class="px-5 py-3 w-80 rounded-2xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 outline-none transition">
        <button type="submit" class="px-6 py-3 bg-slate-800 text-white rounded-2xl font-bold hover:bg-slate-900 transition">
            Cari
        </button>
        @if(request('search'))
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition">
                Reset
            </a>
        @endif
    </form>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4">No</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4">Dibuat Pada</th>
                    <th class="px-8 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse ($categories as $index => $category)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">{{ $index + 1 }}</td>
                    <td class="px-8 py-6 font-bold text-slate-800">{{ $category->name }}</td>
                    <td class="px-8 py-6 text-slate-600">{{ $category->created_at->format('d M Y') }}</td>
                    <td class="px-8 py-6">
                        <div class="flex justify-center gap-3">
                            {{-- Tombol Edit (Soal 1) --}}
                            <a href="{{ route('admin.categories.edit', $category->id) }}" 
                               class="px-4 py-2 bg-amber-100 text-amber-600 rounded-xl font-bold text-xs hover:bg-amber-200 transition">
                                Edit
                            </a>

                            {{-- Tombol Hapus (Soal 1) --}}
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-rose-100 text-rose-600 rounded-xl font-bold text-xs hover:bg-rose-200 transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-10 text-center text-slate-500 font-medium">
                        Tidak ada data kategori ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection