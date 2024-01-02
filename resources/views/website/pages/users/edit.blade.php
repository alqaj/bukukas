@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">EDIT - APPLICATION USERS</h4>
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
    @endif
    <form class="p-5 bg-light" action="{{ route('website.users.update') }}" method="PUT">
        <fieldset>
            <div class="mb-3">
                <label for="uuid" class="form-label">UUID</label>
                <input type="text" id="uuid" class="form-control" value="{{ $user->uuid }}" readOnly disabled>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">NAMA</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="mb-5">
                <label for="email" class="form-label">EMAIL</label>
                <input type="text" id="email" class="form-control" value="{{ $user->email }}">
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