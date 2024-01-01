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
    <form action="{{ route('website.closing.review') }}">
    <div class="card mb-2">
        <div class="card-header">
            <h5 class="card-title">STEP 2: INPUT DATA</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
            <p>Masukkan data Bulan dan tahun yang akan anda lakukan Closing</p>
            <div class="col-md-6">
                <label for="bulan" class="form-label">Bulan</label>
                <select class="form-select" id="bulan" name="bulan">
                    <option value="" disabled selected>Pilih Bulan</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun">
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('website.closing.informasi') }}" class="btn btn-secondary me-3"><i class="bx bx-caret-left"></i> Back</a>
                <button class="btn btn-primary ml-4">Next <i class="bx bx-caret-right"></i></button>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush