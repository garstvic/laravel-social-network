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
                    <div class="interaction" data-postid="{{ $post->getAttribute('id') }}">
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->getAttribute('id'))->first() ? Auth::user()->likes()->where('post_id', $post->getAttribute('id'))->first()->like == 1 ? 'You like this post' : 'Like' : 'Like' }}</a> |
                        <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->getAttribute('id'))->first() ? Auth::user()->likes()->where('post_id', $post->getAttribute('id'))->first()->like == 0 ? 'You don\'t like this post' : 'Dislike' : 'Dislike' }}</a> 
                        @if (strpos(Auth::user()->getAttribute('name'), $post->user->getAttribute('name')) === 0)
                            |
                            <a href="#" class="edit">Edit</a> |
                            <a href="{{ route('post.delete', ['post_id' => $post->getAttribute('id')]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <div class="modal" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" type="textarea" name="post-body" rows="5" id="post-body"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>   
    
    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('post.edit') }}';
        var urlLike = '{{ route('post.like') }}';
    </script>
@endsection
