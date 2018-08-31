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
                            <input class="form-control" type="file" name="image" id="img" onchange="validateImage()">
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

<script type="text/javascript">
    function validateImage() {
        var formData = new FormData();

        var file = document.getElementById("img").files[0];

        formData.append("Filedata", file);
        var t = file.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
            alert('Please select a valid image file');
            document.getElementById("img").value = '';
            return false;
        }
        if (file.size > 1024000) {
            alert('Max Upload size is 1MB only');
            document.getElementById("img").value = '';
            return false;
        }
        return true;
    }
</script>
@endsection()