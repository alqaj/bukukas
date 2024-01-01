@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">DATA - MASTER KATEGORI</h4>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
       {{ @Session::get('success') }}
    </div>
    @endif
    <a class="btn btn-success mb-1 ml-auto" href="{{ route('website.kategori.create')}}"><i class="bx bx-plus"></i> Tambah Data</a>
    <table class="table">
        <thead class="bg-light">
            <tr class="text-center">
                <th class="py-3">No.</th>
                <th class="py-3">Nama Kategori</th>
                <th class="py-3">Jenis Mutasi</th>
                <th class="py-3">Catatan</th>
                <!-- <th class="py-3">Edit</th> -->
            </tr>
        </thead>
        <tbody>
        @php $no=1; @endphp
           @foreach($data as $d)
            @if($d->jenis_mutasi == "masuk")
            <tr class="text-success">
            @else
            <tr class="text-danger">
            @endif
                <td>{{ $no }}</td>
                <td>{{ $d->nama_kategori }}</td>
                <td>{{ $d->jenis_mutasi }}</td>
                <td>{{ $d->catatan }}</td>
                <!-- <td>
                    <button class="btn btn-primary">
                        <i class="bx bx-edit-alt"></i>
                    </button>
                </td> -->
            </tr>
            @php $no++ @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush