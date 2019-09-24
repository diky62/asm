@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container">
		<a href="{{ route('harga_bus.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Tambah Pesanan</button></a>
		<hr>
		@if ($message = Session::get('success'))
	      <div class="alert alert-success alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button> 
	          <strong>{{ $message }}</strong>
	      </div>
	    @endif

	    @if ($message = Session::get('error'))
	      <div class="alert alert-danger alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button> 
	        <strong>{{ $message }}</strong>
	      </div>
	    @endif

	    @if ($message = Session::get('warning'))
	      <div class="alert alert-warning alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button> 
	        <strong>{{ $message }}</strong>
	    </div>
	    @endif

	    @if ($message = Session::get('info'))
	      <div class="alert alert-info alert-block">
	        <button type="button" class="close" data-dismiss="alert">×</button> 
	        <strong>{{ $message }}</strong>
	      </div>
	    @endif

	    @if ($errors->any())
	      <div class="alert alert-danger">
	        <button type="button" class="close" data-dismiss="alert">×</button> 
	        Please check the form below for errors
	    </div>
	    @endif
    
		<div class="panel panel-default">
		<div class="panel-heading">
			Form Harga
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">
			        
        	<center><h3>Data Harga</h3></center>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Tujuan</th>
							<th>Harga Batas Atas</th>
							<th>Harga Batas Bawah</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($harga_bus as $a => $harga_bus)
						<tr>
							<td>{{$a+1}}</td>
							<td>{{$harga_bus->tujuan}}</td>
							<td>{{ number_format($harga_bus->harga_atas,0,".",".") }}</td>
							<td>{{ number_format($harga_bus->harga_bawah,0,".",".") }}</td>
							<td>

								<button type="button" class="btn btn-danger" onclick="destroy({{$harga_bus->id}})"><i class="fa fa-trash"></i> Delete</button>
								<a href="{{route('harga_bus.edit', $harga_bus->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i> EDIT</a>

								<form id="delete{{$harga_bus->id}}" action="{{ route('harga_bus.destroy',$harga_bus->id) }}" method="post">
									<input type="hidden" name="_method" value="delete">
									<iput type="hidden" name="id" value="{{$harga_bus->id}}">
									<innput type="hidden" name="_token" value="{{csrf_token()}}">
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
					
				</table>		
			</div>
			

		</div>
		{{-- end body --}}
	</div>

	</div>
</section>
@endsection
@section('script')
<script type="text/javascript">

$(document).ready(function(){

$("table").DataTable();

});

const destroy = (id)=>{
        swal({
            type:"warning",
            title:"Apakah anda yakin ?",
            text:"",
            showCancelButton:true,
            cancelButtonColor:"#d33",
            confirmButtonText:"Ya",
            confirmButtonColor:"#3085d6"
        }).then(result=>{
            if(result.value){
                let access = {
                 
                    _method:"delete",
                    _token:"{{ csrf_token() }}"
                }

                $.post("harga_bus/"+id,access)
                .done(res=>{
                    swal({
                        title:"Ok!",
                        text:"Data berhasil dihaps!",
                        type:"success"
                    }).then(result=>{
                        window.location.reload();
                    });
                })
                .fail(err=>{
                     console.log(err);
                });
            }
        });
    }
// end ready
</script>
@endsection