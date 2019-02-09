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
            @foreach ($posts as $post)
                <article class="post my-3">
                    <p>{{ $post->getAttribute('body') }}</p>
                    <div class="info">
                        Posted by {{ $post->user->getAttribute('name') }} on {{ $post->getAttribute('created_at') }}
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a> 
                        @if (strpos(Auth::user()->getAttribute('name'), $post->user->getAttribute('name')) === 0)
                            |
                            <a href="#" id="post-id" data-postid="{{ $post->id }}">Edit</a> |
                            <a href="{{ route('post.delete', ['post_id' => $post->getAttribute('id')]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection
