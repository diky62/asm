@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container-fluid">

	<a href="{{ route('order_shuttle.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>

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
							<H4>TIKET BUS</H4>
						</center>
						
						<table border="1">
							<tr> 
								<td width="700">
									<table border="0">

										<tr>
											<td width="10"></td>
											<td> Nama Pemesan </td> <td> : </td><td> {{$order_shuttle->nama}}</td>
										</tr>
										<tr>
											<td width="10"></td>
											<td> No Identitas </td> <td width="10"> : </td><td>{{$order_shuttle->no_identitas}}</td>
										</tr>
										<tr>
											<td width="10"></td>
											<td> Alamat </td> <td> : </td><td>{{$order_shuttle->alamat}}</td>
										</tr>
										<tr>
											<td width="10"></td>
											<td> Jurusan </td> <td> : </td><td>{{$order_shuttle->jurusan->jurusan}}</td>
										</tr>
										@php
											setlocale (LC_TIME, 'id_ID');
											$date = strftime( "%d %B %Y", strtotime($order_shuttle->tgl_berangkat));
											$date1 = strftime( " %d %B %Y", time());
											
										@endphp
										<tr>
											<td width="10"></td>
											<td width="190"> Tanggal Keberangkatan  </td> <td> : </td><td>{{$date}}</td>
										</tr>
									</table>
								</td>
							</tr>
							
						</table>

						<hr>

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
															
															<h1>Rp. {{ number_format($order_shuttle->Harga,0,".",".") }}</h1>
															
														</td>
													</tr>
												</thead>
											</table> 
										</td> 
										<td width="300"></td>
										<td>
											<center>
												<h5>Hormat Kami</h5>
												<br>
												
												<h5>( Fitra Autotrans )</h5>
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
					<button type="submit" class="btn btn-success center-block btn-block" onclick="print_now()" style="border-radius:24px"><i class="fa fa-print"></i> Cetak Tiket</button>
				</div>
					
				{{-- end form --}}
			</div>

		</div>
				
	</div>
	{{-- end main panel --}}

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