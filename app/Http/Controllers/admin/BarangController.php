<?php

namespace App\Http\Controllers\admin;

use App\Events\NewItem;
use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Photo;
use Illuminate\Http\Request;
use Image;
use Storage;

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

        $barang = Barang::create($request->except(['exit']));

        if ($request->exit != '1' ) return redirect()->route('admin::barang.edit', $barang->id_barang);

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
        return view('admin.barang.edit', ['barang' => Barang::findOrFail($id), 'images' => $this->photos($id)]);
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

        Barang::findOrFail($id)->update($request->except(['filepond']));

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

    public function photoStore(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'filepond' => ['mimes:jpg,png,jpeg'],
        ]);

        $path = $request->file('filepond')->storePublicly('public/images');

        $barang->photos()->create([
            'path' => $path
        ]);

        return response(['path' => $path]);
    }

    public function photos($id)
    {
        $barang = Barang::findOrFail($id);

        $arr = [];

        foreach ($barang->photos as $photo) {
            $exploded = explode('/', $photo->path);
            $arr[] = [
                'source' => $photo->path,
                'options' => [
                    'type' => 'local',
                    'file' => [
                        'name' => end($exploded),
                        'size' => Storage::size($photo->path),
                        'type' => Storage::mimeType($photo->path)
                    ],
                    'metadata' => [
                        'poster' => Storage::url($photo->path)
                    ]
                ]
            ];
        }

        return $arr;
    }

    public function deletePhoto(Request $request)
    {
        Photo::where('path', $request->image)->get()->first()->delete();
        Storage::delete($request->image);
        
        return response(['message' => 'file deleted']);
    }
}
