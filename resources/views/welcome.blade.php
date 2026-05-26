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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Event 1: Jazz Night --}}
            <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">
                <div class="relative overflow-hidden aspect-[3/4]">
                    <img src="{{ asset('assets/concert.png') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Jazz Night 2024</h3>
                    <div class="flex justify-between items-center pt-4 border-t">
                        <span class="text-2xl font-black text-indigo-600">Rp 150rb</span>
                        <a href="#" class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">Detail</a>
                    </div>
                </div>
            </div>

            {{-- Event 2: Hackathon 2024 (Sesuai Assets) --}}
            <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">
                <div class="relative overflow-hidden aspect-[3/4]">
                    <img src="{{ asset('assets/hackathon.png') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Hackathon Nasional</h3>
                    <div class="flex justify-between items-center pt-4 border-t">
                        <span class="text-2xl font-black text-indigo-600">Gratis</span>
                        <a href="#" class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">Detail</a>
                    </div>
                </div>
            </div>

            {{-- Event 3: AI Workshop (Sesuai Assets) --}}
            <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden">
                <div class="relative overflow-hidden aspect-[3/4]">
                    <img src="{{ asset('assets/workshop.png') }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">AI Future Workshop</h3>
                    <div class="flex justify-between items-center pt-4 border-t">
                        <span class="text-2xl font-black text-indigo-600">Rp 50rb</span>
                        <a href="#" class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SOAL 4: Partner Section (Tampilan Publik) --}}
    <section class="bg-slate-50 py-24 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black text-slate-900">Partner Strategis</h2>
                <p class="text-slate-500 mt-3 text-lg">Dukungan penuh dari berbagai partner terpercaya kami.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-6 max-w-5xl mx-auto">
                @forelse($partners as $partner)
                    <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center justify-center group">
                        <div class="h-16 w-full flex items-center justify-center mb-4">
                            {{-- Memastikan link dari admin (baik lokal /assets/ maupun URL) terbaca --}}
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