@extends('layouts.owner_view')
@section('content')
<section>
    <div class="container">
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{route('user.index')}}" type="button" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a><hr>
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{route('user.update', $users->id)}}">
                        @method('put')
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$users->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{$users->alamat}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Role</label>

                            <div class="col-md-6">
                                <input id="role" type="text" class="form-control" name="role" value="{{$users->roles->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="no_hp" class="col-md-4 control-label">No HP</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="text" class="form-control" name="no_hp" value="{{$users->no_hp}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $users->email }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="new password here" class="form-control" name="password" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-alt "></i> Edit
                                </button>
                            </div>
                        </div>
                        

                        
                    </form>    
                </div>
            </div>
        </div>
        </div>
        
    </div>
</section>
@endsection
@section('script')

@endsection 