<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan Tiket Bus</title>
</head>
<body>
    <center>
        <img src="{{asset('gambar/kop.png')}}" width="700"/>
        <img src="{{asset('gambar/garis.png')}}" width="700"/>

        <h2>Laporan Penjualan Tiket Bus</h2>
        <h2>PT. Angga Saputra Mandiri</h2>

    </center>
    <br>
<table border="1" style="width:100%">
    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>No Identitas</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                            <th>Tanggal Berangkat</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order_shuttles as $o => $order_shuttle)
                        <tr>
                            @php
                                setlocale (LC_TIME, 'id_ID');
                                $date = strftime( "%d %B %Y", strtotime($order_shuttle->tgl_berangkat));
                                $date1 = strftime( " %d %B %Y", time());
                                
                            @endphp
                            <td>{{$o+1}}</td>
                            <td>{{$order_shuttle->nama}}</td>
                            <td>{{$order_shuttle->no_identitas}}</td>
                            <td>{{$order_shuttle->alamat}}</td>
                            <td>{{$order_shuttle->jurusan->jurusan}}</td>
                            <td>{{$date}}</td>
                            <td>{{$order_shuttle->Harga}}</td>
                            <td>{{$order_shuttle->diskon}}</td>
                            <td>{{$order_shuttle->total}}</td>

                        </tr>
                        @endforeach
                    </tbody>
</table>
</body>
</html>