@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">
			Form Kota
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">
			<form method="POST" action="{{ route('asal_tujuan.store') }}" >
	                        {{ csrf_field() }}

				<div class="form-group">
					<span class="label label-default">Asal </span>
		            <select class="form-control" name="asal">
                        @foreach($kotas as $kota)
						<option value="{{ $kota->id }}">{{ $kota->name }}</option>
						@endforeach 
                    </select>
		        </div>
		        <div class="form-group">
					<span class="label label-default">Tujuan </span>
		            <select class="form-control" name="tujuan">
                        @foreach($kotas as $kota)
						<option value="{{ $kota->id }}">{{ $kota->name }}</option>
						@endforeach 
                    </select>
		        </div>
		        <button type="submit" class="btn btn-success center-block btn-block"><i class="fa fa-save "></i>  Submit</button>
	        </form>
        <hr>
        
        	<center><h3>Kota</h3></center>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Asal</th>
							<th>Tujuan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($asal_tujuans as $a => $asal_tujuan)
						<tr>
							<td>{{$a+1}}</td>
							<td>{{$asal_tujuan->asal_id}}</td>
							<td>{{$asal_tujuan->tujuan_id}}</td>
							<td>
								{{-- <button type="button" class="btn btn-danger" onclick="destroy({{$kota->id}})"><i class="fa fa-trash"></i> Delete</button>

								<form id="delete{{$kota->id}}" action="{{ route('asal_tujuan.destroy',$kota->id) }}" method="post">
									<input type="hidden" name="_method" value="delete">
									<input type="hidden" name="id" value="{{$kota->id}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
								</form> --}}
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

                $.post("asal_tujuan/"+id,access)
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