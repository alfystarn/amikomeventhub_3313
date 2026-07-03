@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1 space-y-8">
            <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">#1 Event Platform</span>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                Temukan & Pesan <span class="text-indigo-600">Tiket Event</span> Impianmu.
            </h1>
            <p class="text-lg text-slate-500 max-w-lg leading-relaxed">
                Dari konser musik hingga workshop teknologi, semua ada di genggamanmu.
            </p>
        </div>
        <div class="flex-1 relative">
            <img src="{{ asset('assets/concert.png') }}" alt="Concert" class="rounded-[2rem] shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center">
        </div>
    </section>

    {{-- Events Section --}}
    <section id="events" class="max-w-7xl mx-auto px-6 py-20">
        <div class="flex justify-between items-end mb-12">
            <h2 class="text-3xl font-extrabold mb-2">Event Terdekat</h2>
        </div>

        {{-- Komponen Filter Kategori --}}
        <div class="mb-12 flex flex-wrap gap-3 justify-center items-center">
            <a href="/" 
               class="px-5 py-2.5 rounded-full text-sm font-semibold tracking-wide transition-all duration-300 shadow-sm
                      {{ !request()->has('category') || request('category') == '' 
                          ? 'bg-indigo-600 text-white shadow-indigo-200 shadow-lg scale-105' 
                          : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
                Semua Kategori
            </a>
            
            @foreach($categories as $cat)
                <a href="/?category={{ $cat->slug }}" 
                   class="px-5 py-2.5 rounded-full text-sm font-semibold tracking-wide transition-all duration-300 shadow-sm
                          {{ request('category') == $cat->slug 
                              ? 'bg-indigo-600 text-white shadow-indigo-200 shadow-lg scale-105' 
                              : 'bg-white text-indigo-600 hover:bg-indigo-50 border border-slate-200' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
                <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">
                    <div class="relative overflow-hidden aspect-[3/4]">
                        
                        {{-- Menggunakan pengecekan Storage asli agar dinamis --}}
                        <img src="{{ ($event->poster_path && \Illuminate\Support\Facades\Storage::disk('public')->exists($event->poster_path))
                                     ? asset('storage/' . $event->poster_path)
                                     : 'https://placehold.co/200x600' }}" alt="{{ $event->title }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                        <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600">
                            {{ $event->category->name }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 group-hover:text-indigo-600 transition">{{ $event->title }}</h3>
                        <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($event->date)->format('d-m-Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between items-center pt-4 border-t">
                            <span class="text-2xl font-black text-indigo-600">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                            {{-- Link statis /event/1 diganti rute dinamis --}}
                            <a href="{{ route('events.show', $event->id) }}" class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Partner Section --}}
    <section class="bg-slate-50 py-24 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-900">Partner Strategis</h2>
                <p class="text-slate-500 mt-3 text-lg">Dukungan penuh dari berbagai partner terpercaya kami.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
                @forelse($partners ?? [] as $partner)
                    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center group">
                        <div class="h-16 w-full flex items-center justify-center mb-4">
                            <img src="{{ str_starts_with($partner->logo_url, 'http') ? $partner->logo_url : asset($partner->logo_url) }}" 
                                 alt="{{ $partner->name }}" 
                                 class="max-h-full max-w-full object-contain transition-all duration-500"
                                 onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($partner->name) }}&background=EEF2FF&color=4F46E5&bold=true';">
                        </div>
                        <span class="text-sm font-bold text-slate-600 group-hover:text-indigo-600 transition-colors duration-300 text-center">{{ $partner->name }}</span>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10">
                        <p class="text-slate-400 italic">Belum ada partner yang terdaftar.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection