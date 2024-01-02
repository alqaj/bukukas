@extends('website.layouts.main')
@section('title','Homepage')

@section('content')

<div class="col-md-12">
	<div width="100%">
		<h4 class="fw-bold text-center">Grafik Pemasukan & Pengeluaran DKM Al Mustaqillin tahun {{ $year }}</h4>
		<canvas id="barChart" height="150"></canvas>
	</div>
</div>

@endsection

@push('styles')
<style>
    /* Gunakan px-5 jika lebar layar lebih dari 768px (laptop) */
    @media (min-width: 769px) {
      #barChart {
        padding: 0 5rem;
		/* height: 100px !important; */
      }
    }

    /* Gunakan px-1 jika lebar layar 768px atau kurang (mobile) */
    @media (max-width: 768px) {
      #barChart {
        padding: 0 1rem;
		/* height: 200px !important; */
      }
    }
  </style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ambil data dari PHP (gantilah sesuai dengan cara Anda menyimpan data)
    <?php
    $monthlyData = []; // Inisialisasi array untuk data bulanan

	for ($bulan = 1; $bulan <= 12; $bulan++) {
        $bulanTahun = date('Y-m', strtotime("$year-$bulan-01"));
        $monthlyData[$bulanTahun] = ['masuk' => 0, 'keluar' => 0];
    }
	foreach ($data as $entry) {
    	$bulanTahun = date('Y-m', strtotime($entry['tanggal_transaksi']));

        $jenisIsi = $entry['jenis_mutasi'];
        $jumlah = $entry['jumlah'];

        if ($jenisIsi === 'masuk') {
          $monthlyData[$bulanTahun]['masuk'] += $jumlah;
        } elseif ($jenisIsi === 'keluar') {
          $monthlyData[$bulanTahun]['keluar'] += $jumlah;
        }
      }

      // Output data bulanan sebagai objek JavaScript
      echo "var monthlyData = " . json_encode($monthlyData) . ";";
    ?>

    // Buat bar chart
    var ctx = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: Object.keys(monthlyData),
        datasets: [
          {
            label: 'Pemasukan',
            data: Object.values(monthlyData).map(data => data.masuk),
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          },
          {
            label: 'Pengeluaran',
            data: Object.values(monthlyData).map(data => data.keluar),
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }
        ]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
@endpush