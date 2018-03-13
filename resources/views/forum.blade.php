@extends('layouts.app')

@section('content')

  @foreach($d as $discussion)
    <div class="panel panel-default">
      <div class="panel-heading">
        <img src="{{ $discussion->user->avatar }}" width="70"/>&nbsp;&nbsp;&nbsp;
        <span>{{ $discussion->user->name }}</span>
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
  @endforeach
  <div class="text-center">
    {{ $d->links() }}
  </div>
@endsection
