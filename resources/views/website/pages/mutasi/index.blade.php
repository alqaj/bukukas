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
            <option value="1" @if($bulan=="1") selected @endif>Januari</option>
            <option value="2" @if($bulan=='2') selected @endif>Februari</option>
            <option value="3" @if($bulan=='3') selected @endif>Maret</option>
            <option value="4" @if($bulan=='4') selected @endif>April</option>
            <option value="5" @if($bulan=='5') selected @endif>Mei</option>
            <option value="6" @if($bulan=='6') selected @endif>Juni</option>
            <option value="7" @if($bulan=='7') selected @endif>Juli</option>
            <option value="8" @if($bulan=='8') selected @endif>Agustus</option>
            <option value="9" @if($bulan=='9') selected @endif>September</option>
            <option value="10" @if($bulan=='10') selected @endif>Oktober</option>
            <option value="11" @if($bulan=='11') selected @endif>November</option>
            <option value="12" @if($bulan=='12') selected @endif>Desember</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="tahun" class="form-label">Tahun</label>
          <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun" @if($tahun > 0) value="{{$tahun}}" @endif>
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
                <td><a href="#" class="detail-button custom-link">{{ $d->nama_kategori }}</a></td>
                <td>{{ $d->jenis_mutasi }}</td>
                <td data-catatan="{{ $d->catatan }}" data-pic="{{ $d->name }}">{{ $d->tanggal_transaksi }}</td>
                <td class="text-end">{{  number_format($d->jumlah,0,".",",") }}</td>
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
        <tfoot class="bg-light">
          <tr>
            <th colspan="4">SISA SALDO BULAN TER-FILTER</th>
            <th class="text-end">{{ number_format($total,0,".",",") }}</th>
          </tr>
        </tfoot>
    </table>
    @if($tahun > 0 && $bulan > 0)
    <form action="{{ route('website.mutasi.laporan') }}">
      <input type="hidden" name="bulan" value="{{ $bulan }}" />
      <input type="hidden" name="tahun" value="{{ $tahun }}" />
      <button class="btn btn-cetak btn-success"><i class="bx bx-printer"></i> Cetak Laporan</button>
    </form>
    @endif
</div>

 <!-- Modal untuk menampilkan detail tabel -->
 <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Tabel</h5>
            </div>
            <div class="modal-body">
                <form id="detailForm">
                    <!-- Tempatkan kolom formulir di sini sesuai dengan kebutuhan -->
                    <label for="mdl_kategori">Kategori:</label>
                    <input type="text" id="mdl_kategori" name="mdl_kategori" class="form-control" readonly disabled>

                    <label for="mdl_catatan">Catatan:</label>
                    <input type="text" id="mdl_catatan" name="mdl_catatan" class="form-control" readonly disabled>

                    <label for="mdl_pic">PIC:</label>
                    <input type="text" id="mdl_pic" name="mdl_pic" class="form-control" readonly disabled>


                    <!-- Tambahkan kolom formulir lainnya sesuai dengan kebutuhan -->
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection

@push('styles')
<style>
  .modal-backdrop {
          display: none !important;
  }
  .custom-link {
      color: inherit !important; /* Inherit text color from the parent element */
    }
</style>
@endpush

@push('scripts')
<script>
  $('body').on('click', '.detail-button', function () {
        // Ambil data dari baris tabel
        var field1 = $(this).closest('tr').find('td:eq(1)').text().trim();
        var field2 = $(this).closest('tr').find('td:eq(3)').data('catatan')
        var field3 = $(this).closest('tr').find('td:eq(3)').data('pic')

        // Setel nilai kolom formulir di modal
        $('#mdl_kategori').val(field1);
        $('#mdl_catatan').val(field2);
        $('#mdl_pic').val(field3);
        // Tampilkan modal
        $('#detailModal').modal('show');
    });
</script>
@endpush