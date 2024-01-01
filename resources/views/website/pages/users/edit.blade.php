@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">EDIT - APPLICATION USERS</h4>
    <form class="p-5 bg-light">
        <fieldset>
            <div class="mb-3">
                <label for="uid" class="form-label">User ID</label>
                <input type="text" id="uid" class="form-control" placeholder="Disabled input">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NK</label>
                <input type="text" id="nik" class="form-control" placeholder="Disabled input">
            </div>
            <div class="mb-5">
                <label for="nama" class="form-label">Nama Karyawan</label>
                <input type="text" id="nama" class="form-control" placeholder="Disabled input">
            </div>
            <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" >
                  <label class="form-check-label" for="disabledFieldsetCheck">
                    Ubah Password
                  </label>
                </div>
              </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" id="password" class="form-control" placeholder="Disabled input">
            </div>
            <div class="mb-3">
                <label for="re-password" class="form-label">Ketik Ulang Password</label>
                <input type="text" id="re-password" class="form-control" placeholder="Disabled input">
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
        </fieldset>
    </form>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush