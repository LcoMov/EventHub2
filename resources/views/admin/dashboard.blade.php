@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('page_title', 'Dashboard Ringkasan')
@section('page_subtitle', 'Pantau ringkasan statistik dan transaksi platform AmikomEventHub.')

@section('content')
<!-- Statistics Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-10">
    <!-- Stat Item: Revenue -->
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <p class="text-xs text-slate-400 font-bold uppercase">Total Pendapatan</p>
            <h4 class="text-lg font-black text-slate-800">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h4>
        </div>
    </div>

    <!-- Stat Item: Events -->
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div>
            <p class="text-xs text-slate-400 font-bold uppercase">Total Event</p>
            <h4 class="text-xl font-black text-slate-800">{{ $totalEvents }}</h4>
        </div>
    </div>

    <!-- Stat Item: Categories -->
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
        </div>
        <div>
            <p class="text-xs text-slate-400 font-bold uppercase">Total Kategori</p>
            <h4 class="text-xl font-black text-slate-800">{{ $totalCategories }}</h4>
        </div>
    </div>

    <!-- Stat Item: Partners -->
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <div>
            <p class="text-xs text-slate-400 font-bold uppercase">Total Partner</p>
            <h4 class="text-xl font-black text-slate-800">{{ $totalPartners }}</h4>
        </div>
    </div>

    <!-- Stat Item: Transactions -->
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
        </div>
        <div>
            <p class="text-xs text-slate-400 font-bold uppercase">Total Transaksi</p>
            <h4 class="text-xl font-black text-slate-800">{{ $totalTransactions }}</h4>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left: Recent Transactions Table -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-8 border-b">
                <h3 class="font-black text-xl">Transaksi Terbaru</h3>
                <p class="text-slate-500 text-sm font-medium">5 transaksi terakhir masuk ke sistem.</p>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                        <tr>
                            <th class="px-6 py-4">Order ID</th>
                            <th class="px-6 py-4">Event</th>
                            <th class="px-6 py-4">Customer</th>
                            <th class="px-6 py-4">Total</th>
                            <th class="px-6 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y border-t border-slate-50">
                        @forelse($recentTransactions as $tx)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-5 text-sm font-medium text-slate-700">#{{ $tx->order_id }}</td>
                            <td class="px-6 py-5 text-sm font-bold text-slate-800">{{ $tx->event->title ?? '-' }}</td>
                            <td class="px-6 py-5">
                                <p class="text-sm font-bold text-slate-800">{{ $tx->customer_name }}</p>
                                <p class="text-xs text-slate-400">{{ $tx->customer_email }}</p>
                            </td>
                            <td class="px-6 py-5 text-sm font-black text-indigo-600">Rp {{ number_format($tx->total_price, 0, ',', '.') }}</td>
                            <td class="px-6 py-5 text-center">
                                <span class="px-3 py-1 text-xs font-bold rounded-lg 
                                    @if(strtolower($tx->status) == 'success' || strtolower($tx->status) == 'settlement' || strtolower($tx->status) == 'capture') bg-emerald-50 text-emerald-600 
                                    @elseif(strtolower($tx->status) == 'pending') bg-amber-50 text-amber-600 
                                    @else bg-rose-50 text-rose-600 @endif">
                                    {{ $tx->status }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-slate-400 text-sm font-medium">Belum ada transaksi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right: Quick Navigation Actions -->
    <div class="lg:col-span-1">
        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm space-y-6">
            <h3 class="font-black text-xl">Menu Cepat</h3>
            <p class="text-slate-500 text-sm font-medium">Pintasan navigasi untuk mengelola data platform Anda.</p>
            
            <div class="space-y-3">
                <a href="{{ route('admin.events.create') }}" class="flex items-center justify-between p-4 bg-indigo-50 hover:bg-indigo-600 hover:text-white text-indigo-900 rounded-2xl transition group font-bold">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Event Baru
                    </span>
                    <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>

                <a href="{{ route('admin.categories.index') }}" class="flex items-center justify-between p-4 bg-amber-50 hover:bg-amber-600 hover:text-white text-amber-900 rounded-2xl transition group font-bold">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Kategori Baru
                    </span>
                    <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>

                <a href="{{ route('admin.partners.create') }}" class="flex items-center justify-between p-4 bg-rose-50 hover:bg-rose-600 hover:text-white text-rose-900 rounded-2xl transition group font-bold">
                    <span class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Partner Baru
                    </span>
                    <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection