@extends('layouts.app')

@section('title', 'Edit Proyek')

@section('content')
<div class="max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold mb-6"> Edit Proyek</h2>
    
    <form action="/projects/{{ $project->id }}" method="POST" class="space-y-6 bg-white/10 p-8 rounded-2xl backdrop-blur-sm">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium mb-2">Judul Proyek</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" 
                class="w-full px-4 py-3 rounded-lg bg-black/30 border border-white/20 focus:border-pink-500 focus:outline-none text-white">
            @error('title')
                <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium mb-2">Deskripsi</label>
            <textarea name="description" rows="4" 
                class="w-full px-4 py-3 rounded-lg bg-black/30 border border-white/20 focus:border-pink-500 focus:outline-none text-white">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium mb-2">Pembuat</label>
            <input type="text" name="creator" value="{{ old('creator', $project->creator) }}" 
                class="w-full px-4 py-3 rounded-lg bg-black/30 border border-white/20 focus:border-pink-500 focus:outline-none text-white">
            @error('creator')
                <p class="mt-1 text-red-400 text-sm">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium mb-2">Status</label>
            <select name="status" class="w-full px-4 py-3 rounded-lg bg-black/30 border border-white/20 focus:border-pink-500 focus:outline-none text-white">
                <option value="draft" {{ old('status', $project->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="proses" {{ old('status', $project->status) == 'proses' ? 'selected' : '' }}>Dalam Proses</option>
                <option value="selesai" {{ old('status', $project->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-yellow-500 to-orange-600 rounded-lg font-semibold hover:scale-105 transition transform">
                🔄 Update Proyek
            </button>
            <a href="/projects" class="px-6 py-3 bg-gray-600 rounded-lg hover:bg-gray-500 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection