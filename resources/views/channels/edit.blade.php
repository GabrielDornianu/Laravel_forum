@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit the channel new channel</div>

                <div class="panel-body">
                  <form action="{{ route('channels.update', ['id' => $channel->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                      <input type="text" name="title" value="{{ $channel->title }}" class="form-control">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Save channel</button>
                    </div>
                  </from>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
