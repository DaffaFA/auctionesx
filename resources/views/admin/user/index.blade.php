@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endpush

@section('content')
  @include('layouts.headers.admin', [
      'title' => 'Petugas',
      'newHref' => route('admin::user.create')
  ])
  <div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <h3 class="col-12 mb-0">{{ __('List Petugas') }}</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table id="transportations-table" class="table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Peran</th>
                                <th>Tanggal Pembuatan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if($user->id_petugas !== auth('petugas')->user()->id_petugas)
                                    <tr style="cursor: pointer">
                                        <th>{{ $user->nama_petugas }}</th>
                                        <th>{{ $user->username }}</th>
                                        <th>{{ ucfirst($user->level->level) }}</th>
                                        <th>{{ $user->created_at->format('F j, Y. g:i a') }}</th>
                                        <th class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('admin::user.edit', $user->id_petugas) }}">Edit</a>
                                                    <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('destroy-form-{{ $user->id_petugas }}').submit()">
                                                        <form class="hidden" id="destroy-form-{{ $user->id_petugas }}" action="{{ route('admin::user.destroy', $user->id_petugas) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        {{ __('Hapus') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </th>                            
                                    </tr>
                                @endif
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
    $(document).ready(function() {
        $('#transportations-table').DataTable({
            columnDefs: [
                { orderable: false, targets: 4 }
            ]
        });
    });
</script>
@endpush