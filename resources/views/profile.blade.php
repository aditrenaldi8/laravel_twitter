@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 profile">
            @foreach($data as $data)
            <div class="col-md-3 text-center profile-left">
                <div class="col-md-12">
                    @if($data->image == NULL)
                        <img src=" {{ '/assets/images/user.png' }}"  class="rounded-lg" alt="not found">
                    @else   
                        <img src=" {{ $data->image }}" class="rounded-lg" alt="not found">
                    @endif
                </div>
                <div class="col-md-12">
                    <a href="{{ url ('profile/upload/'.$data->id) }}"><button type="button" class="btn btn-primary">Upload Image</button></a>
                </div>
            </div>
            <div class="col-md-9 profile-right">
                <div class="col-md-12 profile-followers">
                    <a href="{{ url('followers') }}"><h5> Followers : 
                        {{$followers}}
                    </a>
                    &nbsp;
                    <a href="{{ url('following') }} ">   Following :
                        {{$following}}</h5>
                    </a>
                </div>
                <div class="col-md-12">
                    <small class="pull-left text-muted bio"> " {{$data->bio}} "</small>
                    <div class="form-group">
                    
                        <div class="col-md-12 margin-sm">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $data->user->name }}" disabled>
                        </div>
                    </div>

                    <div class="form-group">

                        <div class="col-md-12 margin-sm">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $data->user->email }}" disabled>

                        </div>
                    </div>
                    <div class="form-group">

                        <div class="col-md-12 margin-sm">

                            <a href="{{ url('profile/edit/'.$data->id) }}"><button type="button" class="btn btn-primary pull-right edit">Edit Profile</button></a>
                         </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
