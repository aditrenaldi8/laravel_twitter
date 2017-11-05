@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>
                <div class="panel-body">                
                    <form action="{{ url('profile/upload') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control" name="id" value="{{ $data->user_id }}">
                        <div class="form-group">
                            <label for="photo" class="control-label col-md-3">Upload Photo</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>