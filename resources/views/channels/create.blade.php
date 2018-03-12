@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a new channel</div>

                <div class="panel-body">
                  <form action="{{ route('channels.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <input type="text" name="title" value="" class="form-control">
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
