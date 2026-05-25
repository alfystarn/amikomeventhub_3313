@extends('layouts.admin')

@section('content')
    <header class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black">Dashboard Ringkasan</h1>
            <p class="text-slate-500 font-medium">Selamat datang kembali, Admin!</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="text-right hidden md:block">
                <p class="font-bold">Admin Super</p>
                <p class="text-xs text-slate-400">Penyelenggara Utama</p>
            </div>
            <div class="w-12 h-12 bg-white rounded-2xl shadow-sm border flex items-center justify-center p-1">
                <img src="https://ui-avatars.com/api/?name=Admin+Super&background=6366f1&color=fff" class="rounded-xl">
            </div>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <p class="text-slate-400 text-sm font-bold uppercase mb-1">Total Pendapatan</p>
            <h3 class="text-2xl font-black">Rp 12.450.000</h3>
        </div>
        </div>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b flex justify-between items-center">
            <h3 class="font-black text-xl">Transaksi Terakhir</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <tbody class="divide-y">
                    <tr class="hover:bg-slate-50">
                        <td class="px-8 py-6 font-bold uppercase tracking-wide text-sm">Donni Prabowo</td>
                        <td class="px-8 py-6 font-medium text-slate-600">Jazz Night 2024</td>
                        <td class="px-8 py-6"><span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-bold uppercase">Success</span></td>
                        <td class="px-8 py-6 font-black text-indigo-600">Rp 155.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection