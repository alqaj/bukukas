@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">DATA - MUTASI KAS</h4>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
       {{ @Session::get('success') }}
    </div>
    @endif
    <form>
    <div class="card mb-2">
        <div class="card-header">
        <h5 class="card-title">Filter Data</h5>
        </div>
    <div class="card-body">
      <div class="row g-3">
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
      </div>
      <button type="submit" class="btn btn-success mt-3">Filter</button>
    </div>
  </div>
</form>
    <table class="table">
        <thead class="bg-light">
            <tr class="text-center">
                <th class="py-3">No</th>
                <th class="py-3">Kategori</th>
                <th class="py-3">Jenis Mutasi</th>
                <th class="py-3">Tanggal</th>
            </tr>
        </thead>
        {{-- 
        <tbody>
            @if(count($data) > 0)
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
            </tr>
            @php $no++ @endphp
            @endforeach
            @endif
        </tbody> --}}
    </table>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush