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
                <form method="post" action="{{url('/update_product/'.$product->id)}}"
                      enctype="multipart/form-data">
                    <fieldset>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label">Product Name</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="name" value="{{$product->name}}"
                                       required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-label">Select Category</div>
                            <div class="controls">
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($category->id==$product->category_id) selected @endif>{{$category->name}}
                                            ({{$category->parent->name}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Product Long Description</label>
                            <div class="controls">
                            <textarea class="form-control" rows="5" name="long_description"
                                      required="">{{$product->long_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Short Description</label>
                            <div class="controls">
                            <textarea class="form-control" rows="5" name="short_description"
                                      required="">{{$product->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Price</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="price" value="{{$product->price}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Color</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="color" value="{{$product->color}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Product Size</label>
                            <div class="controls">
                                <input class="form-control" type="text" name="size" value="{{$product->size}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Product Quantity</label>
                            <div class="controls">
                                <input class="form-control" type="number" name="qty" value="{{$product->qty}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Upload Image</label>
                            <div class="controls">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Upload Image</label>
                            <div class="controls">
                                <input class="form-control" type="file" name="image1">
                            </div>
                        </div>
                        <div class="form-actions greenLight">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <a href="/all_product" class="btn">Cancel</a>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


@endsection()