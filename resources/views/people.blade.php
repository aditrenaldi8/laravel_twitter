@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="content">
                @foreach($people as $data)
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/people/add') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value= "{{ $data->id}}">
                    <button type="submit" class="btn btn-primary pull-right">Follow</button>
                </form>
                    <div>
                        {{ $data->bio}}
                        @if($data->image == NULL)
                            <img src=" {{ '/assets/images/user.png' }}" alt="not found">
                        @else   
                            <img src=" {{ $data->image }}" alt="not found">
                        @endif
                        {{ $data->name }}
                        {{ $data->email }}
                    <div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
