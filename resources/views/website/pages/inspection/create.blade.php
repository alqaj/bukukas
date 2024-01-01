@extends('website.layouts.main')
@section('title','Homepage')

@section('content')
<div class="col-md-12 pe-4">
	<h4 class="fw-bold mb-3">INSPECTION LIST BODY KENDARAAN</h4>
	<div class="bg-light py-4 px-5 mb-3">
		<div class="form-group row mb-3">
			<label for="staticEmail" class="col-sm-3 col-form-label text-end fw-bold">NO. POLISI</label>
			<div class="col-sm-9 pe-5">
			  <input type="text" class="form-control" id="staticEmail" value="">
			</div>
		  </div>
		  <div class="form-group row min-100">
			<label for="staticEmail" class="col-sm-3 col-form-label text-end fw-bold">TYPE KENDARAAN</label>
			<div class="col-sm-3">
			  <select class="form-control" name="jenis" id="jenis">
				<option>Pilih tipe kendaraan</option>
				@foreach($jenis as $jn)
				<option value="{{ $jn->id }}">{{ $jn->nama_jenis }}</option>
				@endforeach
			  </select>
			</div>
			<label for="staticEmail" class="col-sm-2 col-form-label text-end fw-bold">WARNA</label>
			<div class="col-sm-4 pe-5">
				<select class="form-control">
					<option>Pilih Warna</option>
					@foreach($warna as $wr)
					<option value="{{ $wr->id }}">{{ $wr->nama_warna }}</option>
					@endforeach
				  </select>
			</div>
		  </div>
	</div>
	<div class="mb-3">
		<table class="table">
			<thead class="bg-light">
				<tr class="text-center">
					<th class="py-3">NAMA PANEL</th>
					<th class="py-3">KONDISI</th>
					<th class="py-3">JASA</th>
					<th class="py-3">ESTIMASI</th>
				</tr>
			</thead>
			<tbody class="tbody">
				<!-- <tr>
					<td class="py-2">Bamper Depan</td>
					<td class="py-2 text-center">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions"  value="option1">
							<label class="form-check-label" for="inlineRadio1">Baret</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions"  value="option1">
							<label class="form-check-label" for="inlineRadio1">Penyok</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions"  value="option1">
							<label class="form-check-label" for="inlineRadio1">Robek</label>
						</div>
					</td>
					<td class="text-center">
						<select class="form-control">
							<option>Pilih Jasa</option>
							<option>Ganti</option>
							<option>Repair</option>
						</select>
					</td>
					<td class="text-end pe-3">0</td>
				</tr>
				<tr>
					<td class="py-2">Kap Mesin / Engine Hood</td>
					<td class="py-2 text-center">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions"  value="option1">
							<label class="form-check-label" for="inlineRadio1">Baret</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions"  value="option1">
							<label class="form-check-label" for="inlineRadio1">Penyok</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions"  value="option1">
							<label class="form-check-label" for="inlineRadio1">Robek</label>
						</div>
					</td>
					<td class="text-center">
						<select class="form-control">
							<option>Pilih Jasa</option>
							<option>Ganti</option>
							<option>Repair</option>
						</select>
					</td>
					<td class="text-end pe-3">0</td>
				</tr> -->
			</tbody>
			<tfoot class="bg-light">
				<tr>
					<th class="fw-bold py-3" colspan="3">
						TOTAL BIAYA
					</th>
					<th id="totalEstimasi" class="text-end">
					</th>
				</tr>
			</tfoot>
		</table>
	</div>
	<div class="mb-3">
		<textarea class="form-control" placeholder="Catatan Tambahan" rows="3"></textarea>
	</div>
	<div>
		<button class="btn btn-primary btn-submit" disabled >SIMPAN & CETAK E-NOTA</button>
	</div>
</div>
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
	$('.btn-submit').on('click', function(){
		
	})

	function fill_table(data){
		console.log('fill_table')
		$('.tbody').empty()
		var html = ''
		if(data.length > 0){
			for(var i =0; i< data.length; i++){
				html += `
					<tr>
						<td class="py-2">${data[i].nama_inspeksi}</td>
						<td class="py-2 text-center">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="kondisi_${data[i].id}[]" id="baret_${data[i].id}" value="Baret">
								<label class="form-check-label" for="baret_${data[i].id}">Baret</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="kondisi_${data[i].id}[]" id="penyok_${data[i].id}" value="Penyok">
								<label class="form-check-label" for="penyok_${data[i].id}">Penyok</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="kondisi_${data[i].id}[]" id="robek_${data[i].id}" value="Robek">
								<label class="form-check-label" for="robek_${data[i].id}">Robek</label>
							</div>
						</td>
						<td class="text-center">
							<select class="form-control jasa-control">
								<option value="" data-biaya="0">Pilih Jasa</option>
								<option value="ganti" data-biaya="${data[i].biaya_ganti}">Ganti</option>
								<option value="repair" data-biaya="${data[i].biaya_repair}" >Repair</option>
							</select>
						</td>
						<td class="text-end pe-3 estimasi">0</td>
					</tr>
				`
			}
		}
		$('.tbody').append(html)
	}
	$('#jenis').on('change', function(){
		loading()
		$.ajax({
			'url' : "{{ route('website.inspection.ajax_get_price_list') }}",
			'method' : 'GET',
			'data' :{
				'jenis' : function(){
					return $('#jenis').val()
				},
			},'success' : function(response){
				console.log(response.length)
				fill_table(response)
				hide_loading()
			},'error' : function(xhr,status, error){

			}
		})
	})

	$('.tbody').on('change','.jasa-control', function(){
		console.log('jasa berubah')
		var selectedOption = $(this).find("option:selected");
		var estimasi = selectedOption.data("biaya");
		$(this).closest("tr").find(".estimasi").text(estimasi);

		calculateTotalEstimasi()
	})

	function calculateTotalEstimasi() {
      var totalEstimasi = 0;
      
      $(".estimasi").each(function() {
        var estimasiValue = parseInt($(this).text());
        if (!isNaN(estimasiValue) && estimasiValue > 0) {
          totalEstimasi += estimasiValue;
        }
      });

      $("#totalEstimasi").text(totalEstimasi);
    }

	// $('.tbody').on('click', 'input[type="radio"]', function(){
	// 	var rowName = $(this).attr("name");
		
	// })


</script>
@endpush