@extends('layouts.app')

@push('css')
  <meta name="csrf_token" content="{{ csrf_token() }}">
@endpush

@section('content')
  @include('layouts.headers.admin', [
      'title' => 'Invoice',
  ])
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col">
        @if ($lelang->status == 'dibuka')
          <div id="auction-table" data-auction="{{ $lelang->id_lelang }}" data-close="{{ route('admin::lelang.close', $lelang->id_lelang) }}"></div>
        @else
        <div class="card shadow">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <h1 class="mb-5">{{ $lelang->user->nama_lengkap }}</h1>
              </div>
            </div>
            <div class="row">
              <div class="col-2 text-bold disabled">INVOICE</div>
              <div class="col-10">{{ $lelang->invoice->number }}</div>
            </div>
            <div class="row">
              <div class="col-2">DUE BY</div>
              <div class="col-10">{{ Carbon\Carbon::parse($lelang->invoice->due_date)->format('F j, Y. g:i a') }}</div>
            </div>
            <div class="table-responsive mt-5">
              <table class="table align-items-center">
                <thead class="thead-light">
                  <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>{{ $lelang->barang->nama_barang }}</th>
                    <th>{{ $lelang->harga_akhir }}</th>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
@endsection
