@extends('layout')
@include('slider')
@section('content')
    <h2 class="title text-center">Features Items</h2>
    @foreach($all_published_products as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper" style="height: 450px">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{asset($product->image)}}" height="250" width="200" alt=""/>
                        <h2>{{$product->price}} ৳</h2>
                        <p>{{$product->name}}</p>
                        <a href="{{route('product_details',['id'=>$product->id])}}" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{$product->price}} ৳</h2>
                            <p>{{$product->name}}</p>
                            <a href="{{route('product_details',['id'=>$product->id])}}"
                               class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{route('product_details',['id'=>$product->id])}}"><i
                                        class="fa fa-plus-square"></i>View Product Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    <div class="clearfix"></div>
    <div class="pagination-area text-center">
        {!! $all_published_products->links(); !!}
    </div>

@endsection()
