@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">BUAT KATGORI</h4>
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
    @endif
    <form action="{{ route('website.kategori.store') }}" method="post">
        @csrf
        <fieldset>
            <div class="mb-3">
                <label for="jenis_mutasi" class="form-label">JENIS MUTASI</label>
                <select class="form-control" id="jenis_mutasi" name="jenis_mutasi">
                    <option value="keluar">Kas Keluar</option>
                    <option value="masuk">Kas Masuk</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">NAMA KATEGORI MUTASI</label>
                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" placeholder="Nama Kategori Mutasi">
            </div>
            <div class="mb-3">
                <label for="catatan" class="form-label">CATATAN</label>
                <textarea class="form-control" name="catatan"></textarea>
            </div>
        </fieldset>
        <button class="btn btn-success"><i class='bx bx-save'></i> SIMPAN KATEGORI</button>
    </form>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush