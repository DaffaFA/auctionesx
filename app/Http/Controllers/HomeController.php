<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        $orders = DB::table('tb_lelang')->get()->groupBy(function ($data) {
            return Carbon::parse($data->tgl_lelang)->format('M');
        })->map(function ($val) {
            return $val->count();
        });

        $sales = DB::table('tb_lelang')->get()->groupBy(function ($data) {
            return Carbon::parse($data->tgl_lelang)->format('M');
        })->map(function ($val) {
            $mapped = $val->reduce(function ($prev, $current) {
                return $prev?->harga_akhir + $current->harga_akhir;
            });
            return $mapped;
        }); 

        return view('dashboard', ['orders' => $orders], ['sales' => $sales]);
    }
}
