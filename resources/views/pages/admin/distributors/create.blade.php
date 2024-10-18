@extends('layouts.admin.main')

@section('content')
<div class="container">
    <h1>Tambah Distributor</h1>

    <form action="{{ route('distributor.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_distributor">Nama Distributor</label>
            <input type="text" name="nama_distributor" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" name="kota" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" name="provinsi" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="text" name="kontak" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
