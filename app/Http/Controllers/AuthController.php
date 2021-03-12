<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function registerView()
    {
        return view('auth.public.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap'  =>  ['required', 'string', 'max:25'],
            'username'  =>  ['required', 'string', 'max:25'],
            'password'  =>  ['required', 'string', 'max:25', 'confirmed'],
            'telp'  =>  ['required', 'numeric', 'digits_between:10,15']
        ]);

        $data = $request->except('_token', 'password_confirmation');
        $data['password'] = bcrypt($data['password']);

        $user = Masyarakat::create($data);

        Auth::loginUsingId($user->id_user);

        return redirect()->route('lelang.index');
    }

    public function loginView()
    {
        return view('auth.public.login');
    }

    public function login(Request $request)
    {
        $valid = Auth::guard('masyarakat')->attempt($request->only(['username', 'password'], !empty($request->remember)));

        if (!$valid) return redirect()->back()->withErrors(['username' => 'Credentials not found !']);

        setcookie('API_TOKEN', auth()->user()->api_token);

        return redirect()->route('lelang.index');
    }
}
