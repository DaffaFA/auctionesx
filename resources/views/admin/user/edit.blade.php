@extends('layouts.app')

@section('content')
@include('layouts.headers.admin', [
'title' => 'Petugas',
])

<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      <div class="card bg-secondary shadow">
        <form
          action="{{ route('admin::user.update', $petugas->id_petugas) }}"
          method="POST"
        >
          @method('PATCH')
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <h3 class="col-sm-10 mb-0">{{ __('Petugas') }}</h3>
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
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  name="nama_petugas"
                  placeholder="Nama"
                  value="{{ $petugas->nama_petugas }}"
                  required
                >
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-6">
                <input
                  type="text"
                  class="form-control"
                  name="username"
                  value="{{ $petugas->username }}"
                  disabled
                  readonly
                  placeholder="Username"
                  required
                >
              </div>
              <div class="col-md-6">
                <select name="id_level" disabled class="form-control">
                  @foreach ($roles as $role)
                      <option value="{{ $role->id_level }}" {{ $role->level == $petugas->level->level ? 'selected' : '' }}>{{ ucfirst($role->level) }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-6">
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
              <div class="col-md-6">
                <input type="password" class="form-control" placeholder="Password Confirmation" name="password_confirmation">
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
      @foreach($errors->all() as $error)
        <script>
          console.log('{{$error}}')
        </script>
      @endforeach
@endpush
