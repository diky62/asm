@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : 'layouts.shuttle_view'))
@section('content')
<section>
	<div class="container">
		<a href="{{ route('orderbus.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Tambah Pesanan</button></a><hr>

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
							<th>Tujuan</th>
							<th>Lokasi Penjemputan</th>
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
						@foreach($order_bus as $o => $orderbus)
						<tr>
							<td>{{$o+1}}</td>
							<td>{{$orderbus->nama_pemesan}}</td>
							<td>{{$orderbus->tgl_berangkat}}</td>
							<td>{{$orderbus->tujuan}}</td>
							<td>{{$orderbus->penjemputan}}</td>
							<td>{{$orderbus->keterangan_lokasi}}</td>
							<td>{{$orderbus->waktu_keberangkatan}}</td>
							<td>{{$orderbus->tgl_berangkat}}</td>
							<td>{{$orderbus->tgl_kembali}}</td>
							<td>{{$orderbus->jumlah}}</td>
							<td>{{$orderbus->keterangan}}</td>
							<td>{{$orderbus->harga}}</td>
							<td>{{$orderbus->total}}</td>
							<td>
							<button type="button" class="btn btn-danger" onclick="destroy({{$orderbus->id}})"><i class="fa fa-trash"></i> DELETE</button>
								<a href="{{route('orderbus.edit', $orderbus->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i> EDIT</a>
								<a href="{{route('orderbus.cetak', $orderbus->id)}}" type="button" class="btn btn-info"><i class="fa fa-print"></i> CETAK</a>
								<a href="{{ route('pembayaran_bus',$orderbus->id) }}" type="button" class="btn btn-success"><i class="fa fa-edit"></i> PEMBAYARAN</a>

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

                $.post("{{ url('orderbus') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Ok!",
                        text:"Data berhasil dihaps!",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('orderbus') }}";
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