@extends('adminlte::page')
@section('title', 'Tambah Level')
@section('content_header')
    <h1>Buat level baru</h1>
@stop
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Create Level
                    </div>
                    <div class="card-body">
                        <form action="{{ url('level/store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="level_kode">Level Kode</label>
                                <input type="text" name="level_kode" id="level_kode" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="level_nama">Level Nama</label>
                                <input type="text" name="level_nama" id="level_nama" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url('kategori') }}" class="btn btn-primary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection