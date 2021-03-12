@extends('layouts.app')

@section('content')
  @include('layouts.headers.admin', [
      'title' => 'Lelang',
  ])
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col">
        <div id="auction-table" data-auction="{{ $lelang->id_lelang }}"></div>
      </div>
    </div>
  </div>
@endsection
