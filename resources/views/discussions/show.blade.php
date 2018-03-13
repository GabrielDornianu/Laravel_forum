@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <img src="{{ $discussion->user->avatar }}" width="70"/>&nbsp;&nbsp;&nbsp;
    <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
    <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" class="btn btn-default pull-right">View</a>
  </div>
  <div class="panel-body">
    <h4 class="text-center">{{ $discussion->title }}</h4>
    <p class="text-center">
      {{ str_limit($discussion->content, 50) }}
    </p>
  </div>
  <div class="panel-footer">
    <p>
      {{ $discussion->replies->count() }} replies
    </p>
  </div>
</div>

@foreach($discussion->replies as $r)
<div class="panel panel-default">
  <div class="panel-heading">
    <img src="{{ $r->user->avatar }}" width="70"/>&nbsp;&nbsp;&nbsp;
    <span>{{ $r->user->name }}, <b>{{ $r->created_at->diffForHumans() }}</b></span>
    <a href="{{ route('discussion', ['slug' => $r->slug]) }}" class="btn btn-default pull-right">View</a>
  </div>
  <div class="panel-body">
    <p class="text-center">{{ $r->content }}</p>
  </div>
  <div class="panel-footer">
    @if($r->is_liked_by_auth_user())
      <a href="/" class="btn btn-danger">Unlike</a>
    @else
      <a href="/" class="btn btn-primary">Like</a>
    @endif
  </div>
</div>
@endforeach

<div class="panel panel-default">
  <div class="panel-body">
    <form action="{{ route('discussion.reply', ['id' => $discussion->id]) }}" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="reply">Your reply</label>
        <textarea class="form-control" name="reply"></textarea>
      </div>
      <div class="form-group">
        <button class="btn btn-right">Leave a reply</button>
      </div>
    </form>
  </div>
</div>
@endsection
