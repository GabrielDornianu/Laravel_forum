@extends('layouts.app')

@section('content')

  @foreach($d as $discussion)
    <div class="panel panel-default">
      <div class="panel-heading">
        <img src="{{ $discussion->user->avatar }}" width="70"/>
      </div>
      <div class="panel-body">
        {{ $discussion->content }}
      </div>
    </div>
  @endforeach
  <div class="text-center">
    {{ $d->links() }}
  </div>
@endsection
