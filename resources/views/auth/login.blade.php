@extends('layouts.admin')

@section('content')
<section class="container">
            <section class="login-form">
                <form method="post" action="{{route('login') }}" role="login">
                    {{ csrf_field() }}
                    <center>
                        <img src="{{asset('gambar/user.png')}}" width="120"/>
                    </center>
                        <hr>
                    <h2>Please sign in</h2>
                    <p>To enter in your private dashboard</p>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="text-primary glyphicon glyphicon-envelope"></span></div>
                            <input type="email" name="email" placeholder="Email address" required class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="text-primary glyphicon glyphicon-lock"></span></div>
                            <input type="password" name="password" placeholder="Password" required class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                    <button type="submit" name="go" class="btn btn-block btn-success">Sign in</button>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                    
                </form>
            </section>
    </section>

@endsection
