@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>

	<div class="container">
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
			Form Jurusan
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">
			<form method="POST" action="{{ route('jurusan.store') }}" >
	                        {{ csrf_field() }}

				<div class="form-group">
					<span class="label label-default">Jurusan </span>
		            <input type="text" name="jurusan" id="jurusan" class="form-control" onkeyup="myFunction()">
		        </div>
		        <div class="form-group">
					<span class="label label-default">Harga </span>
		            <input type="number" name="harga" id="harga" class="form-control" onkeypress="return hanyaAngka(event)">
		        </div>
		        <button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-save "></i>  Submit</button>
	        </form>
        <hr>
        
        	<center><h3>Jurusan</h3></center>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Jurusan</th>
							<th>Harga</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($jurusans as $a => $jurusan)
						<tr>
							<td>{{$a+1}}</td>
							<td>{{$jurusan->jurusan}}</td>
							<td>{{ number_format($jurusan->harga,0,".",".") }}</td>
							<td>
								<button type="button" class="btn btn-danger" onclick="destroy({{$jurusan->id}})"><i class="fa fa-trash"></i> Delete</button>

								<form id="delete{{$jurusan->id}}" action="{{ route('jurusan.destroy',$jurusan->id) }}" method="post">
									<input type="hidden" name="_method" value="delete">
									<input type="hidden" name="id" value="{{$jurusan->id}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
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
            text:"Dengan menghapus salah satu data di tabel asal atau tujuan secara otomatis data di tabel asal dan tujuan akan terhapus",
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

                $.post("jurusan/"+id,access)
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