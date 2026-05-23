@extends('layouts.admin')

@section('title', 'Tambah Partner')
@section('page_title', 'Tambah Partner Baru')
@section('page_subtitle', 'Silakan isi formulir di bawah untuk mendaftarkan partner baru.')

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('admin.partners.store') }}" method="POST" class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
        @csrf

        <div class="space-y-6 mb-8">
            <div>
                <label class="block mb-2 font-bold text-slate-700">Nama Partner</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition @error('name') border-rose-500 @enderror" placeholder="Contoh: Universitas Amikom Yogyakarta" required>
                @error('name')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 font-bold text-slate-700">Logo URL</label>
                <input type="text" name="logo_url" id="logo_url" value="{{ old('logo_url') }}" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition @error('logo_url') border-rose-500 @enderror" placeholder="Contoh: https://placehold.co/200x200" required>
                <p class="text-slate-400 text-xs mt-1">Masukkan URL eksternal gambar logo partner (contoh: https://placehold.co/200x200).</p>
                @error('logo_url')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div>
                <label class="block mb-2 font-bold text-slate-700">Pilih Preset Logo URL (Opsional)</label>
                <select id="quick_logo" onchange="document.getElementById('logo_url').value = this.value" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition font-medium text-slate-600">
                    <option value="">-- Pilih Preset Logo URL --</option>
                    <option value="https://placehold.co/200x200?text=Amikom">Amikom Placeholder (https://placehold.co/200x200?text=Amikom)</option>
                    <option value="https://placehold.co/200x200?text=Partner+A">Partner A (https://placehold.co/200x200?text=Partner+A)</option>
                    <option value="https://placehold.co/200x200?text=Partner+B">Partner B (https://placehold.co/200x200?text=Partner+B)</option>
                    <option value="https://placehold.co/200x200?text=Sponsor+Premium">Sponsor Premium (https://placehold.co/200x200?text=Sponsor+Premium)</option>
                    <option value="https://placehold.co/200x200?text=Tech+Partner">Tech Partner (https://placehold.co/200x200?text=Tech+Partner)</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end gap-4 border-t pt-8">
            <a href="{{ route('admin.partners.index') }}" class="px-8 py-3 rounded-xl font-bold text-slate-500 hover:bg-slate-50 transition">Batal</a>
            <button type="submit" class="bg-indigo-600 text-white px-10 py-3 rounded-xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">Simpan Partner</button>
        </div>
    </form>
</div>
@endsection