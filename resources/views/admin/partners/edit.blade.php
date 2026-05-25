@extends('layouts.admin')

@section('title', 'Edit Partner')
@section('page_title', 'Edit Partner')
@section('page_subtitle', 'Sesuaikan informasi partner yang dipilih di bawah ini.')

@section('content')
<div class="max-w-2xl mx-auto">
    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
        @csrf
        @method('PUT')

        <div class="space-y-6 mb-8">
            <div>
                <label class="block mb-2 font-bold text-slate-700">Nama Partner</label>
                <input type="text" name="name" value="{{ old('name', $partner->name) }}" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition @error('name') border-rose-500 @enderror" placeholder="Contoh: Universitas Amikom Yogyakarta" required>
                @error('name')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-2 font-bold text-slate-700">Logo URL</label>
                <input type="text" name="logo_url" id="logo_url" value="{{ old('logo_url', $partner->logo_url) }}" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition @error('logo_url') border-rose-500 @enderror" placeholder="Contoh: https://placehold.co/200x200" required>
                <p class="text-slate-400 text-xs mt-1">Masukkan URL eksternal gambar logo partner (contoh: https://placehold.co/200x200).</p>
                @error('logo_url')
                    <p class="text-rose-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex items-center gap-4 p-4 bg-slate-50 rounded-2xl border">
                <div class="w-16 h-16 rounded-xl overflow-hidden bg-white border flex items-center justify-center">
                    <img id="logo_preview" src="{{ str_starts_with($partner->logo_url, 'http') ? $partner->logo_url : asset('storage/' . $partner->logo_url) }}" class="w-full h-full object-contain">
                </div>
                <div>
                    <h5 class="text-sm font-bold text-slate-700">Preview Logo Saat Ini</h5>
                    <p class="text-xs text-slate-400 font-medium">Bila mengubah logo URL, pastikan URL mengarah pada gambar yang valid.</p>
                </div>
            </div>
            
            <div>
                <label class="block mb-2 font-bold text-slate-700">Pilih Preset Logo URL (Opsional)</label>
                <select id="quick_logo" onchange="document.getElementById('logo_url').value = this.value; document.getElementById('logo_preview').src = this.value" class="w-full border border-slate-200 p-3 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition font-medium text-slate-600">
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
            <button type="submit" class="bg-indigo-600 text-white px-10 py-3 rounded-xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">Update Partner</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('logo_url').addEventListener('input', function(e) {
        document.getElementById('logo_preview').src = e.target.value;
    });
</script>
@endsection
