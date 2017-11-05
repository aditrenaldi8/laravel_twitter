@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="panel-body">
                    <div class="content">
                        <form action="{{ url ('/add') }}" method="POST">
                        {{ csrf_field() }}
                            <div class="form-group">
                               <input type="text" name="status" class="form-control" placeholder="Update Status"> 
                            </div>
                    
                            <button type="submit" class="btn btn-primary pull-right">
                                Update Status
                            </button> 
                        </form>
                    </div>
                </div>
            </div>
            <div class="content">
                @foreach($status as $data)
                    <div>
                        {{ $data->user->name}}
                        {{ $data->status }}
                    <div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
