@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : 'layouts.shuttle_view'))
@section('content')
<section>
	<div class="container">
		<hr>

		<div class="panel panel-default">
		<div class="panel-heading">
			Laporan
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">
			<a href="{{ URL::to('/laporan_shuttle/cetak_pdf') }}"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak</button></a><hr>
        
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>No Identitas</th>
							<th>Alamat</th>
							<th>Jurusan</th>
							<th>Tanggal Berangkat</th>
							<th>Harga</th>
							<th>Diskon</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order_shuttles as $o => $order_shuttle)
						<tr>
							<td>{{$o+1}}</td>
							<td>{{$order_shuttle->nama}}</td>
							<td>{{$order_shuttle->no_identitas}}</td>
							<td>{{$order_shuttle->alamat}}</td>
							<td>{{$order_shuttle->jurusan->jurusan}}</td>
							<td>{{$order_shuttle->tgl_berangkat}}</td>
							<td>{{$order_shuttle->harga}}</td>
							<td>{{$order_shuttle->diskon}}</td>
							<td>{{$order_shuttle->total}}</td>

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

                $.post("order_shuttle/"+id,access)
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