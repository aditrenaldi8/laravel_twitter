@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="content">
                <h4 class="margin-md">Followers</h4>
                <ul class="status">
                   @foreach($followers as $data)
                    <li class="left clearfix"><span class="status-img pull-left">
                         @if($data->image == NULL)
                            <img src=" {{ '/assets/images/user.png' }}"  class="rounded" alt="not found">
                        @else   
                            <img src=" {{ $data->image }}" class="rounded" alt="not found">
                        @endif
                    </span>
                        <div class="status-body clearfix">
                            <div class="header">
                                <strong class="primary-font"> {{ $data->name}}</strong> <small class="pull-right text-muted"> {{ $data->email}}</small>
                            </div>
                            <p>
                                {{ $data->bio }}
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
