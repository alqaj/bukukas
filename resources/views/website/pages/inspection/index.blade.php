@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">DATA - INSPECTION LIST BODY KENDARAAN</h4>
    <table class="table">
        <thead class="bg-light">
            <tr class="text-center">
                <th class="py-3">No.</th>
                <th class="py-3">Tanggal Inspeksi</th>
                <th class="py-3">No. Polisi</th>
                <th class="py-3">Type/Warna</th>
                <th class="py-3">Total Biaya</th>
                <th class="py-3">PIC</th>
                <th class="py-3">Catatan</th>
                <th class="py-3">Detail</th>
            </tr>
        </thead>
        <tbody>
            @for($i=1;$i<9;$i++)
            <tr>
                <td>1</td>
                <td>2023-08-01</td>
                <td>T 1317 GF</td>
                <td>Ayla 1.0 X / Merah</td>
                <td>1.250.000</td>
                <td>Agus</td>
                <td>Tolong cek kelistrikan juga</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="bx bx-search"></i>
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