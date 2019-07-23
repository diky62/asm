@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : 'layouts.shuttle_view'))
@section('content')
<section>
	<div class="container-fluid">

	<a href="{{ route('orderbus.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Edit Pemesanan
		</div>
		<div class="panel-body">
			<form class="form" action="{{ route('orderbus.update', $order_bus->id) }}" method="post" fid="orderForm">
			@method('put')
            @csrf
			<div class="row">
							<div class="panel-body">
								<div class="form-group">
									<h4><span class="label label-default">Nama Pemesan: </span></h4>
									<input type="text" value="{{$order_bus->nama_pemesan}}" required name="nama_pemesan" class="form-control" placeholder="Nama Pemesan" onkeyup="this.value = this.value.toUpperCase()">
								</div>
								
								<div class="form-group">
									<h4><span class="label label-default">Tujuan : </span></h4>
									<input type="text" value="{{$order_bus->tujuan}}" required name="tujuan" class="form-control" placeholder="Tujuan">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Alamat Penjemputan : </span></h4>
									<input type="text" value="{{$order_bus->penjemputan}}" required name="penjemputan" class="form-control" placeholder="Penjemputan">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Keterangan Lokasi : </span></h4>
									<input type="textarea" value="{{$order_bus->keterangan_lokasi}}" required name="keterangan_lokasi" class="form-control" placeholder="Keterangan Lokasi">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Tanggal Keberangkatan: </span></h4>
									<input type="date" value="{{$order_bus->tgl_berangkat}}" required name="tgl_berangkat"  id="tgl_berangkat" class="form-control" placeholder="Harga">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Tanggal Kembali: </span></h4>
									<input type="date" value="{{$order_bus->tgl_kembali}}" required name="tgl_kembali" id="tgl_kembali" class="form-control" placeholder="Harga">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Jam Keberangkatan: </span></h4>
									<input type="time" value="{{$order_bus->waktu_keberangkatan}}" required name="waktu_keberangkatan" id="waktu_keberangkatan" class="form-control" placeholder="Jam Keberangkatan">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Jumlah Bus: </span></h4>
									<input type="number" value="{{$order_bus->jumlah}}" required name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah Bus" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Keterangan: </span></h4>
									<input type="textarea" value="{{$order_bus->keterangan}}" required name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan">
								</div>

								<div class="form-group">
									<h4><span class="label label-default">Harga: </span></h4>
									<input type="number" value="{{$order_bus->harga}}" required name="harga" id="harga" class="form-control" placeholder="Harga" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Diskon (%) : </span></h4>
									<input type="number" value="{{$order_bus->diskon}}" required name="diskon" id="diskon" class="form-control" placeholder="Diskon" value="0" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Total: </span></h4>
									<input type="number" name="total" id="total" value="{{$order_bus->total}}" class="form-control">
								</div>
								
							</div>
					
				{{-- end form --}}
			</div>
			
			<button type="submit" class="btn btn-success center-block btn-block" style="border-radius:24px"><i class="fa fa-save"></i> Cetak Invoice</button>
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



  	</script>
@endsection