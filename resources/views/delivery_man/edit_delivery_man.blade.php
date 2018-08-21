@extends('admin_layout')
@section('admin_content')
@section('title','Edit Delivery Man')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <h2>Edit Delivery Man</h2>

            <p class="alert-success">
                <?php
                if (Session::get('message')) {
                    echo Session::get('message');
                    Session::put('message', null);
                }
                ?>
            </p>
            <form method="post" action="{{route('update_delivery_man',['id'=>$delivery_man->id])}}"
                  enctype="multipart/form-data">
                <fieldset>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="name" value="{{$delivery_man->name}}"
                                   required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Mobile Number</label>
                        <div class="controls">
                            <input class="form-control" type="number" name="mobile" value="{{$delivery_man->mobile}}"
                                   required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Zone or area</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="zone" value="{{$delivery_man->zone}}"
                                   required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Upload Image</label>
                        <div class="controls">
                            <input class="form-control" type="file" name="image">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <a href="/all_delivery_men" class="btn">Cancel</a>
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