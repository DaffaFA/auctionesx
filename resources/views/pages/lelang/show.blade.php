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
                          <div class="col-sm-4">
                            <div class="card">
                              <img src="https://images.unsplash.com/photo-1481973946307-512988dde8b1?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=300&h=300&fit=crop" class="img-fluid" style="border-radius: calc(.375rem - 1px);" alt="">
                            </div>
                          </div>
                          <div class="col-sm-8">
                            <div id="offer-box" data-auction="{{ $lelang->id_lelang }}"></div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
@endsection
