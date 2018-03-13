@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Create a new discussion</div>
    <div class="panel-body">
      <form action="{{ route('discussions.store') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="channel">Pick a channel</label>
          <select name="channel_id" class="form-control">
            @foreach($channels as $channel)
              <option value="channel_id">{{ $channel->title }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="content">Ask a question</label>
          <textarea name="content" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Add discussion</button>
        </div>
      </form>
    </div>
</div>
@endsection
