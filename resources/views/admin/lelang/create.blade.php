@extends('layouts.app')

@section('content')
  @include('layouts.headers.admin', [
    'title' => 'Lelang',
  ])

<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow">
        <form action="{{ route('admin::lelang.store') }}" method="POST">
          <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                  <h3 class="col-sm-10 mb-0">{{ __('Lelang') }}</h3>
                  <div class="col-sm-2 text-right">
                    <button class="btn btn-icon btn-success">
                      <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                      <span class="btn-inner--text">Save</span>
                    </button>
                  </div>
              </div>
          </div>
          <div class="card-body">
              @csrf
              <div class="row">
                <div class="col-md-10">
                  <div class="form-group">
                    <label for="" class="form-control-label">Barang</label>
                    <select name="id_barang" id="barang" class="form-control">
                      <option value="" disabled selected hidden>Pilih Barang</option>
                      @foreach ($barangs as $barang)
                      <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="form-control-label">Status</label>
                    <label class="custom-toggle d-block">
                      <input type="checkbox" checked name="status">
                      <span class="custom-toggle-slider rounded-circle" data-label-off="Open" data-label-on="Close"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection