@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <section class="row new-post my-5 justify-content-center">
        <div class="col-md-4">
            <header></header>
            <form action="{{ route('account.update') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <lable for="name">Name</lable>
                    <input type="text" name="name" class="form-control" value="{{ $user->getAttribute('name') }}" id="name">
                </div>
                <div class="form-group">
                    <lable for="image">Image (only .jpg)</lable>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                {{ csrf_field() }}
            </form>
        </div>
    </section>
    @if (Storage::disk('local')->has($user->getAttribute('name').'-'.$user->getAttribute('id').'.jpg'))
        <section class="row new-post my-5 justify-content-center">
            <div class="col-md-4">
                <img src="{{ route('account.image', ['filename' => $user->getAttribute('name').'-'.$user->getAttribute('id').'.jpg']) }}" alt="" class="img-fluid"></div>
        </section>
    @endif
@endsection