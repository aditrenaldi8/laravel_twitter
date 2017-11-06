@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ url('followers') }}"> Followers : 
                {{$followers}}
            </a>
            <a href="{{ url('following') }} ">   Following :
                {{$following}}
            </a>
            <div class="content">
                @foreach($data as $data)
                    <a href="{{ url('profile/edit/'.$data->id) }}"><button type="button" class="btn btn-primary pull-right">Edit Profile</button></a>
                    <a href="{{ url ('profile/upload/'.$data->id) }}"><button type="button" class="btn btn-primary pull-right">Upload Image</button></a>
                    <div>
                        {{ $data->bio}}
                        @if($data->image == NULL)
                            <img src=" {{ '/assets/images/user.png' }}" alt="not found">
                        @else   
                            <img src=" {{ $data->image }}" alt="not found">
                        @endif
                        {{ $data->user->name }}
                        {{ $data->user->email }}
                    <div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
