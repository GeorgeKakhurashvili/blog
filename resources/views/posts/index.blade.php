@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
      @forelse($posts as $post)
      <div class="blog-post">
        <a href="/posts/{{$post->id}}">
          <h2 class="blog-post-title">{{$post->title}}</h2>
        </a>
        <p class="blog-post-meta">{{$post->user->name}} on {{$post->created_at->toFormattedDateString()}} </p>
        <hr>
        <p>{{$post->body}}</p>

      </div><!-- /.blog-post -->
      @empty
        <div class="alert alert-danger">
          პოსტები არ მოიძებნა
        </div>
      @endforelse
      <nav>
        
      </nav>

    </div><!-- /.blog-main -->


@endsection
