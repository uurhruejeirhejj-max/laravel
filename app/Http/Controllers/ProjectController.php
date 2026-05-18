<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Tampilkan semua proyek (READ)
    public function index()
    {
        $projects = Project::latest()->paginate(9);
        return view('projects.index', compact('projects'));
    }

    // Form tambah proyek (CREATE - View)
    public function create()
    {
        return view('projects.create');
    }

    // Simpan proyek baru (CREATE - Store)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'creator' => 'required|string|max:100',
            'status' => 'required|in:draft,proses,selesai'
        ]);

        Project::create($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Proyek berhasil dibuat! 🎉');
    }

    // Detail proyek (READ - Single)
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    // Form edit (UPDATE - View)
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Update proyek (UPDATE - Store)
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'creator' => 'required|string|max:100',
            'status' => 'required|in:draft,proses,selesai'
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')
            ->with('success', 'Proyek berhasil diperbarui! ✨');
    }

    // Hapus proyek (DELETE)
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')
            ->with('success', 'Proyek berhasil dihapus! 🗑️');
    }
}