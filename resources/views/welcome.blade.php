@extends('layouts.app')

@section('title', 'Beranda - KreatifKu')

@section('content')
<div class="text-center py-20">
    <h1 class="text-6xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-pink-400 via-purple-400 to-cyan-400 animate-pulse">
        Website Kreatif 
    </h1>
    <p class="text-xl text-gray-300 mb-8">Kelola proyek kreatif Anda dengan mudah</p>
    <a href="/projects" class="px-8 py-4 bg-gradient-to-r from-pink-500 to-purple-600 rounded-full text-lg font-semibold hover:scale-105 transition transform">
        Lihat Proyek 
    </a>
</div>


@endsection