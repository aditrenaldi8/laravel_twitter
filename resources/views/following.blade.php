@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ url('people') }}"><button type="button" class="btn btn-primary pull-right">Find People</button>
            <div class="content">
                @foreach($following as $data)
                    <div>
                        {{ $data->name}}
                        {{ $data->email }}
                        @if($data->image == NULL)
                            <img src=" {{ '/assets/images/user.png' }}" alt="not found">
                        @else   
                            <img src=" {{ $data->image }}" alt="not found">
                        @endif
                    <div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
