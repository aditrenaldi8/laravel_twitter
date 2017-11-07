@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
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
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="content">
                <ul class="status">
                    @foreach($status as $data) 
                       @if($data->id == Auth::user()->id)
                    <li class="right clearfix"><span class="status-img pull-right">
                         @if($data->image == NULL)
                            <img src=" {{ '/assets/images/user.png' }}"  class="rounded" alt="not found">
                        @else   
                            <img src=" {{ $data->image }}" class="rounded" alt="not found">
                        @endif
                    </span>
                        <div class="status-body clearfix">
                            <div class="header">
                                <small class=" text-muted"><span class="glyphicon glyphicon-time">&nbsp;</span>{{ $data->created_at}}</small>
                                <strong class="pull-right primary-font"> {{ $data->name}}</strong>
                            </div>
                            <p>
                                {{ $data->status }}
                            </p>
                        </div>
                    </li>
                        @else
                    <li class="left clearfix"><span class="status-img pull-left">
                         @if($data->image == NULL)
                            <img src=" {{ '/assets/images/user.png' }}"  class="rounded" alt="not found">
                        @else   
                            <img src=" {{ $data->image }}" class="rounded" alt="not found">
                        @endif
                    </span>
                        <div class="status-body clearfix">
                            <div class="header">
                                <strong class="primary-font"> {{ $data->name}}</strong> <small class="pull-right text-muted">
                                    <span class="glyphicon glyphicon-time">&nbsp;</span>{{ $data->created_at}}</small>
                            </div>
                            <p>
                                {{ $data->status }}
                            </p>
                        </div>
                    </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
