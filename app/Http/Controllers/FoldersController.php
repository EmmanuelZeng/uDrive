<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
