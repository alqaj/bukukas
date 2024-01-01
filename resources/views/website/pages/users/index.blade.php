@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">DATA - APPLICATION USERS</h4>
    <table class="table">
        <thead class="bg-light">
            <tr class="text-center">
                <th class="py-3">No.</th>
                <th class="py-3">UID</th>
                <th class="py-3">NIK</th>
                <th class="py-3">Nama</th>
                <th class="py-3">Edit</th>
            </tr>
        </thead>
        <tbody>
            @for($i=1;$i<9;$i++)
            <tr>
                <td>1</td>
                <td>000074Agus</td>
                <td>000074</td>
                <td>Agus Ali</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="bx bx-edit-alt"></i>
                    </button>
                </td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush