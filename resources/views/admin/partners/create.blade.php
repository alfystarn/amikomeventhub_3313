@extends('layouts.admin')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-3xl font-black mb-10">Tambah Partner Baru</h1>
    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.partners.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-sm font-bold text-slate-700 uppercase mb-2">Nama Partner</label>
                <input type="text" name="name" class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-indigo-500" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-slate-700 uppercase mb-2">Logo URL (Link Gambar)</label>
                <input type="text" name="logo_url" class="w-full px-4 py-3 rounded-xl border border-slate-200 outline-none focus:border-indigo-500" placeholder="https://..." required>
            </div>
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold">Simpan Partner</button>
        </form>
    </div>
</div>
@endsection