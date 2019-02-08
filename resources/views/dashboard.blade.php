@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    @include('includes.message')
    <section class="row new-post my-5 justify-content-center">
        <div class="col-md-6">
            <header>
                <h3>What do you have to say?</h3>
            </header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group">
                    <textarea name="body" id="body" rows="5" class="form-control" placeholder="Your Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                {{ csrf_field() }} 
            </form>
        </div>
    </section>
    <section class="row posts justify-content-center">
        <div class="col-md-6">
            <header>
                <h3>What other people say...</h3>
            </header>
            <article class="post my-3">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae laborum laboriosam voluptas eius, molestiae voluptatibus fugit culpa. Dolorum ea natus inventore totam, praesentium harum officiis expedita incidunt laudantium, quas soluta!</p>
                <div class="info">
                    Posted by User of 8 Feb 2018
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>
            <article class="post my-3">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae laborum laboriosam voluptas eius, molestiae voluptatibus fugit culpa. Dolorum ea natus inventore totam, praesentium harum officiis expedita incidunt laudantium, quas soluta!</p>
                <div class="info">
                    Posted by User of 8 Feb 2018
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a>
                </div>
            </article>            
        </div>
    </section>
@endsection