@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container-fluid">

	<a href="{{ route('harga_bus.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Harga
		</div>
		<div class="panel-body">
			<form class="form" action="{{ route('harga_bus.store') }}" method="post" fid="orderForm">
			@csrf
			<div class="row">
							<div class="panel-body">
								<div class="form-group">
									<h4><span class="label label-default">Tujuan: </span></h4>
									<input type="text" required name="tujuan" class="form-control" placeholder="Nama Tujuan" onkeyup="this.value = this.value.toUpperCase()">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Harga Batas Atas : </span></h4>
									<input type="text" required name="harga_atas" class="form-control" placeholder="Harga batas Atas" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Harga Batas Bawah : </span></h4>
									<input type="text" required name="harga_bawah" class="form-control" placeholder="Harga Batas Bawah" onkeypress="return hanyaAngka(event)">
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
	    // $(document).ready(function(){
	    //   $("#diskon").keyup(function(){
	    //     var harga  = parseInt($("#harga").val());
	    //     var diskon  = parseInt($("#diskon").val());
	    //     var total = harga - (harga*(diskon/100));
	    //     $("#total").val(total);
	    //   });

	    // });



  	</script>
@endsection