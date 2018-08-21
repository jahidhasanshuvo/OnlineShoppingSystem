@extends('admin_layout')
@section('admin_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Add New Product</h2>
                <p class="alert-success">
                    <?php
                    if (Session::get('message')) {
                        echo Session::get('message');
                        Session::put('message', null);
                    }
                    ?>
                </p>
                <form method="post" action="{{url('/save_product')}}" enctype="multipart/form-data">
                    <fieldset>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Product Name</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="name" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label">Select Category</div>
                            <div class="controls">
                                <select name="category_id" class="form-control" required="">
                                    <option>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}
                                            ({{$category->parent->name}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Product Long Description</label>
                            <div class="controls">
                                <textarea class="form-control" rows="5" name="long_description" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Short Description</label>
                            <div class="controls">
                                <textarea class="form-control" rows="5" name="short_description" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Price</label>
                            <div class="controls">
                                <input class="form-control" type="number" name="price" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Color</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="color" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Size</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="size" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product amount</label>
                            <div class="controls">
                                <input class="form-control" type="number" name="qty" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Upload Image</label>
                            <div class="controls">
                                <input class="form-control" type="file" name="image" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Upload Image 2</label>
                            <div class="controls">
                                <input class="form-control" type="file" name="image1" required="">
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
@endsection()