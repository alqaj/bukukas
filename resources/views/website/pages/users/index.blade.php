@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">DATA - APPLICATION USERS</h4>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success')}}
    </div>
    @endif
    <table class="table">
        <thead class="bg-light">
            <tr class="text-center">
                <th class="py-3">No.</th>
                <th class="py-3">Nama</th>
                <th class="py-3">Email</th>
                <th class="py-3">Edit</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($data as $d)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->email}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ url('/users/edit') }}/{{ $d->uuid }}">
                        <i class="bx bx-edit"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush