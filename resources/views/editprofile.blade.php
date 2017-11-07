@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 profile">
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
               <form class="form-horizontal" role="form" method="POST" action="{{ '/profile/edit'}}">
                {{ csrf_field() }}

                    <input type="hidden" class="form-control" name="id" value="{{ $data->user_id }}">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $data->user->name }}" placeholder="Name">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $data->user->email }}" palceholder="Email">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                            @if ($errors->has('password') )
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                     <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            <input id="bio" type="text" class="form-control" name="bio" value="{{ $data->bio }}" placeholder="Bio">

                            @if ($errors->has('bio') )
                                <span class="help-block">
                                    <strong>{{ $errors->first('bio') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
        
                        <button type="submit" class="btn btn-primary pull-right edit">
                            Update
                        </button>
                
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
@endsection
