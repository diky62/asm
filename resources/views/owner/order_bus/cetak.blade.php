@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container-fluid">

	<a href="{{ route('orderbus.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>
	

	<div class="panel panel-default">
		<div class="panel-heading">
			Print Preview Invoice
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="panel-body">
					<div id="printThis">
						<div class="form-group">
							<table border="1">
								<thead>
									<tr>
										<td>
											<img src="{{asset('gambar/kop.png')}}" width="700"/>
										</td>
									</tr>
								</thead>
							</table>
						</div>
						<center style="font-family: Times New Roman">
							<H4>INVOICE</H4>
						</center>
						
						<table border="1">
							<tr> 
								<td width="700">
									<table border="0">

										<tr>
											<td width="10"></td>
											<td> Nama Pemesan </td> <td> : </td><td> {{$order_bus->nama_pemesan}}</td>
										</tr>
										<tr>
											<td width="10"></td>
											<td> No Hp </td> <td width="10"> : </td><td>{{$order_bus->no_hp}}</td>
										</tr>
										<tr>
											<td width="10"></td>
											<td> Harga </td> <td> : </td><td>{{$order_bus->harga}}</td>
										</tr>
										<tr>
											<td width="10"></td>
											<td> Diskon </td> <td> : </td><td>{{$order_bus->diskon}}</td>
										</tr>
										@php
											setlocale (LC_TIME, 'id_ID');
											$date = strftime( "%d %B %Y", strtotime($order_bus->tgl_berangkat));
											$date1 = strftime( " %d %B %Y", time());
											
										@endphp
										<tr>
											<td width="10"></td>
											<td> Untuk Pembayaran </td> <td width="10"> : </td><td> Biaya sewa bus pariwisata sebanyak {{$order_bus->jumlah}} unit {{$order_bus->kode_bodi}} dengan nomor polisi {{$order_bus->plat_nomor}}, yang akan diberangkatkan pada tanggal {{$date}} jam {{$order_bus->waktu_keberangkatan}} dari {{$order_bus->penjemputan}} dengan tujuan {{$order_bus->tujuan}} </td>
										</tr>
									
									</table>
								</td>
							</tr>
							
						</table><br>
						<table border="1">
							<tr>
								<td width="700">
									<table>
										<tr>
											<td width="10">  
											</td>
											<td>
												<table border="1">
													<thead>
														<tr>
															<td width="250">
																
																<h3>Rp. {{ number_format($order_bus->total,0,".",".") }}</h3>
																
															</td>
														</tr>
													</thead>
												</table> 
											</td> 
											<td width="200"></td>
											<td>
												<center>
													<h5>Pemesan</h5>
													<br>
													
													<h5>( {{$order_bus->nama_pemesan}} )</h5>
												</center>
											</td>
											<td width="20"></td>
											<td>
												<center>
													<h5>Hormat Kami</h5>
													<br>
													
													<h5>( {{$user->name}} )</h5>
												</center>
											</td>

										</tr>
									</table>
										</td>
							</tr>
						</table>
						
						

						
					</div>
					<br>
					{{-- end printthis --}}
					<button type="submit" class="btn btn-success center-block btn-block" onclick="print_now()" style="border-radius:24px"><i class="fa fa-print"></i> Cetak </button>
				</div>
					
				{{-- end form --}}
			</div>

		</div>
				
	</div>

</div>
{{-- end container --}}
</section>
@endsection
@section('script')
	<script type="text/javascript">
	    $(document).ready(function(){
	      $("#diskon").keyup(function(){
	        var harga  = parseInt($("#harga").val());
	        var diskon  = parseInt($("#diskon").val());
	        var total = harga - (harga*(diskon/100));
	        $("#total").val(total);
	      });

	    });
	     function print_now(){
			$("#printThis").printThis({
			importCSS: true,
            importStyle: true
			});
		}



  	</script>
@endsection