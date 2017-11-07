@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 profile">
            <div class="col-md-12">
                <h4> Upload Photo </h4>
                <form action="{{ url('profile/upload') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" name="id" value="{{ $data->user_id }}">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary edit" style="margin-top:5%; width:100%;">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection