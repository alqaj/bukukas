@extends('website.layouts.main')
@section('content')
<div class="col-md-12">
	<h4 class="fw-bold mb-3">BUAT MUTASI</h4>
    <form method="post" action="{{route('website.mutasi.store') }}">
        @csrf
        <fieldset>
            <div class="mb-3">
                <label for="jenis_mutasi" class="form-label">JENIS MUTASI</label>
                <select class="form-control" id="jenis_mutasi" name="jenis_mutasi">
                <option value="" selected disabled>Pilih</option>
                    <option value="keluar">Kas Keluar</option>
                    <option value="masuk">Kas Masuk</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">KATEGORI MUTASI</label>
                <select class="form-control" id="kategori" name="kategori">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">JUMLAH</label>
                <input type="number" id="jumlah" class="form-control" name="jumlah" placeholder="Jumlah Transasksi">
            </div>
            <div class="mb-3">
                <label for="tanggal_transasksi" class="form-label">TANGGAL TRANSAKSI</label>
                <input type="date" id="password" class="form-control" name="tanggal_transaksi">
            </div>
            <div class="mb-3">
                <label for="catatan" class="form-label">CATATAN</label>
                <textarea class="form-control" name="catatan"></textarea>
            </div>
        </fieldset>
        <button class="btn btn-success"><i class='bx bx-save'></i> SIMPAN MUTASI</button>
    </form>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $("#jenis_mutasi").change(function() {
            var selectedValue = $(this).val();

            $.ajax({
            type: "GET",
            url: `{{ url('/mutasi/kategori') }}/${selectedValue}`,
            dataType: "json",
            success: function(data) {
                $("#kategori").empty();
                $("#kategori").append('<option value="">Pilih Kategori</option>');
                $.each(data, function(index, value) {
                $("#kategori").append('<option value="' + value.id + '">' + value.nama_kategori + '</option>');
                });
            },
            error: function(error) {
                console.log("Error: " + error)
            }
            })
        })
    })
</script>
@endpush