@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="content">
                @foreach($data as $data)
                    <a href="{{ url('profile/edit/'.$data->id) }}"><button type="button" class="btn btn-primary pull-right">Edit Profile</button></a>
                    <a href="{{ url ('profile/upload/'.$data->id) }}"><button type="button" class="btn btn-primary pull-right">Upload Image</button></a>
                    <div>
                        {{ $data->bio}}
                        <img src=" {{ $data->image }}" alt="not found">
                        {{ $data->user->name }}
                        {{ $data->user->email }}
                    <div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
