<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoldersController extends Controller
{
    public function index(Request $request){
        $query = $request->user()->folders();

        if ($request->has('parent_id')) {
            $query->where('parent_id', $request->parent_id);
        } else {
            $query->whereNull('parent_id');
        }

        $folders = $query->with(['parent'])->latest()->paginate(20);
        return view('pages.folders.index', compact('folders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:folders,id'
        ]);

        $path = $this->generatePath($request->parent_id, $request->name);

        $folder = auth()->user()->folders()->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'path' => $path
        ]);

        return redirect()->route('folders.show', $folder)
            ->with('success', 'Folder created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Folder $folder)
    {
        /* $this->authorize('view', $folder); */

        $files = $folder->files()->latest()->paginate(20);
        $subfolders = $folder->children()->latest()->paginate(20);

        return view('pages.folders.show', compact('folder', 'files', 'subfolders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Folder $folder)
    {
        //$this->authorize('update', $folder);

        $folders = auth()->user()->folders()
            ->where('id', '!=', $folder->id)
            ->get();

        return view('folders.edit', compact('folder', 'folders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Folder $folder)
    {
        //$this->authorize('update', $folder);

        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => [
                'nullable',
                'exists:folders,id',
                function ($attribute, $value, $fail) use ($folder) {
                    if ($value == $folder->id) {
                        $fail('Un dossier ne peut pas être son propre parent.');
                    }
                }
            ]
        ]);

        $path = $this->generatePath($request->parent_id, $request->name);

        $folder->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'path' => $path
        ]);

        return redirect()->route('folders.show', $folder);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Folder $folder)
    {
        //$this->authorize('delete', $folder);

        // Récursivement supprimer les fichiers et sous-dossiers
        foreach ($folder->files as $file) {
            Storage::disk('public')->delete($file->path);
            $file->delete();
        }

        $folder->delete();

        return redirect()->route('folders.index')
            ->with('success', 'Folder deleted successfully');
    }

    protected function generatePath($parentId, $name)
    {
        if (!$parentId) {
            return '/' . $name;
        }

        $parent = Folder::findOrFail($parentId);
        return $parent->path . '/' . $name;
    }
}
