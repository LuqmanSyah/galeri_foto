<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'nis' => ['required', 'integer', 'exists:users,nis'],
            'password' => ['required', 'string']
        ]);

        $credentials = $request->only('nis', 'password');

        if (Auth::attempt($credentials)) {
            Alert::success('Login berhasil!');
            return redirect()->route('home');
        } else {
            Alert::error('Login gagal!');
            return back()->with('error', 'NIS atau Password salah');
        }
    }
}
