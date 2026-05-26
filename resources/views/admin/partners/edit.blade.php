@extends('layouts.admin')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-3xl font-black mb-10">Edit Partner: {{ $partner->name }}</h1>
    
    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Penting: Laravel butuh ini untuk proses Update --}}
            
            <div class="mb-6">
                <label class="block text-sm font-bold text-slate-700 uppercase mb-2">Nama Partner</label>
                <input type="text" name="name" value="{{ $partner->name }}" 
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-indigo-500" required>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-bold text-slate-700 uppercase mb-2">Logo URL (Link Gambar)</label>
                <input type="url" name="logo_url" value="{{ $partner->logo_url }}" 
                       class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-indigo-500" required>
            </div>
            
            <div class="flex gap-3">
                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold">Simpan Perubahan</button>
                <a href="{{ route('admin.partners.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection