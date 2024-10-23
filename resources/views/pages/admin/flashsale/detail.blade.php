@extends('layouts.admin.main')  <!-- Memastikan halaman ini memperluas layout utama -->

@section('title', 'Admin Detail Flash Sale')  <!-- Bagian untuk judul halaman -->

@section('content')  <!-- Mulai bagian konten -->

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Flash Sale</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.flashsale') }}">Flash Sale</a></div>
                <div class="breadcrumb-item">Detail Flash Sale</div>
            </div>
        </div>

        <a href="{{ route('admin.flashsale') }}" class="btn btn-icon icon-left btn-warning">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>

        <div class="row mt-4">
            <div class="col-lg-6">
                @if($flashsale)
                    <img src="{{ asset('images/' . $flashsale->image) }}" class="img-fluid" alt="{{ $flashsale->product_name }}">
                @else
                    <p>Produk tidak ditemukan.</p>
                @endif
            </div>
            <div class="col-lg-6">
                @if($flashsale)
                    <h2>{{ $flashsale->product_name }}</h2>
                    <p><strike>Rp{{ number_format($flashsale->original_price, 2) }}</strike></p>
                    <p>Rp{{ number_format($flashsale->discount_price, 2) }}</p>
                    <p>Diskon: {{ round($flashsale->discount_percentage) }}%</p>
                    <p>Sisa waktu: {{ \Carbon\Carbon::parse($flashsale->end_time)->diffForHumans() }}</p>
                    <p>Stok tersisa: {{ $flashsale->stock }}</p>

                    <!-- Button untuk membeli produk -->
                    <a href="javascript:void(0);" 
                        onclick="confirmPurchase('{{ $flashsale->id }}', 'guest')"
                        class="btn btn-icon icon-left btn-warning">
                        Beli Sekarang
                    </a>
                @else
                    <p>Produk tidak tersedia.</p>
                @endif
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6">
                <!-- Informasi Tambahan jika diperlukan -->
                <h4>Informasi Tambahan</h4>
                <p>Pastikan Anda mengikuti syarat dan ketentuan dari flash sale ini.</p>
            </div>
        </div>
    </section>
</div>

<!-- SweetAlert untuk konfirmasi pembelian -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmPurchase(productId, userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan membeli produk ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Beli!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/product/purchase/' + productId + '/' + userId;
            }
        });
    }
</script>

@endsection  <!-- Mengakhiri bagian konten -->
