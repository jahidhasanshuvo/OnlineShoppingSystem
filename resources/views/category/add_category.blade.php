@extends('admin_layout')
@section('admin_content')

   <div class="box span12">
        <div class="box-header greenLight">
            <h2>Add New Category</h2>
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
            <form class="form-horizontal" method="post" action="{{url('/save_category')}}">
                <fieldset>
                    {{csrf_field()}}
                    <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                            <input class="form-control" type="text" name="name" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Category Description</label>
                        <div class="controls">
                            <textarea class="form-control" rows="5" name="description" required=""></textarea>
                        </div>
                    </div>
                    <div class="control-group">
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
                    <div class="control-group">
                        <label class="control-label">Publication Status</label>
                        <div class="controls">
                            <input type="checkbox" name="publication_status" value="1">
                        </div>
                    </div>
                    <div class="form-actions greenLight">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>

        </div>
   </div><!--/span-->


@endsection()