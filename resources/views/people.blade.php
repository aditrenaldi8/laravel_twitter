@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="content">
                <h4 class="margin-md">People Who You May Know</h4>
                <ul class="status">
                    @if(empty($people))
                        <li class="left clearfix">
                            <span class="status-img pull-left">
                                <small class="pull-right text-muted"> There is no another user yet</small>
                            </span>
                        </li>
                    @else
                        @foreach($people as $data)
                        <li class="left clearfix"><span class="status-img pull-left">
                             @if($data->image == NULL)
                                <img src=" {{ '/assets/images/user.png' }}"  class="rounded" alt="not found">
                            @else   
                                <img src=" {{ $data->image }}" class="rounded" alt="not found">
                            @endif
                        </span>
                            <div class="status-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"> {{ $data->name}}</strong>  
                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/people/add') }}">
                                    {{ csrf_field() }}
                                            <input type="hidden" name="id" value= "{{ $data->id}}">
                                        <button type="submit" class="btn btn-primary pull-right">Follow</button>
                                    </form>
                                </div>
                                <p>
                                    {{ $data->bio }}
                                </p>
                            </div>
                        </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

