<?php

namespace App\Http\Controllers;

use App\Events\NewOffer;
use App\Models\Lelang;
use App\Models\Penawaran;
use Illuminate\Http\Request;

class LelangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lelang = Lelang::with('barang')->where('status', 'dibuka')->get();

        return view('pages.lelang.index', ['lelangs' => $lelang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.lelang.show', ['lelang' => Lelang::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showApi($id)
    {
        $lelang = Lelang::findOrFail($id);
        $lelangArray = Lelang::findOrFail($id)->toArray();

        $lelangArray['penawaran'] = $lelang->penawaran()->orderBy('penawaran_harga', 'desc')->get();
        $lelangArray['barang'] = $lelang->barang;

        return response()->json(['lelang' => $lelangArray]);
    }

    public function offer(Request $request, $id)
    {
        $lelang = Lelang::findOrFail($id);

        $lelang->penawaran()->create([
            'id_user'   =>  $request->user()->id_user,
            'id_barang' =>  $lelang->barang->id_barang,
            'penawaran_harga' => $request->penawaran_harga,
        ]);

        $bid = $lelang->penawaran()->orderBy('penawaran_harga', 'desc')->first();

        $lelang->update([
            'id_user'       =>  $bid->id_user,
            'harga_akhir'   =>  $bid->penawaran_harga
        ]);

        broadcast(new NewOffer($lelang));
    }
}
