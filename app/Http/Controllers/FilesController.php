<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function index(Request $request, File $file)
    {
        // Obtenir l'utilisateur connecté
        $user = auth()->user();

        $users = User::where('id', '!=', $user->id)
                 ->where('role_id', '!=', 2)
                 ->get();

        // Construire la requête pour récupérer les fichiers créés ou partagés avec l'utilisateur
        $query = File::where('user_id', $user->id)
                 ->orWhereHas('sharedWith', function ($subQuery) use ($user) {
                     $subQuery->where('user_id', $user->id);
                 });

        // Appliquer le filtre par dossier si nécessaire
        if ($request->has('folder_id')) {
            $query->where('folder_id', $request->folder_id);
        } else {
            $query->whereNull('folder_id');
        }

        // Récupérer les fichiers paginés avec leurs dossiers associés
        $files = $query->with(['folder'])->latest()->paginate(20);

        // Récupérer les dossiers de l'utilisateur connecté
        $folders = $user->folders()->get();


        // Retourner les données à la vue
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
        return redirect()->back();
    }

    public function download(File $file)
    {
        return Storage::disk('public')->download(
            $file->path,
            $file->original_name
        );
    }

    public function share(Request $request, File $file)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        // Partager le fichier avec les utilisateurs sélectionnés
        $file->sharedWith()->syncWithoutDetaching($request->user_ids);

        return redirect()->route('files.index', $file);
    }

}
