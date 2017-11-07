@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="content">
                <h4 class="margin-md">Following</h4>
                <ul class="status">
                   @foreach($following as $data)
                    <li class="left clearfix"><span class="status-img pull-left">
                         @if($data->image == NULL)
                            <img src=" {{ '/assets/images/user.png' }}"  class="rounded" alt="not found">
                        @else   
                            <img src=" {{ $data->image }}" class="rounded" alt="not found">
                        @endif
                    </span>
                        <div class="status-body clearfix">
                            <div class="header">
                                <strong class="primary-font"> {{ $data->name}}</strong> <small class="text-muted"> {{ $data->email}}</small>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/following/delete') }}">
                                    {{ csrf_field() }}
                                            <input type="hidden" name="id" value= "{{ $data->id}}">
                                        <button type="submit" class="btn btn-danger pull-right">Unfollow</button>
                                    </form>
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
