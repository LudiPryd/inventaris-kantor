@extends('layouts.layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kelola Barang</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-3 font-weight-bold text-primary">DataTables Kelola Barang</h6>
            <a href="{{ route('tracks.create') }}" class="btn btn-md btn-success mb-2">Masukkan Kelola Barang baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Cabang</th>
                            <th>Nama Barang</th>
                            <th>Lantai</th>
                            <th>Ruangan</th>
                            <th>Tanggal</th>
                            <th>Kondisi</th>
                            <th scope="col" style="width: 25%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tracks as $track)
                        <tr>
                            <td>{{$track->cabang}}</td>
                            <td>{{$track->goods->nama_barang ?? 'tidak ada data'}}</td>
                            <td>{{$track->lantai}}</td>
                            <td>{{$track->ruangan}}</td>
                            <td>{{$track->tanggal}}</td>
                            <td>{{$track->kondisi}}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('tracks.destroy', $track->id) }}" method="POST">
                                    <a href="{{ route('tracks.edit', $track->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection