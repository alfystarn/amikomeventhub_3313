@extends('layouts.admin')

@section('content')
<header class="flex justify-between items-center mb-10">
    <div>
        <h1 class="text-3xl font-black">Manajemen Kategori</h1>
        <p class="text-slate-500 font-medium">Kelola kategori event seperti Seminar, Konser, dan Workshop.</p>
    </div>
    <button class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg hover:bg-indigo-700 transition">
        + Tambah Kategori
    </button>
</header>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4">No</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4">Jumlah Event</th>
                    <th class="px-8 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">1</td>
                    <td class="px-8 py-6 font-bold text-slate-800">Seminar</td>
                    <td class="px-8 py-6 text-slate-600">12 Event</td>
                    <td class="px-8 py-6">
                        <div class="flex justify-center gap-3">
                            <button class="px-4 py-2 bg-amber-100 text-amber-600 rounded-xl font-bold text-xs hover:bg-amber-200 transition">Edit</button>
                            <button class="px-4 py-2 bg-rose-100 text-rose-600 rounded-xl font-bold text-xs hover:bg-rose-200 transition">Hapus</button>
                        </div>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">2</td>
                    <td class="px-8 py-6 font-bold text-slate-800">Konser</td>
                    <td class="px-8 py-6 text-slate-600">8 Event</td>
                    <td class="px-8 py-6 text-center">
                        <div class="flex justify-center gap-3">
                            <button class="px-4 py-2 bg-amber-100 text-amber-600 rounded-xl font-bold text-xs">Edit</button>
                            <button class="px-4 py-2 bg-rose-100 text-rose-600 rounded-xl font-bold text-xs">Hapus</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection