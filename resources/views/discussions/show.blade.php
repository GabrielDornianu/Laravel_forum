@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <img src="{{ $discussion->user->avatar }}" width="70"/>&nbsp;&nbsp;&nbsp;
    <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}, ( {{ $discussion->user->points }} )</b></span>
    @if($discussion->is_being_watched_by_auth_user())
      <a href="{{ route('discussion.unwatch', ['id' => $discussion->id]) }}" class="btn btn-default pull-right">Unwatch</a>
    @else
      <a href="{{ route('discussion.watch', ['id' => $discussion->id]) }}" class="btn btn-default pull-right">Watch</a>
    @endif
  </div>
  <div class="panel-body">
    <h4 class="text-center">{{ $discussion->title }}</h4>
    <p class="text-center">
      {{ str_limit($discussion->content, 50) }}
    </p>
  </div>
  <div class="panel-footer">
    @if($best_answer)
      <div class="text-center">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h1 class="text-center">BEST ANSWER</h1>
            <img src="{{ $best_answer->user->avatar }}" width="70"/>&nbsp;&nbsp;&nbsp;
          </div>
          <div class="panel-body">
            {{ $best_answer->content }}
          </div>
        </div>
      </div>
    @endif
    <p>
      {{ $discussion->replies->count() }} replies
    </p>
  </div>
</div>

@foreach($discussion->replies as $r)
<div class="panel panel-default">
  <div class="panel-heading">
    <img src="{{ $r->user->avatar }}" width="70"/>&nbsp;&nbsp;&nbsp;
    @if(! ($best_answer))
      @if(Auth::id() == $discussion->user->id)
        <a href="{{ route('discussion.best.answer', ['id' => $r->id]) }}" class="btn btn-primary btn-xs pull-right">Mark as best answer</a>
      @endif  
    @endif
  </div>
  <div class="panel-body">
    <p class="text-center">{{ $r->content }}</p>
  </div>
  <div class="panel-footer">
    @if($r->is_liked_by_auth_user())
      <a href="{{ route('reply.dislike', ['id' => $r->id]) }}" class="btn btn-danger">Unlike <span class="badge">{{ $r->likes->count() }}</span></a>
    @else
      <a href="{{ route('reply.like', ['id' => $r->id]) }}" class="btn btn-primary">Like <span class="badge">{{ $r->likes->count() }}</span></a>
    @endif
  </div>
</div>
@endforeach

@if(Auth::check())
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
@endif
@endsection
