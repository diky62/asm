<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Paket Wisata </title>
</head>
<body>
    <center>
        <img src="{{asset('gambar/kop.png')}}" width="700"/>
        <img src="{{asset('gambar/garis.png')}}" width="700"/>

        <h2>Laporan Pesanan Paket Wisata</h2>
        <h2>PT. Angga Saputra Mandiri</h2>

    </center>
    <br>
<table border="1" style="width:100%">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pemesan</th>
            <th>Tujuan</th>
            <th>Keterangan Tujuan</th>
            <th>Lokasi Penjemputan</th>
            <th>Jam</th>
            <th>Tanggal Keberangkatan</th>
            <th>Tanggal Kembali</th>
            <th>Jumlah Peserta</th>
            <th>Jumlah Bus</th>
            <th>Tour Leader</th>
            <th>Harga</th>
            <th>Total</th>
            
        </tr>
    </thead>
    <tbody>
    @foreach($order_tour as $or => $ordertour)
        <tr>
            @php
                setlocale (LC_TIME, 'id_ID');
                $date = strftime( "%d %B %Y", strtotime($ordertour->tgl_berangkat));
                $date1 = strftime( " %d %B %Y", strtotime($ordertour->tgl_kembali));
                
            @endphp
            <td>{{$or+1}}</td>
            <td>{{$ordertour->nama_pemesan}}</td>
            <td>{{$ordertour->tujuan}}</td>
            <td>{{$ordertour->ket_tujuan}}</td>
            <td>{{$ordertour->penjemputan}}</td>
            <td>{{$ordertour->waktu_keberangkatan}}</td>
            <td>{{$date}}</td>
            <td>{{$date1}}</td>
            <td>{{$ordertour->jml_peserta}}</td>
            <td>{{$ordertour->jml_bus}}</td>
            <td>{{$ordertour->keterangan}}</td>
            <td>{{$ordertour->harga}}</td>
            <td>{{$ordertour->total}}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>