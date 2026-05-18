@extends('layouts.app')

@section('title', $project->title)

@section('content')
<div class="max-w-3xl mx-auto">
    <a href="/projects" class="text-gray-400 hover:text-white mb-4 inline-block">← Kembali</a>
    
    <div class="bg-white/10 rounded-2xl p-8 backdrop-blur-sm border border-white/20">
        <div class="flex justify-between items-start mb-6">
            <div>
                <span class="px-3 py-1 rounded-full text-xs font-bold 
                    {{ $project->status == 'selesai' ? 'bg-green-500/30 text-green-300' : 
                       ($project->status == 'proses' ? 'bg-yellow-500/30 text-yellow-300' : 'bg-gray-500/30 text-gray-300') }}">
                    {{ ucfirst($project->status) }}
                </span>
                <h1 class="text-4xl font-bold mt-4 text-pink-300">{{ $project->title }}</h1>
            </div>
            <span class="text-sm text-gray-400">{{ $project->created_at->format('d M Y H:i') }}</span>
        </div>
        
        <div class="prose prose-invert max-w-none mb-6">
            <p class="text-lg text-gray-300 leading-relaxed">{{ $project->description }}</p>
        </div>
        
        <div class="border-t border-white/20 pt-6 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-500 to-purple-500 flex items-center justify-center text-lg">
                    👤
                </div>
                <div>
                    <p class="font-semibold">{{ $project->creator }}</p>
                    <p class="text-sm text-gray-400">Pembuat Proyek</p>
                </div>
            </div>
            
            <div class="space-x-3">
                <a href="/projects/{{ $project->id }}/edit" class="px-4 py-2 bg-yellow-500/20 text-yellow-300 rounded-lg hover:bg-yellow-500/30 transition">
                     Edit
                </a>
                <form action="/projects/{{ $project->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500/20 text-red-300 rounded-lg hover:bg-red-500/30 transition" onclick="return confirm('Yakin hapus proyek ini?')">
                         Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection