<html>
    <head>
        <title>Laporan Kas DKM Al Mustaqillin</title>
        <style type="text/css">
            @page {
                margin: 15px;
                margin-top: 20px;
            }

            body {
                font-size: 7pt;
                font-family: 'sans-serif';
            }

            .table {
                border-collapse: collapse;
            }

            th {
                text-align: center;
                font-weight: bold;
                border: 1px solid #000;
                padding: 2px;
                /*vertical-align: center;*/
            }

            td {
                border: 1px solid #000;
                border-bottom: 1px solid #000;
                border-top: 1px solid #000;
                padding: 3px;
                /*text-align: left;*/
            }

            .sub-tr {
                background-color: #c3cfe3;
                font-weight: bold;
            }

            p {
                margin: 5px;
            }

            .text-center {
                text-align: center;
            }

            .text-right {
                text-align: right;
            }

            .sign {
                /*height: 10px;*/
                padding-top: 50px;
            }

            .font-weight-bold {
                font-weight: bold;
            }

            .no-page-break {
                display: inline-block;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <center><h2>Laporan Kas DKM Al Mustaqillin Bulan {{ $bulan }} Tahun {{ $tahun }}<h2></center>
        <br/>
        <table class="table" width="100%">
            <tr>
                <th>No</th>
                <th>Aktivitas</th>
                <th>Jenis Mutasi</th>
                <th>Tanggal Transaksi</th>
                <th>Jumlah</th>
            </tr>
            @php $no = 1; $total = 0;@endphp
            @foreach($data as $d)
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $d->nama_kategori }}</td>
                <td>{{ $d->jenis_mutasi }}</td>
                <td>{{ $d->tanggal_transaksi }}</td>
                <td class="text-right">{{ number_format($d->jumlah, 0, ".",",") }}</td>
            </tr>
            @php
                $no++;
                if($d->jenis_mutasi == "masuk"){
                    $total += $d->jumlah;
                }else{
                    $total -= $d->jumlah;
                }
            @endphp
            @endforeach
            <tr>
                <th colspan="4">SALDO AKHIR</th>
                <th class="text-right">{{ number_format($total,0,".",",") }}</th>
            </tr>
        </table>
    </body>
</html>