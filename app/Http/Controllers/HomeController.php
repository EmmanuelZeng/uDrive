<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){

        //*************************Récupérer l'ensemble de dossiers d'un utilisateur*********************///
        $query = $request->user()->folders();

        if ($request->has('parent_id')) {
            $query->where('parent_id', $request->parent_id);
        } else {
            $query->whereNull('parent_id');
        }
        $folders = $query->with(['parent'])->latest()->paginate(20);

        //*********************************Récupérer quelques fichiers importés par l'user**********/////
        $user = auth()->user();

        $users = User::where('id', '!=', $user->id)
                 ->where('role_id', '!=', 1)
                 ->get();

        // Construire la requête pour récupérer les fichiers créés ou partagés avec l'utilisateur
        $files = File::where('user_id', $user->id)
                 ->orWhereHas('sharedWith', function ($subQuery) use ($user) {
                     $subQuery->where('user_id', $user->id);
                 })->get();

        return view('pages.index', compact('folders', 'users', 'files'));
    }
}
