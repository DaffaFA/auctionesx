@extends('layouts.app')

@section('content')
  @include('layouts.headers.admin', [
    'title' => 'Barang',
  ])

<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow">
        <form action="{{ route('admin::barang.store') }}" method="POST">
          <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                  <h3 class="col-sm-10 mb-0">{{ __('Barang') }}</h3>
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
                <div class="col-md-6">
                  <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" required>
                </div>
                <div class="col-md-6">
                  <input type="number" class="form-control" name="harga_awal" placeholder="Harga Awal" required>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-12">
                  <textarea class="form-control" placeholder="Description" rows="3" name="deskripsi_barang" required></textarea>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-sm-12">
                  <span class="small">{{ __('Untuk menambahkan gambar, save barang, lalu tambahkan gambar di menu edit.') }}</span>
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
