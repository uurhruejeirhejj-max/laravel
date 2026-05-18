@extends('layouts.app')

@section('title', 'Buat Proyek Baru')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold mb-6"> Proyek Baru</h2>
    
    <form action="/projects" method="POST" class="space-y-6 bg-white/10 p-8 rounded-2xl backdrop-blur-sm">
        @csrf
        
        <div>   
            <label class="block text-sm font-medium mb-2">Judul Proyek</label>
            <input type="text" name="title" value="{{ old('title') }}" 
                class="w-full px-4 py-3 rounded-lg bg-black/30 border border-white/20 focus:border-pink-500 focus:outline-none text-white"
                placeholder="Masukkan judul proyek...">
            @error('title')
                <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium mb-2">Deskripsi</label>
            <textarea name="description" rows="4" 
                class="w-full px-4 py-3 rounded-lg bg-black/30 border border-white/20 focus:border-pink-500 focus:outline-none text-white"
                placeholder="Ceritakan tentang proyek ini...">{{ old('description') }}</textarea>
            @error('description')
                <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium mb-2">Pembuat</label>
            <input type="text" name="creator" value="{{ old('creator') }}" 
                class="w-full px-4 py-3 rounded-lg bg-black/30 border border-white/20 focus:border-pink-500 focus:outline-none text-white"
                placeholder="Nama pembuat...">
            @error('creator')
                <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium mb-2">Status</label>
            <select name="status" class="w-full px-4 py-3 rounded-lg bg-black/30 border border-white/20 focus:border-pink-500 focus:outline-none text-white">
                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Dalam Proses</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-pink-500 to-purple-600 rounded-lg font-semibold hover:scale-105 transition transform">
                 Simpan Proyek
            </button>
            <a href="/projects" class="px-6 py-3 bg-gray-600 rounded-lg hover:bg-gray-500 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection