@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : 'layouts.shuttle_view'))
@section('content')
<section>
	<div class="container">
	<a href="{{ route('orderbus.index') }}"><button type="button" class="btn btn-success">Back</button></a><hr>
	<div class="panel panel-default">
		<div class="panel-heading">
			Request & Memo
		</div>
		{{-- end heading --}}
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Image</th>
							<th>Tanggal</th>
            				<th>Nama Pemesan</th>
							<th>Item Pesanan</th>
              				<th>Penanggung Jawab</th>
              				<th>Keterangan</th>
              				<th>Action</th>
						</tr>

			            <tbody>
			                @foreach($pembayaran as $p => $pembayaran)
			                <!-- @php
							setlocale (LC_TIME, 'ID');
							$date = strftime( "%d %B %Y", strtotime($item->date));
							@endphp -->
			                <tr>
			                  <td>{{$p+1}}</td>
			                  <!-- <td></td>
			                  <td>{{$date}}</td>
			                  <td>{{$pembayaran->order->nama_pemesan}}</td>
			                  <td>{{$item->item_list->name}}</td>
			                  <td>{{$item->person}}</td>
			                  <td>{{$item->description}}</td>
			                  <td>
				                  	<span data-toggle="modal" data-target="#modalPrint" >
										<a type="button" class="btn btn-success " ><i class="fa fa-print"></i> Print</a>
									</span>
							</td> -->
			                </tr>
			                @endforeach
			            </tbody>
					</thead>
					
				</table>		
			</div>
		</div>
		{{-- end body --}}
	</div>

	</div>
	{{-- end container --}}
</section>
@endsection
@section('script')
	<script type="text/javascript">
	    $(document).ready(function(){
	      $("#diskon").keyup(function(){
	        var harga  = parseInt($("#harga").val());
	        var diskon  = parseInt($("#diskon").val());
	        var total = harga - (harga*(diskon/100));
	        $("#total").val(total);
	      });

	    });



  	</script>
@endsection