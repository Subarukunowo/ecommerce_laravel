@extends('layouts.admin.main')

@section('title', 'Edit Flash Sale')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.flashsale') }}">Flash Sale</a></div>
                <div class="breadcrumb-item">Edit Flash Sale</div>
            </div>
        </div>

        <a href="{{ route('admin.flashsale') }}" class="btn btn-icon icon-left btn-warning">Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('flashsale.update', $flashsale->id) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate="">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="row">
                        <!-- Nama Produk -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="product_name">Nama Produk</label>
                                <input id="product_name" type="text" class="form-control" name="product_name" value="{{ $flashsale->product_name }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                        </div>

                        <!-- Harga Asli -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="original_price">Harga Asli</label>
                                <input id="original_price" type="number" class="form-control" name="original_price" value="{{ $flashsale->original_price }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                        </div>

                        <!-- Harga Diskon -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="discount_price">Harga Diskon</label>
                                <input id="discount_price" type="number" class="form-control" name="discount_price" value="{{ $flashsale->discount_price }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                        </div>

                        <!-- Stok -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stock">Stok Produk</label>
                                <input id="stock" type="number" class="form-control" name="stock" value="{{ $flashsale->stock }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                        </div>

                        <!-- Tanggal Mulai -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="start_time">Tanggal Mulai</label>
                                <input id="start_time" type="datetime-local" class="form-control" name="start_time" value="{{ \Carbon\Carbon::parse($flashsale->start_time)->format('Y-m-d\TH:i') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                        </div>

                        <!-- Tanggal Berakhir -->
                        <div class="col-6">
                            <div class="form-group">
                                <label for="end_time">Tanggal Berakhir</label>
                                <input id="end_time" type="datetime-local" class="form-control" name="end_time" value="{{ \Carbon\Carbon::parse($flashsale->end_time)->format('Y-m-d\TH:i') }}" required>
                                <div class="invalid-feedback">Kolom ini harus diisi!</div>
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="col-12">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" name="image" id="customFile" type="file">
                                    <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-icon icon-left btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
