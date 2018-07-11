@extends('admin_layout')
@section('title','All Products')
@section('admin_content')
    <h2></span>Products</h2>

    <p class="alert-success">
        <?php
        if (Session::get('message')) {
            echo Session::get('message');
            Session::put('message', null);
        }
        ?>
    </p>
    <table class="table table-hover">
        <thead class="greenLight">
        <tr>
            <th>Product Name</th>
            <th>Category</th>
            <th>Image</th>
            <th>Long Description</th>
            <th>Short Description</th>
            <th>Price</th>
            <th>Color</th>
            <th>Size</th>
            <th>Publication Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach($products as $product)
            <tbody>
            <tr>
                <td>{{$product->name}}</td>
                <td class="center">{{$product->category->name}}</td>
                <td class="center"><img src="{{$product->image}}" height="80" width="80"></td>
                <td class="center">{{$product->long_description}}</td>
                <td class="center">{{$product->short_description}}</td>
                <td class="center">{{$product->price}} TK</td>
                <td class="center">{{$product->color}}</td>
                <td class="center">{{$product->size}}</td>
                <td class="center">
                    @if($product->publication_status == 1)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-warning">Inactive</span>
                    @endif
                </td>
                <td class="center">
                    @if($product->publication_status == 1)
                        <a class="btn btn-warning" href="{{url('/inactive_product/'.$product->id)}}">
                            <i class="halflings-icon eye-close"></i>
                        </a>
                    @else
                        <a class="btn btn-success" href="{{url('/active_product/'.$product->id)}}">
                            <i class="halflings-icon eye-open"></i>
                        </a>
                    @endif

                    <a class="btn btn-info" href="{{url('/edit_product/'.$product->id)}}">
                        <i class="halflings-icon edit"></i>
                    </a>
                    <a class="btn btn-danger" id="delete" href="{{url('/delete_product/'.$product->id)}}">
                        <i class="halflings-icon trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
@endsection()