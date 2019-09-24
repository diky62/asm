@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container-fluid">

	<a href="{{ route('order_shuttle.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Edit Pemesanan
		</div>
		<div class="panel-body">
			<form class="form" action="{{ route('order_shuttle.update', $order_shuttle->id) }}" method="post" fid="orderForm">
			@method('put')
            @csrf
			<div class="row">
							<div class="panel-body">
								<div class="form-group">
									<h4><span class="label label-default">Nama : </span></h4>
									<input type="text" value="{{$order_shuttle->nama}}" required name="nama" class="form-control" placeholder="Nama Pemesan" onkeyup="this.value = this.value.toUpperCase()">
								</div>
								
                                <div class="form-group">
									<h4><span class="label label-default">alamat : </span></h4>
									<input type="textarea" value="{{$order_shuttle->alamat}}" required name="alamat" class="form-control" placeholder="Tujuan">
								</div>

                                <!-- <div class="form-group">
                                    <label for="role" class="col-md-4 control-label">Role</label>
                                        <select id="roles_id" class="form-control" name="roles_id">
                                    @foreach($jurusans as $role)
                                    <option value="{{ $role->id }}">{{ $role->jurusan }}</option>
                                    @endforeach
                                </div> -->

								<div class="form-group">
									<h4><span class="label label-default">Nomor Identitas : </span></h4>
									<input type="number" value="{{$order_shuttle->no_identitas}}" required name="no_identitas" class="form-control" placeholder="Penjemputan">
								</div>
            
								<!-- <div class="form-group">
									<h4><span class="label label-default">Jurusan: </span></h4>
									<select id="roles_id" class="form-control" name="jurusan_id">
                                    @foreach($jurusans as $jurusan)
                                    <option value="{{ $jurusan->id }}">{{ $jurusan->name }}</option>
                                    @endforeach
								</div> -->
                                
                                <div class="form-group">
									<h4><span class="label label-default">Jurusan : </span></h4>
									<select id="jurusan_id" class="form-control" name="jurusan_id">
                                    @foreach($jurusans as $role)
                                    <option harga="{{ $role->harga }}" value="{{ $role->id }}">{{ $role->jurusan }}</option>
                                    @endforeach
                                    </select>
								</div>

								<div class="form-group">
									<h4><span class="label label-default">Tanggal Keberangkatan: </span></h4>
									<input type="date" value="{{$order_shuttle->tgl_berangkat}}" required name="tgl_berangkat"  id="tgl_berangkat" class="form-control" placeholder="Harga">
								</div>

								<div class="form-group">
									<h4><span class="label label-default">Harga: </span></h4>
									<input type="number" value="{{$order_shuttle->Harga}}" required name="Harga" id="harga" class="form-control" placeholder="Harga" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Diskon (%) : </span></h4>
									<input type="number" value="{{$order_shuttle->diskon}}" required name="diskon" id="diskon" class="form-control" placeholder="Diskon" value="0" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Total: </span></h4>
									<input type="number" name="total" id="total" value="{{$order_shuttle->total}}" class="form-control">
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
	        var total = harga - (harga*(diskon/100));
	        $("#total").val(total);
	      });

	    });

	    $('#jurusan_id').on('change',function(){
	    	  // var harga = $(“#jurusan option:selected”).attr(lama);
		   // var harga = parseInt($("#jurusan").val());
		   var harga = $('#jurusan_id option:selected').attr('harga');
		    $('#harga').val(harga);
		});



  	</script>
@endsection