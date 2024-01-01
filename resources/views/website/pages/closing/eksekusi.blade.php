@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">CLOSING (TUTUP BUKU)</h4>
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    <div class="card mb-2">
        <div class="card-header">
            <h5 class="card-title">STEP 4: KONFIRMASI & EKSEKUSI</h5>
        </div>
        <div class="card-body">
            <p>Apakah anda yakin akan melakukan Closing data berikut?</p>
            <p> Bulan : {{ $bulan }}</p>
            <p> Tahun : {{ $tahun }}</p>
            <p> Sisa Saldo : {{ $total }}</p>
            <div class="text-center">
                <form action="{{ route('website.closing.execute') }}" method="post">
                    @csrf
                <input type="hidden" name="bulan" value="{{ $bulan }}"></input>
                <input type="hidden" name="tahun" value="{{ $tahun }}"></input>
                <a href="{{ route('website.closing.informasi') }}" class="btn btn-danger me-3"><i class="bx bx-caret-left"></i> Kembali</a>
                <button class="btn btn-success ml-4">YAKIN !<i class="bx bx-caret-right"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush