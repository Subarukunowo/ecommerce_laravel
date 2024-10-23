
@extends('layouts.admin.main')
@section('title', 'Detail Distributor')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Distributor</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.distributors.index') }}">Distributor</a></div>

                <div class="breadcrumb-item active">Detail Distributor</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>{{ $distributor->nama_distributor }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Kota:</strong> {{ $distributor->kota }}</p>
                <p><strong>Provinsi:</strong> {{ $distributor->provinsi }}</p>
                <p><strong>Kontak:</strong> {{ $distributor->kontak }}</p>
                <strong>Email:</strong>  <a href =
                 "malito:{{ $distributor->email }}"> {{ $distributor->email }}</a>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.distributors.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </section>
</div>
@endsection
