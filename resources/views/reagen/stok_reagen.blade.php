@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Data Reagen') }}</h1>

    <div class="row justify-content-center px-3">
        <div class="col-12 card shadow mb-4">
            <div class="card-header py-3 row">
                <h6 class="col m-0 font-weight-bold text-primary">Data Stock Reagen</h6>
                <a href="{{ route('stok_reagen.create') }}" class="col-2 btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Stok Awal</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                                <th>Stok Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($dataReagens->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data reagen.</td>
                                </tr>
                            @else
                                @foreach($dataReagens as $reagen)
                                    <tr>
                                        <td>{{ $reagen['kode'] }}</td>
                                        <td>{{ $reagen['nama'] }}</td>
                                        <td>{{ $reagen['stok_awal'] }}</td>
                                        <td>{{ $reagen['masuk'] }}</td>
                                        <td>{{ $reagen['keluar'] }}</td>
                                        <td>{{ $reagen['stok_akhir'] }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
