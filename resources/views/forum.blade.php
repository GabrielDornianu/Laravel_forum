@extends('layouts.app')

@section('content')

  @foreach($d as $discussion)
    <div class="panel panel-default">
      <div class="panel-heading">
        <img src="{{ $discussion->user->avatar }}" width="70"/>&nbsp;&nbsp;&nbsp;
        <span>{{ $discussion->user->name }}, <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
        @if($discussion->has_best_answer())
          <span class="btn btn-default pull-right btn-xs">closed</span>
        @else
          <span class="btn btn-danger pull-right btn-xs">open</span>
        @endif
        <a href="{{ route('discussion', ['slug' => $discussion->slug]) }}" class="btn btn-default pull-right btn-xs">View</a>
      </div>
      <div class="panel-body">
        <h4 class="text-center">{{ $discussion->title }}</h4>
        <p class="text-center">
          {{ str_limit($discussion->content, 50) }}
        </p>
      </div>
      <div class="panel-footer">
        <span>
          {{ $discussion->replies->count() }} replies
        </span>
        <a class="pull-right btn btn-default btn-xs" href="{{ route('channel', ['slug' => $discussion->channel->slug]) }}">{{ $discussion->channel->title }}</a>
      </div>
    </div>
  @endforeach
  <div class="text-center">
    {{ $d->links() }}
  </div>
@endsection
