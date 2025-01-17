<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Models\Share;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SharedFilesController extends Controller
{
    public function index(Request $request, File $file){
        $user = auth()->user();
        $users = User::where('id', '!=', $user->id)
                 ->where('role_id', '!=', 2)
                 ->get();
        $folders = $user->folders()->get();
        //$files = Share::where('user_id', auth()->id())->with('file')->get();
        $files = File::where(function ($query) use ($user) {
            $query->whereHas('sharedWith', function ($subQuery) use ($user) {
                $subQuery->where('user_id', $user->id);
            });
        })
        ->where('user_id', '!=', $user->id)
        ->get();

        return view('pages.sharedFiles', compact('folders', 'files', 'users'));
    }

}
