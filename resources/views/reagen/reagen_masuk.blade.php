@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Recap Reagen Masuk') }}</h1>

    <div class="row justify-content-center px-3">

    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Reagen Masuk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reagenMasuk as $masuk)
                            <tr>
                                <td>{{ $masuk->created_at->format('d-m-Y') }}</td>
                                <td>{{ $masuk->reagen->kode }}</td>
                                <td>{{ $masuk->reagen->nama }}</td>
                                <td>{{ $masuk->jumlah }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data reagen masuk</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="form-group mt-3">
                <label for="entries">Show entries:</label>
                <select id="entries" name="entries" class="form-control" onchange="location = this.value;">
                    <option value="?entries=10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                    <option value="?entries=25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                    <option value="?entries=50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                    <option value="?entries=100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
        </div>
    </div>

    </div>

@endsection
