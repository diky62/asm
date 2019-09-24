@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	{{-- @php
	 	$result = mysql_query("select * from jurusan");   
    	$jsArray = "var dtMhs = new Array();\n";       
    	while ($row = mysql_fetch_array($result)) {   
        	echo '<option value="' . $row['jurusan'] . '">' . $row['jurusan'] . '</option>';   
        	$jsArray .= "dtMhs['" . $row['jurusan'] . "'] = {harga:'" . addslashes($row['harga']) . "'};\n";   
    	}      
	@endphp --}}
	<div class="container-fluid">

	<a href="{{ route('order_shuttle.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Pemesanan
		</div>
		<div class="panel-body">
			<form class="form" action="{{ route('order_shuttle.store') }}" method="post" fid="orderForm">
			<div class="row">
							<div class="panel-body">
								<div class="form-group">
									<h4><span class="label label-default">Nama Pemesan: </span></h4>
									<input type="text" required name="nama" class="form-control" placeholder="nama pemesan" onkeyup="this.value = this.value.toUpperCase()">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Alamat : </span></h4>
									<input type="text" required name="alamat" class="form-control" placeholder="Alamat">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">No Identitas: </span></h4>
									<input type="text" required name="no_identitas" class="form-control" placeholder="No Identitas" onkeypress="return hanyaAngka(event)"	>
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Asal Tujuan: </span></h4>
									<select class="form-control" name="jurusan" id="jurusan">
									<option disabled selected>-- Pilih Jurusan --</option>
                                    @foreach($jurusans as $jurusan)
									<option harga="{{ $jurusan->harga }}" value="{{ $jurusan->id }}" >{{ $jurusan->jurusan }}</option>

									@endforeach 

                                </select>
								</div>
								{{-- <div class="form-group">
									<h4><span class="label label-default">Tujuan: </span></h4>
									<select class="form-control" name="tujuan">
                                    @foreach($kotas as $kota)
									<option value="{{ $kota->id }}">{{ $kota->name }}</option>
									@endforeach 
                                </select>
								</div> --}}
								<div class="form-group">
									<h4><span class="label label-default">Tanggal Keberangkatan: </span></h4>
									<input type="date" required name="tgl_berangkat"  class="form-control" placeholder="Harga">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Harga: </span></h4>
									<input type="text" required name="harga" id="harga" class="form-control"  value="" placeholder="Harga" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Diskon (%) : </span></h4>
									<input type="text" required name="diskon" id="diskon" class="form-control" placeholder="Diskon" value="0" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Total: </span></h4>
									<input type="text" name="total" id="total" value="" class="form-control">
								</div>
								
							</div>
					
				{{-- end form --}}
			</div>
			@csrf
			<button type="submit" class="btn btn-success center-block btn-block" style="border-radius:24px"><i class="fa fa-save"></i> SUBMIT</button>
			</form>
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

	    $('#jurusan').on('change',function(){
	    	  // var harga = $(“#jurusan option:selected”).attr(lama);
		   // var harga = parseInt($("#jurusan").val());
		   var harga = $('#jurusan option:selected').attr('harga');
		    $('#harga').val(harga);
		});

	    
		

   </script>

@endsection