@extends('layouts.admin.main')

@section('content')
<div class="container">
    <h1>Edit Distributor</h1>

    <form action="{{ route('admin.distributors.update', $distributor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_distributor">Nama Distributor</label>
            <input type="text" name="nama_distributor" value="{{ $distributor->nama_distributor }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" name="kota" value="{{ $distributor->kota }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" name="provinsi" value="{{ $distributor->provinsi }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kontak">Kontak</label>
            <input type="text" name="kontak" value="{{ $distributor->kontak }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $distributor->email }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
