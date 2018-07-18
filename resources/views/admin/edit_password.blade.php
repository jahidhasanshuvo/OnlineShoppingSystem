@extends('admin_layout')
@section('title','All Password')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{{route('update_password',['id'=>$admin->id])}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label"> Password</label>
                        <div class="controls">
                            <input class="form-control" type="password" name="password" required="">
                        </div>
                    </div>
                    <input type="submit" value="Update Password" class="btn btn-success">
                    <a class="btn btn-default" href="{{route('all_admin')}}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    <div style="padding-bottom: 390px">
    </div>
@endsection