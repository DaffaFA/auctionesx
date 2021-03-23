<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <style>
          @page { margin: 0 }
          body { margin: 0 }
          html { margin: 0 }
        </style>
    </head>
    <body class="{{ $class ?? '' }}" style="background: #ffffff">
      <div class="main-content">
        <div class="container">
          <h1 class="display-1 mt-5">AUCTIONESX</h1>
          <div class="row">
            <div class="col">
              <h1>{{ $invoice->lelang->user->nama_lengkap }}</h1>
              <p class="lead m-0">DUE BY : <strong>{{ Carbon\Carbon::parse($invoice->due_date)->format('F j, Y. g:i a') }}</strong></p>
              <p class="lead m-0">INVOICE# : <strong>{{ $invoice->number }}</strong></p>
            </div>
            <div class="col text-right">
              <h3>{{ $invoice->lelang->petugas->nama_petugas }}</h3>
              <h3>Subang, Jawa Barat</h3>
              <h3>41281</h3>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="table-responsive">
            <table class="table align-items-center">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Produk</th>
                  <th>Harga Barang</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>1</th>
                  <th>{{ $invoice->lelang->barang->nama_barang }}</th>
                  <th>{{ $invoice->lelang->harga_akhir }}</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="container mt-5">
          <div class="row">
            <div class="col text-right">
              <p class="lead mb-1">Total Harga</p>
              <h1 class="display-4">Rp. {{ $invoice->lelang->harga_akhir }}</h1>
            </div>
          </div>
        </footer>
      </div>
    </body>
</html>