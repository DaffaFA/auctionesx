<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Petugas;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', ['users' => Petugas::with('level')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', ['roles' => Level::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas'  =>  ['required', 'string', 'max:25'],
            'username'  =>  ['required', 'string', 'max:25', 'unique:tb_petugas'],
            'password'  =>  ['required', 'string', 'max:25', 'confirmed'],
            'id_level'  =>  ['required']
        ]);

        $data = $request->only(['nama_petugas', 'username', 'password']);

        $data['password'] = bcrypt($data['password']);

        Level::findOrFail($request->id_level)->petugas()->create($data);

        return redirect()->route('admin::user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.user.edit', ['petugas' => Petugas::findOrFail($id), 'roles' => Level::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_petugas'  =>  ['nullable', 'string', 'max:25'],
            'username'  =>  ['nullable', 'string', 'max:25', 'unique:tb_petugas'],
            'password'  =>  ['required', 'string', 'max:25', 'confirmed'],
            'id_level'  =>  ['nullable']
        ]);

        $data = $request->only(['nama_petugas', 'username', 'password']);

        Petugas::findOrFail($id)->update($data);

        return redirect()->route('admin::user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petugas::findOrFail($id)->delete();

        return redirect()->route('admin::user.index');
    }
}
