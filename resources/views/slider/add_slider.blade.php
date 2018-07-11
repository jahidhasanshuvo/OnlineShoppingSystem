@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h2>Add New Product</h2>
                <p class="alert-success">
                    <?php
                    if (Session::get('message')) {
                        echo Session::get('message');
                        Session::put('message', null);
                    }
                    ?>
                </p>
                <form method="post" action="{{route('save_slider')}}" enctype="multipart/form-data">
                    <fieldset>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Slider Title</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="title" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Slider Description</label>
                            <div class="controls">
                                <textarea class="form-control" rows="5" name="description" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Upload Image</label>
                            <div class="controls">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Publication Status</label>
                            <div class="controls">
                                <input type="checkbox" name="publication_status" value="1">
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
@endsection()