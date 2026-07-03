@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto px-6 py-12">
    {{-- Tombol Kembali --}}
    <div class="mb-8">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Beranda
        </a>
    </div>

    {{-- Grid Konten Utama --}}
    <div class="flex flex-col lg:flex-row gap-12 items-start">
        
        {{-- SISI KIRI: Komponen Gambar Poster (Sesuai Panduan Modul Poin 5) --}}
        <div class="w-full lg:w-1/3 sticky top-6">
            <div class="relative">
                <img src="{{ ($event->poster_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($event->poster_path))
                             ? asset('storage/' . $event->poster_path)
                             : 'https://placehold.co/200x600' }}" 
                     alt="{{ $event->title }}" 
                     class="w-full rounded-[2.5rem] shadow-2xl border-8 border-white object-cover aspect-[3/4]">
                
                <div class="absolute top-6 left-6 px-4 py-1.5 bg-white/90 backdrop-blur-md rounded-full text-xs font-black uppercase text-indigo-600 tracking-wider shadow-sm">
                    {{ $event->category->name }}
                </div>
            </div>
        </div>

        {{-- SISI KANAN: Informasi Detail Acara (Dinamis dari Database) --}}
        <div class="flex-1 space-y-8 w-full">
            <div class="space-y-4">
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight">
                    {{ $event->title }}
                </h1>
                
                {{-- Badge Informasi Ringkas --}}
                <div class="flex flex-wrap gap-4 items-center text-sm text-slate-500 font-medium">
                    <div class="flex items-center gap-2 px-3 py-1.5 bg-slate-100 rounded-xl">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ \Carbon\Carbon::parse($event->date)->format('d M Y, H:i') }} WIB</span>
                    </div>

                    <div class="flex items-center gap-2 px-3 py-1.5 bg-slate-100 rounded-xl">
                        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>{{ $event->location }}</span>
                    </div>
                </div>
            </div>

            {{-- Komponen Deskripsi --}}
            <div class="bg-white rounded-[2rem] p-8 border border-slate-100 shadow-sm space-y-4">
                <h2 class="text-xl font-bold text-slate-800">Deskripsi Acara</h2>
                <div class="text-slate-600 leading-relaxed whitespace-pre-line">
                    {{ $event->description }}
                </div>
            </div>

            {{-- Panel Tiket & Checkout --}}
            <div class="bg-indigo-50/50 rounded-[2.5rem] p-8 border border-indigo-100/50 flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Harga Tiket</p>
                    <div class="flex items-baseline gap-2">
                        <span class="text-3xl font-black text-indigo-600">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                        <span class="text-xs text-slate-400 font-bold">/ pax</span>
                    </div>
                    <p class="text-xs text-slate-500 mt-2 font-semibold">
                        Sisa Stok: <span class="text-rose-500 font-bold">{{ $event->stock }} Tiket</span> lagi!
                    </p>
                </div>

                <div class="w-full md:w-auto">
                    @if($event->stock > 0)
                        {{-- LINK CHECKOUT SESUAI MODUL --}}
                        <a href="{{ url('checkout/'.$event->id) }}" class="block text-center px-8 py-4 bg-indigo-600 text-white font-bold rounded-2xl shadow-lg shadow-indigo-100 hover:bg-indigo-700 active:scale-95 transition-all duration-300 w-full md:w-64">
                            Pesan Sekarang
                        </a>
                    @else
                        <button disabled class="block text-center px-8 py-4 bg-slate-300 text-slate-500 font-bold rounded-2xl cursor-not-allowed w-full md:w-64">
                            Tiket Habis
                        </button>
                    @endif
                </div>
            </div>

        </div>
    </div>
</main>
@endsection