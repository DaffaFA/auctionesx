@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endpush

@section('content')
  @include('layouts.headers.admin', [
      'title' => 'Lelang',
      'newHref' => route('admin::lelang.create')
  ])
  <div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{ __('List Lelang') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="transportations-table" class="table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lelangs as $lelang)
                            <tr onclick="redirectToEdit('{{ route('admin::lelang.show', $lelang->id_barang) }}')" style="cursor: pointer">
                                <th>{{ $lelang->barang->nama_barang }}</th>
                                <th>
                                    @if(!empty($lelang->id_user))                                        
                                        <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status">Done</span>
                                        </span>
                                    @elseif($lelang->status == 'dibuka')
                                        <span class="badge badge-dot mr-4">
                                            <i class="bg-info"></i>
                                            <span class="status">Open</span>
                                        </span>
                                    @else 
                                        <span class="badge badge-dot mr-4">
                                            <i class="bg-warning"></i>
                                            <span class="status">Close</span>
                                        </span>
                                    @endif
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
    function redirectToEdit(url) {
        window.location.replace(url);
    }

    $(document).ready(function() {
        $('#transportations-table').DataTable();
    });
</script>
@endpush