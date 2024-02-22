<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $photos = Photo::orderBy('id', 'desc')->get();

        return view('pages.home', compact('photos'));
    }
    
    public function profile()
    {
        return view('pages.profile');
    }

}
