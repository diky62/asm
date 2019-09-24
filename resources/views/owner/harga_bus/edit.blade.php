@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container-fluid">

	<a href="{{ route('harga_bus.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a><hr>

	<div class="panel panel-default">
		<div class="panel-heading">
			Form Edit Harga
		</div>
		<div class="panel-body">
			<form class="form" action="{{ route('harga_bus.update', $harga_bus->id) }}" method="post" fid="orderForm">
			@method('put')
            @csrf
			<div class="row">
							<div class="panel-body">
								<div class="form-group">
									<h4><span class="label label-default">Tujuan: </span></h4>
									<input type="text" required name="tujuan" value="{{$harga_bus->tujuan}}" class="form-control" placeholder="Nama Tujuan" onkeyup="this.value = this.value.toUpperCase()">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Harga Batas Atas : </span></h4>
									<input type="text" required value="{{$harga_bus->harga_atas}}" name="harga_atas" class="form-control" placeholder="Harga batas Atas" onkeypress="return hanyaAngka(event)">
								</div>
								<div class="form-group">
									<h4><span class="label label-default">Harga Batas Bawah : </span></h4>
									<input type="text" required value="{{$harga_bus->harga_bawah}}" name="harga_bawah" class="form-control" placeholder="Harga Batas Bawah" onkeypress="return hanyaAngka(event)">
								</div>
								
								
							</div>
					
				{{-- end form --}}
			</div>
			
			<button type="submit" class="btn btn-success center-block btn-block" style="border-radius:24px"><i class="fa fa-save"></i> EDIT</button>
			</form>
		</div>
				
	</div>
	{{-- end main panel --}}

</div>
{{-- end container --}}
</section>
@endsection
@section('script')
	
@endsection