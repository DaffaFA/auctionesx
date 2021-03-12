@extends('layouts.app')

@section('content')
@include('layouts.headers.admin', [
'title' => 'Barang',
])

<form id="delete-form" action="{{ route('admin::barang.destroy', $barang->id_barang) }}" method="POST">
  @csrf
  @method('DELETE')
</form>

<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow">
        <form
          action="{{ route('admin::barang.update', $barang->id_barang) }}"
          method="POST"
        >
        @method('PATCH')
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <h3 class="col-sm-6 mb-0">{{ __('Barang') }}</h3>
              <div class="col-sm-6 text-right">
                <a class="btn btn-icon btn-secondary" href="#" onclick="event.preventDefault();document.getElementById('delete-form').submit()">
                  <span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span>
                  <span class="btn-inner--text">Delete</span>
                </a>
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
                <input
                  type="text"
                  class="form-control"
                  name="nama_barang"
                  placeholder="Nama Barang"
                  value="{{ $barang->nama_barang }}"
                  required
                >
              </div>
              <div class="col-md-6">
                <input
                  type="number"
                  class="form-control"
                  name="harga_awal"
                  placeholder="Harga Awal"
                  value="{{ $barang->harga_awal }}"
                  required
                >
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-12">
                <textarea
                  class="form-control"
                  placeholder="Description"
                  rows="3"
                  name="deskripsi_barang"
                  required
                >{{ $barang->deskripsi_barang }}</textarea>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-12">
                <input type="file" id="filepond">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
    <script>
      window.filepond.setOptions({
        server: 'api/barang/{{ $barang->id_barang }}/photo'
      });
      window.filepond.create(document.getElementById('filepond'));
    </script>
@endpush