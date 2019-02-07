@extends('layouts.master')

@section('title')
    Home Page
@endsection

@section('content')
    <div class="row my-5 justify-content-center">
        <div class="col-4">
            <h3>Sign Up</h3>
            <form action="{{ route('user.signup') }}" method="post">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                {{ csrf_field() }} 
            </form>
        </div>
        <div class="col-4">
            <h3>Sign In</h3>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Sign In</button>
                {{ csrf_field() }} 
            </form>
        </div>        
    </div>
@endsection
