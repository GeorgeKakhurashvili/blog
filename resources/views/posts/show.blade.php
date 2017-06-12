@extends('layouts.master')

@section('content')

    <div class="col-sm-8 blog-main">
      <div class="blog-post">
        <h2 class="blog-post-title">{{$post->title}}</h2>
        <p class="blog-post-meta">{{$post->user->name}} on {{$post->created_at->toFormattedDateString()}} </p>
        <hr>
        <p>{{$post->body}}</p>

      </div><!-- /.blog-post -->
      <div class="blog-post">
        <p class="blog-post-meta">Tags</p>
        @foreach($post->tags as $tag)
        <a href="/posts/tags/{{$tag->name}}">{{$tag->name}}</a>&nbsp&nbsp
        @endforeach
      </div>
      <div class="comments">
        <ul class="list-group">
          @foreach($post->comments as $comment)
            <li class="list-group-item">
              <strong>
                {{$comment->created_at->diffForHumans()}}
                <small style="font-size:12px;">{{$comment->user->name}}</small> :&nbsp
              </strong>

              {{$comment->body}}
            </li>
          @endforeach
        </ul>
      </div>
      <!--add comments  -->
      <hr>
      <div class="card">
        <div class="card-block">
          <form action="/comment/{{$post->id}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <input type="text" name="body" class="form-control" placeholder="Your Comment">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Comment</button>
            </div>
          </form>
        </div>
      </div>

    </div><!-- /.blog-main -->


@endsection
