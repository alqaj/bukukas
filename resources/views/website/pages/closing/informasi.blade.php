@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">CLOSING (TUTUUP BUKU)</h4>

    @if(Session::has('success'))
    <div class="alert alert-success">
        <h1> Alhamdulillah! Anda Sukses melakukan Closing</h1>
    </div>
    @else
    <div class="card mb-2">
        <div class="card-header">
            <h5 class="card-title">STEP 1: INFORMASI</h5>
        </div>
        <div class="card-body">
            <ul>
                <li>Haarap berhati-hati dengan menu CLosing ini. Menu ini digunakan untuk melakukan Tutup Buku (Closing) tiap bulan</li>
                <li>Setelah melakukan Closing, maka sgala transaksi bulan tersebut akan ditutup, dan transaksi di bulan yg sama tidak aka bisa masuk lagi.</li>
                <li>Step 1 adalah informasi mengenai Closing ini</li>
                <li>Step 2 adalah memilih bulan dan tahun transaksi yang akan dilakukan Closing</li>
                <li>Step 3 adalah Review. Silakan cek data saldo di sistem ini dan saldo aktual. Jika ada perbedaan benahi data. Sehingga Data benar! Jika salah maka akan menjadi tanggung jawab orang yg melakukan Closing ini</li>
                <li>Step 4 adalah konfirmasi & eksekusi. Silakan klik EKSEKUSI jika anda sudah yakin dengan data yang sudah ada di  Review</li>
                <li>Janga lupa Bismillah :) </i>

            </ul>
            <div class="text-center">
                
                <a href="#" class="btn btn-secondary me-3"><i class="bx bx-caret-left"></i> Back</a>
                <a href="{{ route('website.closing.input') }}" class="btn btn-primary ml-4">Next <i class="bx bx-caret-right"></i></a>
                
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush