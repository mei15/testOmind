@extends('layouts.auth')

@section('content')
<div class="card">
    <div class="card-body">

      

        <div class="p-3">
            <h4 class="text-muted font-18 m-b-5 text-center">Selamat Datang! SILAHKAN LOGIN</h4>
           
            <form class="form-horizontal m-t-30" action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name='email' id="email" placeholder="Masukkan Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="userpassword">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name='password' id="userpassword" placeholder="Enter password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row m-t-20">
                    <div class="col-sm-6">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            
                        </div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection