@extends('layouts.master')

@section('content')

<div class="col-sm-8 blog-main">

  <h1>Create Post</h1>

  <hr>
  @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
    </div>
  @endif
  @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
  @endif
  <form action="/posts" method="post">
    {{csrf_field()}}
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
    </div>
    <div class="form-group">
      <label for="body">Body</label>
      <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
    </div>
    <div class="form-group">
      <label for="tags">Tags,<small style="font-size:11px;">Write tags with comma</small></label>
      <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Publish</button>
    </div>
  </form>
</div>


@endsection
