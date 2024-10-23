@extends('layouts.admin.main')
@section('title', 'Admin Distributor')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Distributor</h1>
            <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">
                        Dashboard</a></div>
                <div class="breadcrumb-item">Distributor</div>
            </div>
        </div>

        <a href="{{ route('distributor.create') }}" class="btn btn-icon btn-primary">
            <i class="fas fa-plus"></i> Distributor</a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Kontak</th>
                        <th>Email</th>
                        <th>Aksi</th>

                    </tr>
                    @php
                    $no = 0
                    @endphp
                    @forelse ($distributors as $item)
                    <tr>
                        <td>{{ $no += 1 }}</td>
                        <td>{{ $item->nama_distributor }}</td>

                        <td>{{ $item->kota }} </td>
                        <td>{{ $item->provinsi }} </td>
                        <td>{{ $item->kontak }} </td>
                        <td>{{ $item->email }} </td>
                        <td>
                        <a href="{{ route('distributor.detail', $item->id) }}" class="badge badge-info">Detail</a>
                        <a href="{{ route('distributor.edit', $item->id) }}" class="badge badge-warning">Edit</a>

<form action="{{ route('distributor.delete', $item->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="badge badge-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</button>
</td>

                    @empty
                    <td colspan="5" class="text-center">Data Produk Kosong</td>
                    @endforelse
                </table>
            </div>
        </div>
</div>
</div>
@endsection