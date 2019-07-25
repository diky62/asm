@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : 'layouts.shuttle_view'))
@section('content')
<section>
	<div class="container-fluid">

	<a href="{{ route('ordertour.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Pemesanan
		</div>
		<div class="panel-body">
			<form class="form" action="{{ route('ordertour.store') }}" method="post" fid="orderForm">
			@csrf
			<div class="row">
							<div class="panel-body">
								<div class="form-group">
									<h4><span class="label label-default">Nama Pemesan: </span></h4>
									<input type="text" required name="nama_pemesan" class="form-control" placeholder="Nama Pemesan" onkeyup="this.value = this.value.toUpperCase()">
								</div>
								
								<div class="form-group">
									<h4><span class="label label-default">Tujuan : </span></h4>
									<input type="text" required name="tujuan" class="form-control" placeholder="Tujuan">
								</div>
                                <div class="form-group">
									<h4><span class="label label-default">Keterangan Tujuan : </span></h4>
									<input type="text" required name="ket_tujuan" class="form-control" placeholder="Keterangan Tujuan">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Alamat Penjemputan : </span></h4>
									<input type="text" required name="penjemputan" class="form-control" placeholder="Penjemputan">
								</div>
								
                                <div class="form-group">
									<h4><span class="label label-default">Jam Keberangkatan: </span></h4>
									<input type="time" required name="waktu_keberangkatan" id="waktu_keberangkatan" class="form-control" placeholder="Jam Keberangkatan">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Tanggal Keberangkatan: </span></h4>
									<input type="date" required name="tgl_berangkat"  id="tgl_berangkat" class="form-control" placeholder="Harga">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Tanggal Kembali: </span></h4>
									<input type="date" required name="tgl_kembali" id="tgl_kembali" class="form-control" placeholder="Harga">
								</div>
                                <div class="form-group">
									<h4><span class="label label-default">Jumlah Peserta : </span></h4>
									<input type="number" required name="jml_peserta" id="jml_peserta" class="form-control" placeholder="Jumlah Peserta" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Jumlah Bus: </span></h4>
									<input type="number" required name="jml_bus" id="jml_bus" class="form-control" placeholder="Jumlah Bus" onkeypress="return hanyaAngka(event)">
								</div>
                                <div class="form-group">
									<h4><span class="label label-default">Keterangan Bus: </span></h4>
									<input type="textarea" required name="ket_bus" id="ket_bus" class="form-control" placeholder="Keterangan Bus">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Keterangan: </span></h4>
									<input type="textarea" required name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
								</div>

								<div class="form-group">
									<h4><span class="label label-default">Harga: </span></h4>
									<input type="number" required name="harga" id="harga" class="form-control" placeholder="Harga" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Diskon (%) : </span></h4>
									<input type="number" required name="diskon" id="diskon" class="form-control" placeholder="Diskon" value="0" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Total: </span></h4>
									<input type="number" name="total" id="total" value="" class="form-control">
								</div>
								
							</div>
					
				{{-- end form --}}
			</div>
			
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
	        var peserta  = parseInt($("#jml_peserta").val());
	        var subtotal = (harga*peserta) - (harga*(diskon/100));
	        var total = subtotal - (subtotal*(diskon/100));
	        $("#total").val(total);
	      });

	    });



  	</script>
@endsection