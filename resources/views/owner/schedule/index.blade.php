@extends(Auth::user()->roles_id == 1 ? 'layouts.owner_view' : (Auth::user()->roles_id == 2 ? 'layouts.shuttle_view' : (Auth::user()->roles_id == 3 ? 'layouts.pariwisata_view' : 'layouts.pariwisata_view' )))
 
@section('content')
<section>
	<div class="container">
		<div id="calendar"></div>
</div>

</section>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pesanan Acara</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
        	<thead>
        		<tr>
        			<td>No.</td>
        			<td>Nama Pemesan</td>
        			<td>Tanggal Keberangkatan</td>
                    <td>Tanggal Kembali</td>
					<td>Jam keberangkatan</td>
        			<td>Tempat Penjemputan</td>
                    <td>Tempat Tujuan</td>
                    <td>Keterangan Lokasi</td>
                    <td>Jumlah Armadda</td>
                    <td>Keterangan</td>
        		</tr>
        	</thead>
        	<tbody id="contentAcara">

        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function() {

    // page is now ready, initialize the calendar...
    const data=[];
    const order_bus = {!! $order_bus !!};
    const order_tour = {!! $order_tour !!};

    console.log(order_bus,order_tour);

    $.each(order_bus,(key,i)=>{
        data.push({
            title:'Sewa Bus '+i.tujuan,
            start:i.tgl_berangkat,
            end:i.tgl_kembali,
            id:'i'+i.id,
            acara:i.nama_pemesan,
            tanggal_berangkat:i.tgl_berangkat,
            tanggal_kembali:i.tgl_kembali,
            jam:i.waktu_keberangkatan,
            tempat:i.penjemputan,
            tujuan:i.tujuan,
            lokasi:i.keterangan_lokasi,
            jumlah:i.jumlah,
            keterangan:i.keterangan,

        });
    });

        $.each(order_tour,(index,a)=>{
        data.push({
            title:'Paket Wisata '+a.tujuan,
            start:a.tgl_berangkat,
            end:a.tgl_kembali,
            color: '#19c515',
            id:'a'+a.id,
            acara:a.nama_pemesan,
            tanggal_berangkat:a.tgl_berangkat,
            tanggal_kembali:a.tgl_kembali,
            jam:a.waktu_keberangkatan,
            tempat:a.penjemputan,
            tujuan:a.tujuan,
            lokasi:a.ket_tujuan,
            jumlah:a.jml_bus,
            keterangan:a.keterangan,


        });
    });

    // $.each(acaras,(index,a)=>{
    //     data.push({
    //         title:'Acara '+a.order.nama_pemesan,
    //         start:a.tanggal,
    //         id:'a'+a.id,
    //         acara:a.acara,
    //         tanggal:a.tanggal,
    //         jam:a.jam,
    //         tempat:a.tempat
    //     });
    // });

    // $.each(items,(index,i)=>{
    //     data.push({
    //         title:'Pesanan '+i.order.nama_pemesan,
    //         start:i.date,
    //         id:'i'+i.id,
    //         acara:i.person+' mengerjakan '+i.item_list.name,
    //         tanggal:i.date,
    //         jam:i.time,
    //         tempat:i.place
    //     });
    // });

    $('#calendar').fullCalendar({
        lang:'id',
        events : data,
        eventClick:function(event){
        	if(event.id){
        		$("#contentAcara").html("");
        		$("#myModal").modal();
        		$("#content").text(event.id);
        		let selected = data.filter(function(i){
        			return i.id == event.id;
        		});
        		console.log(selected);
        		$.each(selected,function(key,i){
        			key+=1;
        			$("#contentAcara").append("\
        				<tr>\
							<td>"+key+"</td>\
							<td>"+this.acara+"</td>\
							<td>"+new Date(this.tanggal_berangkat).toLocaleString('id-ID',{ weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })+"</td>\
							<td>"+new Date(this.tanggal_kembali).toLocaleString('id-ID',{ weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })+"</td>\
							<td>"+this.jam+"</td>\
							<td>"+this.tempat+"</td>\
							<td>"+this.tujuan+"</td>\
							<td>"+this.lokasi+"</td>\
							<td>"+this.jumlah+"</td>\
							<td>"+this.keterangan+"</td>\
						</tr>\
        				");
        		});
        	}
        }
    });

});
</script>
@endsection


