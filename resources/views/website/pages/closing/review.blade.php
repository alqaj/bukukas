@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">CLOSING (TUTUP BUKU)</h4>
    <div class="card mb-2">
        <div class="card-header">
            <h5 class="card-title">STEP 3: REVIEW DATA</h5>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <p>Silakan melakukan Review terhadap item-item di bawah ini! Bandingkan dengan saldo aktual</p>
                <table class="table">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th class="py-3">No</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Jenis Mutasi</th>
                            <th class="py-3">Tanggal</th>
                            <th class="py-3">Jumlah</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php $no=1; $total = 0; @endphp
                        @if(isset($data))
                        @foreach($data as $d)
                        @if($d->jenis_mutasi == "masuk")
                        <tr class="text-success">
                        @else
                        <tr class="text-danger">
                        @endif
                            <td>{{ $no }}</td>
                            <td>{{ $d->nama_kategori }}</td>
                            <td>{{ $d->jenis_mutasi }}</td>
                            <td>{{ $d->tanggal_transaksi }}</td>
                            <td class="text-end">{{ $d->jumlah }}</td>
                        </tr>

                        @php
                        $no++;
                        @endphp
                        @if($d->jenis_mutasi == 'masuk')
                        @php $total+= $d->jumlah; @endphp
                        @else
                        @php $total-= $d->jumlah; @endphp
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                    <form action="{{ route('website.closing.konfirmasi') }}">
                    <tfoot class="bg-light">
                    <tr>
                        <th colspan="4">SISA SALDO BULAN TER-FILTER</th>
                        <th class="text-end">{{ $total }}</th>
                    </tr>
                    </tfoot>
                </table>
                <div class="text-center mt-5">
                        <input type="hidden" name="total" value="{{ $total }}"></input>
                        <input type="hidden" name="bulan" value="{{ $bulan }}"></input>
                        <input type="hidden" name="tahun" value="{{ $tahun }}"></input>
                        <a href="{{ route('website.closing.informasi') }}" class="btn btn-secondary me-3"><i class="bx bx-caret-left"></i> Back</a>
                        <button class="btn btn-primary ml-4">Next <i class="bx bx-caret-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush