@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">
			Laporan
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">
			<form method='post' action="{{ route('laporan_shuttle.show') }}">
            @csrf
		      <div class="row form-group">
		         <div class="col col-md-2"><label for="text-input" class="form-control-label">Dari Tanggal</label></div>
		          <div class="col-12 col-md-10">
		            <input type="date" id="tgl_pinjam" name="tgl_awal" class="form-control">
		          </div>
		      </div>
		      <div class="row form-group">
		        <div class="col col-md-2"><label for="text-input" class="form-control-label">Sampai Tanggal</label></div>
		          <div class="col-12 col-md-10"><input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control"></div>
		      </div>
		   
		       <button type="submit" class="btn btn-info center-block btn-block"><i class="fa fa-zoom"></i> Cari</button> 
		    </form>
        <hr>
        
        	{{-- <center><h3>Kota</h3></center>
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Jurusan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($jurusans as $a => $jurusan)
						<tr>
							<td>{{$a+1}}</td>
							<td>{{$jurusan->jurusan}}</td>
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
			</div> --}}
			

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