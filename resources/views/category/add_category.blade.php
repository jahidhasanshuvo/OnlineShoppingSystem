@extends('admin_layout')
@section('admin_content')


<h2>Add New Category</h2>
<p class="alert-success">
    <?php
    if (Session::get('message')) {
        echo Session::get('message');
        Session::put('message', null);
    }
    ?>
</p>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <form method="post" action="{{url('/save_category')}}">
                <fieldset>
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="name" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Category Description</label>
                        <div class="controls">
                            <textarea class="form-control" rows="5" name="description" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="control-label">Select Parent Category</div>
                        <div class="controls">
                            <select name="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($parent_category as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
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