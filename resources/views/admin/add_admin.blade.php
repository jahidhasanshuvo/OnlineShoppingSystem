@extends('admin_layout')
@section('admin_content')
    <h2>Add New Admin</h2>
    <p class="alert-success">
        <?php
        if (Session::get('message')) {
            echo Session::get('message');
            Session::put('message', null);
        }
        ?>
    </p>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <?php Session::put('errors', null);
                ?>
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form method="post" action="{{route('save_admin')}}">
                    <fieldset>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Admin Name</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="name" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="email" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mobile Number</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="phone" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input class="form-control" type="password" name="password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Access Level</label>
                            <div class="controls">
                                <select name="access_level">
                                    <option value="">Select Admin Level</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions greenLight">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
@endsection()