@extends('layout')

@section('content')
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form method="post" action="{{ route('user.signup')}}">
                    @csrf
                    <div class="form-group mb-3">
                        <input placeholder="Name" type="text" name="name" class="form-control">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name')}}
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input placeholder="Email" type="email" name="email" class="form-control">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email')}}
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input placeholder="Password" type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password')}}
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="btn btn-dark btn-block">SignUp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection