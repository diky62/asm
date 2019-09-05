@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container">
		<a href="{{ route('order_shuttle.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i> Tambah Pesanan</button></a>
		<a href="{{ route('laporan_shuttle.pdf') }}"><button type="button" class="btn btn-warning"><i class="fa fa-print"></i> Download PDF</button></a><hr>



<!-- <div class="row">
            <div class="col-lg-8 col-sm-12">
              <div class="row">
                <div class="col-sm-6">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xs-9">
                          <div class="huge">
                            {{$a}}
                          </div>
                          <div>
                            Pesanan
                          </div>
                        </div>
                        <div class="col-xs-3 text-right">
                          <i class="fa fa-cogs fa-5x"></i>
                        </div>
                      </div>
                    </div><a href="#">
                    <div class="panel-footer">
                     
                      <div class="clearfix"></div>
                    </div></a>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xs-9">
                          <div class="huge">
                            {{number_format($total,0,".",".")}}
                          </div>
                          <div>
                            Pendapatan
                          </div>
                        </div>
                        <div class="col-xs-3 text-right">
                          <i class="fa fa-cogs fa-5x"></i>
                        </div>
                      </div>
                    </div><a href="#">
                    <div class="panel-footer">
                      
                      <div class="clearfix"></div>
                    </div></a>
                  </div>
                </div>
            </div>          
        </div>
    </div>
 -->
 

		<div class="panel panel-default">
		<div class="panel-heading">
			Form Order Shuttle 
		</div>
		{{-- end heading --}}


	
		<div class="panel-body">
        
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
							<th>Action</th>
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
							<td>{{$order_shuttle->Harga}}</td>
							<td>{{$order_shuttle->diskon}}</td>
							<td>{{$order_shuttle->total}}</td>
							<td>
								<button type="button" class="btn btn-danger" onclick="destroy({{$order_shuttle->id}})"><i class="fa fa-trash"></i> Delete</button>

								<form id="delete{{$order_shuttle->id}}" action="{{ route('order_shuttle.destroy',$order_shuttle->id) }}" method="post">
									<input type="hidden" name="_method" value="delete">
									<input type="hidden" name="id" value="{{$order_shuttle->id}}">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
								</form>
								<a href="{{route('order_shuttle.edit', $order_shuttle->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i>EDIT</a>
								<a href="{{route('order_shuttle.cetak', $order_shuttle->id)}}" type="button" class="btn btn-info"><i class="fa fa-edit"></i>CETAK</a>
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