@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">EDIT - APPLICATION USERS</h4>
    <form>
        <fieldset>
            <div class="mb-3">
                <label for="uid" class="form-label">User ID</label>
                <input type="text" id="uid" class="form-control" placeholder="Disabled input">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NK</label>
                <input type="text" id="nik" class="form-control" placeholder="Disabled input">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Karyawan</label>
                <input type="text" id="nama" class="form-control" placeholder="Disabled input">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" class="form-control" placeholder="Disabled input">
            </div>
            <div class="mb-3">
                <label for="re-password" class="form-label">Ketik Ulang Password</label>
                <input type="text" id="re-password" class="form-control" placeholder="Disabled input">
            </div>
        </fieldset>
    </form>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush