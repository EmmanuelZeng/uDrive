<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SharedFilesController extends Controller
{
    public function index(){
        return view('pages.sharedFiles');
    }
}
