@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
@section('content')
<section>
	<div class="container">
		
		<a href="{{ route('laporan_shuttle.index') }}"><button type="button" class="btn btn-success" name="button"><i class="fa fa-arrow-left"></i> Back</button></a> <br>

						<?php  
						setlocale (LC_TIME, 'id_ID');
						$date_awal = strftime( " %d %B %Y", strtotime($a));
						$date_akhir = strftime( " %d %B %Y", strtotime($b));
						?>
					<h4>
			Data Periode dari tanggal {{$date_awal}} Sampai {{$date_akhir}}
			</h4>
			<div class="row">
            <div class="col-lg-8 col-sm-12">
              <div class="row">
                <div class="col-sm-6">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <div class="row">
                        <div class="col-xs-9">
                          <div class="huge">
                            {{$jumlah_pesanan}}
                          </div>
                          <div>
                           Jumlah Pesanan
                          </div>
                        </div>
                        <div class="col-xs-3 text-right">
                          <i class="fa fa-bus-alt fa-5x"></i>
                        </div>
                      </div>
                    </div><a href="#">
                    <div class="panel-footer">
                     
                      <div class="clearfix"></div>
                    </div></a>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="panel panel-green panel-primary">
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
                        	<i class="fa fa-money-bill-alt fa-5x"></i>
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
    <hr> 

		<div class="panel panel-default">
		<div class="panel-heading">
			Laporan
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">



			<!-- <a href="{{ route('laporan_shuttle.pdf') }}"><button type="button" class="btn btn-warning"><i class="fa fa-print"></i> Download PDF</button></a><hr>
			<input type="date" id="tgl_awal" name="tgl_awal" class="form-control" value="{{$a}}">
			<input type="hidden" id="tgl_akhir" name="tgl_akhir" class="form-control" value="{{$b}}" > -->
        
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
							@php
								setlocale (LC_TIME, 'id_ID');
								$date = strftime( "%d %B %Y", strtotime($order_shuttle->tgl_berangkat));
								$date1 = strftime( " %d %B %Y", time());
								
							@endphp
							<td>{{$o+1}}</td>
							<td>{{$order_shuttle->nama}}</td>
							<td>{{$order_shuttle->no_identitas}}</td>
							<td>{{$order_shuttle->alamat}}</td>
							<td>{{$order_shuttle->jurusan->jurusan}}</td>
							<td>{{$date}}</td>
							<td>{{$order_shuttle->Harga}}</td>
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