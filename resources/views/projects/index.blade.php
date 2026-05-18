@extends('layouts.app')

@section('title', 'Daftar Proyek')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold"> Proyek Kreatif</h2>
    <a href="/projects/create" class="px-6 py-3 bg-green-500 rounded-full hover:bg-green-600 transition">
        + Proyek Baru
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($projects as $project)
    <div class="bg-white/10 rounded-2xl p-6 backdrop-blur-sm hover:scale-105 transition transform border border-white/20">
        <div class="flex justify-between items-start mb-4">
            <span class="px-3 py-1 rounded-full text-xs font-bold 
                {{ $project->status == 'selesai' ? 'bg-green-500/30 text-green-300' : 
                   ($project->status == 'proses' ? 'bg-yellow-500/30 text-yellow-300' : 'bg-gray-500/30 text-gray-300') }}">
                {{ ucfirst($project->status) }}
            </span>
            <span class="text-sm text-gray-400">{{ $project->created_at->format('d M Y') }}</span>
        </div>
        
        <h3 class="text-xl font-bold mb-2 text-pink-300">{{ $project->title }}</h3>
        <p class="text-gray-300 mb-4 line-clamp-3">{{ $project->description }}</p>
        
        <div class="flex justify-between items-center">
            <span class="text-sm text-cyan-300">👤 {{ $project->creator }}</span>
            <div class="space-x-2">
                <a href="/projects/{{ $project->id }}" class="text-blue-400 hover:text-blue-300">Lihat</a>
                <a href="/projects/{{ $project->id }}/edit" class="text-yellow-400 hover:text-yellow-300">Edit</a>
                <form action="/projects/{{ $project->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-12 text-gray-400">
        <div class="text-6xl mb-4">📭</div>
        <p>Belum ada proyek. Buat yang pertama!</p>
    </div>
    @endforelse
</div>

<div class="mt-8">
    {{ $projects->links() }}
</div>
@endsection