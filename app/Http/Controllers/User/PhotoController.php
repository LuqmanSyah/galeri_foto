<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::where('user_id', Auth::user()->id)->get();

        return view('pages.photos', compact('photos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_foto' => 'required|string',
            'deskripsi_foto' => 'required|string',
            'lokasi_file' => 'required|image|mimes:png,jpg'
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        if ($request->hasFile('lokasi_file')) {
            $image = $request->file('lokasi_file');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/photos'), $imageName);

            if ($request->oldImage) {
                $oldImagePath = public_path($request->oldImage);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            $validatedData['lokasi_file'] = 'image/photos/' . $imageName;
        }

        $photo = Photo::create($validatedData);

        if ($photo) {
            Alert::success('Berhasil!', 'Berhasil menambahkan foto');
            return back();
        } else {
            Alert::error('Gagal!', 'Gagal menambahkan foto');
            return back();
        }
    }

    public function show($id)
    {
        $photo = Photo::find($id);

        return view('pages.detail_photo', compact('photo'));
    }
}
