@extends('admin_layout')
@section('admin_content')

    <div class="box span12">
        <div class="box-header greenLight">
            <h2>Add New Product</h2>
        </div>
        <div class="box-content">
            <p class="alert-success">
                <?php
                if(Session::get('message')){
                    echo Session::get('message');
                    Session::put('message',null);
                }
                ?>
            </p>
            <form class="form-horizontal" method="post" action="{{url('/update_slider/'.$slider->id)}}" enctype="multipart/form-data">
                <fieldset>
                    {{csrf_field()}}
                    <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="title" value="{{$slider->title}}" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Slider Description</label>
                        <div class="controls">
                            <textarea class="form-control" rows="5" name="description" required="">{{$slider->description}}</textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Upload Image</label>
                        <div class="controls">
                            <input class="form-control" type="file" name="image">
                        </div>
                    </div>

                    <div class="form-actions greenLight">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <a href="/all_slider" class="btn">Cancel</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->


@endsection()