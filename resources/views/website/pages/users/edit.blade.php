@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">EDIT - APPLICATION USERS</h4>
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
    @endif
    <form class="p-5 bg-light" action="{{ route('website.users.update') }}" method="POST">
        @csrf
        <fieldset>
            <div class="mb-3">
                <label for="uuid" class="form-label">UUID</label>
                <input type="text" id="uuid" name="uuid" class="form-control" value="{{ $user->uuid }}" readOnly style="background-color:#e9ecef;  border: 1px solid #ced4da;"/>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">NAMA</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="mb-5">
                <label for="email" class="form-label">EMAIL</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="ubah_password" name="ubah_password">
                  <label class="form-check-label" for="disabledFieldsetCheck">
                    Ubah Password
                  </label>
                </div>
              </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" disabled>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Ketik Ulang Password</label>
                <input type="password" id="password_confirmation" class="form-control" placeholder="Re-Password" name="password_confirmation" disabled>
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN PERUBAHAN</button>
        </fieldset>
    </form>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
    // console.log('test')
    $('#ubah_password').on('change', function(){
        // alert('masuk')
        if($(this).is(':checked')){
            $('#password').removeAttr('disabled');
            $('#password_confirmation').removeAttr('disabled');
        }else{
            $('#password').attr('disabled','disabeld');
            $('#password_confirmation').attr('disabled', 'disabled');
        }
    })
</script>
@endpush