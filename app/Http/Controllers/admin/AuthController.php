<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->only('username', 'password');

        $auth = Auth::guard('petugas')->attempt($data, !empty($request->remember));

        if ( !$auth ) return redirect()->back()->withErrors(['username' => 'credentials not found']);

        $petugas = Petugas::where('username', $data['username'])->get()->first();

        Auth::guard('petugas')->setUser($petugas);

        return redirect()->route('admin::home');
    }

    public function logout()
    {
        Auth::guard('petugas')?->logout();
        Auth::guard('masyarakat')?->logout();

        setcookie('API_TOKEN', '');

        return redirect('/');
    }
}
