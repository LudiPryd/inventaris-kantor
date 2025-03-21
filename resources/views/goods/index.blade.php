@extends('layouts.layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manajemen Barang</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-2">
            <h6 class="m-3 font-weight-bold text-primary">DataTables Barang</h6>
            <a href="{{ route('goods.create') }}" class="btn btn-md btn-success mb-2">Masukkan Barang</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">IMAGE</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Tanggal Pembelian</th>
                            <th scope="col" style="width: 25%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($goods as $item)                           
                        <tr>
                            <td class="text-center">
                                <img src="{{ asset('/storage/goods/'.$item->image) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{$item->nama_barang}}</td>
                            <td>{{$item->kategori}}</td>
                            <td>{{$item->tgl_pembelian}}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('goods.destroy', $item->id) }}" method="POST">
                                    <a href="{{ route('goods.show', $item->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('goods.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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

