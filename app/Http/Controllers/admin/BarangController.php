<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.barang.index', ['barangs' => Barang::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.barang.create');
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
            'nama_barang' =>  ['required', 'between:1,25'],
            'harga_awal' =>  ['required', 'digits_between:1,20'],
            'deskripsi_barang' =>  ['required', 'max:100']
        ]);

        Barang::create($request->all());

        return redirect()->route('admin::barang.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.barang.edit', ['barang' => Barang::findOrFail($id)]);
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
            'nama_barang' =>  ['required', 'between:1,25'],
            'harga_awal' =>  ['required', 'digits_between:1,20'],
            'deskripsi_barang' =>  ['required', 'max:100']
        ]);

        Barang::findOrFail($id)->update($request->all());

        return redirect()->route('admin::barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();

        return redirect()->route('admin::barang.index');
    }
}
