@extends('layouts.public')

@section('content')
    @include('users.partials.header',[
        'title' => 'Hola',
        'description' => 'Barang Lelang'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($lelangs as $lelang)
                            <div class="col-sm-3">
                                <div class="card">
                                    <img class="card-img-top" src="https://images.unsplash.com/photo-1481973946307-512988dde8b1?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=300&h=300&fit=crop">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $lelang->barang->nama_barang }}</h5>
                                        <p class="card-text">{{ $lelang->barang->deskripsi_barang }}</p>
                                        <div class="text-right">
                                            <a href="{{ route('lelang.show', $lelang->id_lelang) }}" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
@endsection