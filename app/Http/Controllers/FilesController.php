<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function index(Request $request){

        $query = $request->user()->files();
        $users = User::all();

        if ($request->has('folder_id')) {
            $query->where('folder_id', $request->folder_id);
        } else {
            $query->whereNull('folder_id');
        }

        $files = $query->with(['folder'])->latest()->paginate(20);
        $folders = auth()->user()->folders()->get();

        return view('pages.files.index', compact('files', 'folders', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|file',
            'folder_id' => 'nullable|exists:folders,id'
        ]);

        $uploadedFiles = [];
        foreach ($request->file('files') as $uploadedFile) {
            $path = $uploadedFile->store('files/' . auth()->id(), 'public');
            $size = $uploadedFile->getSize();

            $file = auth()->user()->files()->create([
                'name' => $uploadedFile->getClientOriginalName(),
                'original_name' => $uploadedFile->getClientOriginalName(),
                'mime_type' => $uploadedFile->getMimeType(),
                'size' => $size,
                'path' => $path,
                'folder_id' => $request->folder_id
            ]);
            $uploadedFiles[] = $file;
        }
        return redirect()->back();
    }

    public function destroy(File $file)
    {
        Storage::disk('public')->delete($file->path);
        $file->delete();
        return redirect()->route('files.index');
    }

    public function download(File $file)
    {
    return Storage::disk('public')->download(
        $file->path,
        $file->original_name
    );
    }
}
