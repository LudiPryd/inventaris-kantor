<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris Kantor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('tracks.update', $track->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Cabang</label>
                                <input type="text" class="form-control @error('cabang') is-invalid @enderror" name="cabang" value="{{ old('cabang', $track->cabang) }}">
                            
                                @error('cabang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama Barang</label>
                                <select class="form-control @error('goods_id') is-invalid @enderror" name="goods_id">
                                    <option value="">Pilih Nama Barang</option>
                                    @foreach ($goods as $good)
                                        <option value="{{ $good->id }}" {{ $track->goods_id == $good->id ? 'selected' : '' }}>
                                            {{ $good->nama_barang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('goods_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Lantai</label>
                                <input type="text" class="form-control @error('lantai') is-invalid @enderror" name="lantai" value="{{ old('lantai', $track->lantai) }}">
                            
                                @error('lantai')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kondisi</label>
                                <select class="form-control @error('kondisi') is-invalid @enderror" name="kondisi">
                                    <option value="">Pilih Kondisi</option>
                                    <option value="baru" {{ old('kondisi', $track->kondisi) == 'baru' ? 'selected' : '' }}>Baru</option>
                                    <option value="bekas" {{ old('kondisi', $track->kondisi) == 'bekas' ? 'selected' : '' }}>Bekas</option>
                                    <option value="rusak" {{ old('kondisi', $track->kondisi) == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                </select>
                                @error('kondisi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Ruangan</label>
                                        <input type="text" class="form-control @error('ruangan') is-invalid @enderror" name="ruangan" value="{{ old('ruangan', $track->ruangan) }}" placeholder="Masukkan Harga Product">
                                    
                                        @error('ruangan')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Tanggal</label>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal', $track->tanggal) }}" placeholder="Masukkan Stock Product">
                                    
                                        @error('tanggal')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>