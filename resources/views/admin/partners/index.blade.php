@extends('layouts.admin')

@section('title', 'Manajemen Partner')
@section('page_title', 'Kelola Partner')
@section('page_subtitle', 'Pantau dan kelola partner yang terdaftar di platform.')

@section('content')
<div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
    <div class="p-8 border-b flex justify-between items-center bg-white sticky top-0 z-10">
        <div>
            <h3 class="font-black text-xl">Daftar Partner</h3>
            <p class="text-slate-500 text-sm font-medium">Total {{ $partners->count() }} partner terdaftar</p>
        </div>
        <a href="{{ route('admin.partners.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-bold transition flex items-center gap-2 shadow-lg shadow-indigo-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Partner
        </a>
    </div>

    <!-- Form Search -->
    <div class="px-8 py-4 bg-slate-50/50 border-b flex flex-col md:flex-row gap-4 items-center justify-between">
        <form action="{{ route('admin.partners.index') }}" method="GET" class="w-full md:w-80 flex items-center gap-2">
            <div class="relative w-full">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition text-sm font-medium text-slate-700" placeholder="Cari nama partner...">
            </div>
            @if(request('search'))
                <a href="{{ route('admin.partners.index') }}" class="text-xs font-bold text-slate-400 hover:text-indigo-600 transition">Reset</a>
            @endif
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4">ID</th>
                    <th class="px-8 py-4">Logo</th>
                    <th class="px-8 py-4">Nama Partner</th>
                    <th class="px-8 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t border-slate-50">
                @forelse($partners as $partner)
                <tr class="hover:bg-slate-50/50 transition group">
                    <td class="px-8 py-6">
                        <p class="text-xs text-slate-400 font-medium">#{{ str_pad($partner->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <div class="w-16 h-16 rounded-xl overflow-hidden bg-slate-100 border flex items-center justify-center">
                            @if($partner->logo_url)
                                <img src="{{ str_starts_with($partner->logo_url, 'http') ? $partner->logo_url : asset('storage/' . $partner->logo_url) }}" class="w-full h-full object-contain">
                            @else
                                <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            @endif
                        </div>
                    </td>
                    <td class="px-8 py-6">
                        <p class="font-bold text-slate-800 group-hover:text-indigo-600 transition">{{ $partner->name }}</p>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="p-2 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-600 hover:text-white transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </a>
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus partner ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-20">
                        <div class="max-w-xs mx-auto">
                            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            </div>
                            <p class="text-slate-500 font-bold">Belum ada partner</p>
                            <p class="text-slate-400 text-sm mb-6">Mulai tambahkan partner pertama Anda sekarang.</p>
                            <a href="{{ url('/admin/partners/create') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 rounded-xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">Tambah Partner</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection