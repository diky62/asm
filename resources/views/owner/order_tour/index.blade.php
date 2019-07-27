@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container">
		<a href="{{ route('ordertour.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Tambah Pesanan</button></a>
		<a href="{{ route('ordertour.pdf') }}"><button type="button" class="btn btn-warning"><i class="fa fa-print"></i> Download PDF</button></a><hr>

		<div class="panel panel-default">
		<div class="panel-heading">
			Paket Wisata
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">
        
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama Pemesan</th>
							<th>Tujuan</th>
							<th>Keterangan Tujuan</th>
							<th>Lokasi Penjemputan</th>
							<th>Jam Keberangkatan</th>
							<th>Tanggal Keberangkatan</th>
							<th>Tanggal Kembali</th>
                            <th>Jumlah Peserta</th>
							<th>Jumlah Bus</th>
                            <th>Keterangan  Bus</th>
							<th>Keterangan</th>
							<th>Harga</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                    @foreach($order_tour as $or => $ordertour)
						<tr>
							<td>{{$or+1}}</td>
							<td>{{$ordertour->nama_pemesan}}</td>
							<td>{{$ordertour->tujuan}}</td>
							<td>{{$ordertour->ket_tujuan}}</td>
							<td>{{$ordertour->penjemputan}}</td>
							<td>{{$ordertour->waktu_keberangkatan}}</td>
							<td>{{$ordertour->tgl_berangkat}}</td>
							<td>{{$ordertour->tgl_kembali}}</td>
							<td>{{$ordertour->jml_peserta}}</td>
                            <td>{{$ordertour->jml_bus}}</td>
                            <td>{{$ordertour->ket_bus}}</td>
							<td>{{$ordertour->keterangan}}</td>
							<td>{{$ordertour->harga}}</td>
							<td>{{$ordertour->total}}</td>
							<td>
							<button type="button" class="btn btn-danger" onclick="destroy({{$ordertour->id}})"><i class="fa fa-trash-o"></i>DELETE</button>
								<a href="{{route('ordertour.edit', $ordertour->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i>EDIT</a>
								<a href="{{route('ordertour.cetak', $ordertour->id)}}" type="button" class="btn btn-info"><i class="fa fa-edit"></i>CETAK</a>
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

                $.post("{{ url('ordertour') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Ok!",
                        text:"Data berhasil dihaps!",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('ordertour') }}";
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