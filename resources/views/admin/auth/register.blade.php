@extends('admin.auth.template')

@section('title', 'Register')

@section('content')
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                </div>
                                <form class="user" action="{{ route('register-process') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="name" id="name"
                                            placeholder="Name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
        
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" id="email"
                                            placeholder="Email Address" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
        
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="inputPassword" placeholder="Password">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                name="password_confirmation" id="repeatPassword" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection