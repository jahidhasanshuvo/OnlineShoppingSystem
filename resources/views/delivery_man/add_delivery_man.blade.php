@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2>Add Delivery Man</h2>
                <p class="alert-success">
                    <?php
                    if (Session::get('message')) {
                        echo Session::get('message');
                        Session::put('message', null);
                    }
                    ?>
                </p>
                <form method="post" action="{{route('save_delivery_man')}}" enctype="multipart/form-data">
                    <fieldset>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="name" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Mobile Number</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="mobile" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Zone or Area</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="zone" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Upload Image</label>
                            <div class="controls">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                        <div class="form-actions greenLight">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Reset</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection()