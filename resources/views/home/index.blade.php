@extends('_layout.html_single')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="m-sm-4">
                <div class="row mb-5">
                    <div class="col-6">
                        <img src="{{ URL::asset('image/app/astra-motor-logo.png') }}" alt="Astra Motor"  width="50%" />
                    </div>
                    <div class="col-6 text-end">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <img src="{{ URL::asset('image/app/merapi-high-resolution-logo-color-on-transparent-background.png') }}" alt="Linda Miller" class="img-fluid" width="150" height="40" />
                    </div>
                </div>
                <br />
                <form method="post" action="{{ route('auth.login_process') }}">
                    @csrf

                    <div class="form-floating mb-3">
                        <input class="form-control" name="username" placeholder="Username">
                        <label for="username">Username</label>
                    </div>

                    <div class="input-group mb-3">
                        <div class="form-floating flex-grow-1">
                            <input type="password" class="form-control" name="password" placeholder="password">
                            <label for="password">Password</label>
                        </div>
                        <span class="input-group-text "><i toggle="#password-field" class="fas fa-fw fa-eye-slash toggle-password"></i></span>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-lg btn-primary ">Sign in</button>
                    </div>
                
                </form>
            </div>
        </div>
    </div>
@endsection
