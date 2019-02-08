@extends('layouts.master')

@section('title')
    Home Page
@endsection

@section('content')
    @if ($errors->hasBag())
        <div class="row my-5 justify-content-center">
            <div class="col-md-5">
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="row my-5 justify-content-center">
        <div class="col-4">
            <h3>Sign Up</h3>
            <form action="{{ route('user.signup') }}" method="post">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" class="form-control {{ count(Request::old()) == 4 ? ($errors->has('email') ? 'is-invalid' : (strlen(Request::old('email')) ? 'is-valid' : '')) : '' }}" name="email" id="email" value="{{ count(Request::old()) == 4 ? Request::old('email') : '' }}">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control {{ count(Request::old()) == 4 ? ($errors->has('name') ? 'is-invalid' : (strlen(Request::old('name')) ? 'is-valid' : '')) : '' }}" name="name" id="name" value="{{ count(Request::old()) == 4 ? Request::old('name') : '' }}">
                </div>                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control {{ count(Request::old()) == 4 ? ($errors->has('password') ? 'is-invalid' : '') : ''}}" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{ csrf_field() }} 
            </form>
        </div>
        <div class="col-4">
            <h3>Sign In</h3>
            <form action="{{ route('user.signin') }}" method="post">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" class="form-control {{ count(Request::old()) == 3 ? ($errors->has('email') ? 'is-invalid' : (strlen(Request::old('email')) ? 'is-valid' : '')) : '' }}" name="email" id="email" value="{{ count(Request::old()) == 3 ? Request::old('email') : '' }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control {{ count(Request::old()) == 3 ? ($errors->has('password') ? 'is-invalid' : '') : '' }}" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
                {{ csrf_field() }} 
            </form>
        </div>        
    </div>
@endsection
