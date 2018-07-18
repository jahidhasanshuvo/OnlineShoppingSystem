@extends('admin_layout')
@section('title','Edit Admin')
@section('admin_content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2>Update Admin</h2>
                <form method="post" action="{{route('update_admin',['id'=>$admin->id])}}">
                    <fieldset>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Admin Name</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="name" value="{{$admin->name}}"
                                       required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Phone</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="phone" value="{{$admin->phone}}"
                                       required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label">Select Access Level</div>
                            <div class="controls">
                                <select name="access_level" class="form-control">
                                    <option value="">Select Access Level</option>
                                    <option value="Admin"
                                            @if($admin->access_level=="Admin") selected @endif>Admin
                                    </option>
                                    <option value="User"
                                            @if($admin->access_level=="User") selected @endif>User
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn" href="{{route('all_admin')}}">Cancel</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <div style="height: 180px">
    </div>


@endsection()