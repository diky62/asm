@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : 'layouts.shuttle_view'))
@section('content')
<section>
	<div class="container">
		<a href="{{ route('order_bus.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Tambah Pesanan</button></a><hr>

		<div class="panel panel-default">
		<div class="panel-heading">
			Form Order Bus
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">
        
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Peminjam</th>
							<th>Tanggal Keberangkatan</th>
							<th>Lokasi Penjemputan</th>
							<th>Tujuan</th>
							<th>Keterangan Lokasi</th>
							<th>Jam Keberangkatan</th>
							<th>Tanggal Keberangkatan</th>
							<th>Tanggal Kembali</th>
							<th>Jumlah Bus</th>
							<th>Keterangan</th>
							<th>Harga</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						{{-- @foreach($order_shuttles as $o => $order_shuttle)
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
							<td>
								<button type="button" class="btn btn-danger" onclick="destroy({{$order_shuttle->id}})"><i class="fa fa-trash"></i> Delete</button>

								<form id="delete{{$order_shuttle->id}}" action="{{ route('order_shuttle.destroy',$order_shuttle->id) }}" method="post">
									<input type="hidden" name="_method" value="delete">
									<input type="hidden" name="id" value="{{$order_shuttle->id}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
								</form>
							</td>
						</tr>
						@endforeach --}}
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