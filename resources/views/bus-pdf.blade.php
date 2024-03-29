<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penyewaan Bus </title>
</head>
<body>
    <center>
        <img src="{{asset('gambar/kop.png')}}" width="700"/>
        <img src="{{asset('gambar/garis.png')}}" width="700"/>

        <h2>Laporan Penyewaan Bus Pariwisata</h2>
        <h2>PT. Angga Saputra Mandiri</h2>

    </center>
    <br>
<table border="1" style="width:100%">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Peminjam</th>
            <th>Tujuan</th>
            <th>Lokasi Penjemputan</th>
            <th>Keterangan Lokasi</th>
            <th>Jam Keberangkatan</th>
            <th>Tanggal Keberangkatan</th>
            <th>Tanggal Kembali</th>
            <th>Jumlah Bus</th>
            <th>Keterangan</th>
            <th>Harga</th>
            <th>Total</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($order_bus as $o => $orderbus)
        <tr>
            @php
                setlocale (LC_TIME, 'id_ID');
                $date = strftime( "%d %B %Y", strtotime($orderbus->tgl_kembali));
                $date1 = strftime( " %d %B %Y", strtotime($orderbus->tgl_berangkat));
                
            @endphp
            <td>{{$o+1}}</td>
            <td>{{$orderbus->nama_pemesan}}</td>
            <td>{{$orderbus->tujuan}}</td>
            <td>{{$orderbus->penjemputan}}</td>
            <td>{{$orderbus->keterangan_lokasi}}</td>
            <td>{{$orderbus->waktu_keberangkatan}}</td>
            <td>{{$date1}}</td>
            <td>{{$date}}</td>
            <td>{{$orderbus->jumlah}}</td>
            <td>{{$orderbus->keterangan}}</td>
            <td>{{$orderbus->harga}}</td>
            <td>{{$orderbus->total}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>