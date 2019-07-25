<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
			<h4>Membuat Laporan PDF Dengan DOMPDF Laravel</h4>
			<h5><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
		</center>
		<br/>
		<a href="/pegawai/cetak_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
		<table class='table table-bordered'>
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
					<td>{{$o+1}}</td>
					<td>{{$order_shuttle->nama}}</td>
					<td>{{$order_shuttle->no_identitas}}</td>
					<td>{{$order_shuttle->alamat}}</td>
					<td>{{$order_shuttle->jurusan->jurusan}}</td>
					<td>{{$order_shuttle->tgl_berangkat}}</td>
					<td>{{$order_shuttle->harga}}</td>
					<td>{{$order_shuttle->diskon}}</td>
					<td>{{$order_shuttle->total}}</td>

				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

</body>
</html>