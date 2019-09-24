@extends('layouts.owner_view')
@section('content')
<section>
	<div class="container">
		<a href="{{route('petugas.create')}}"><button type="button" class="btn btn-success"><i class="fa fa-pencil-alt "></i> Tambah User</button></a><hr>

		<div class="panel panel-default">
		<div class="panel-heading">
			Form User
		</div>
		{{-- end heading --}}
	
		<div class="panel-body">
        
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Role</th>
							<th>Alamat</th>
							<th>No Hp</th>
							<th>Email</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $u => $user)
						<tr>
							<td>{{$u+1}}</td>
							<td>{{$user->name}}</td>
							<td>{{$user->roles->name}}</td>
							<td>{{$user->alamat}}</td>
							<td>{{$user->no_hp}}</td>
							<td>{{$user->email}}</td>
							<td>
								<button type="button" class="btn btn-danger" onclick="destroy({{$user->id}})"><i class="fa fa-trash-o"></i>DELETE</button>
								<a href="{{route('petugas.edit', $user->id)}}" type="button" class="btn btn-warning"><i class="fa fa-edit"></i>EDIT</a>
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

                $.post("{{ url('petugas') }}/"+id,access)
                .done(res=>{
                    swal({
                        title:"Ok!",
                        text:"Data berhasil dihaps!",
                        type:"success"
                    }).then(result=>{
                        window.location = "{{ url('petugas') }}";
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