@extends('layouts.admin')

@section('content')
<div class="max-w-2xl">
    <header class="mb-10">
        <h1 class="text-3xl font-black">Edit Kategori</h1>
        <p class="text-slate-500 font-medium">Ubah nama kategori sesuai kebutuhan aplikasi.</p>
    </header>

    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Penting untuk proses update --}}

            <div class="mb-6">
                <label for="name" class="block text-sm font-bold text-slate-700 uppercase mb-2">Nama Kategori</label>
                <input type="text" name="name" id="name" 
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition outline-none" 
                       value="{{ $category->name }}" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-4">
                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection