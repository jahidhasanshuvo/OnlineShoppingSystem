@extends('layout')
@section('content')
    <div class="col-md-12 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-md-6" style="height: 600px">
                <div class="view-product">
                    <ul id="bzoom">
                        <li>
                            <img class="bzoom_thumb_image" src="{{asset($product->image)}}" alt="No Picture Available"/>
                            <img class="bzoom_big_image" src="{{asset($product->image)}}" alt="No Picture Available"/>
                        </li>
                        <li>
                            <img class="bzoom_thumb_image" src="{{asset($product->image1)}}" alt="No Picture Available"/>
                            <img class="bzoom_big_image" src="{{asset($product->image1)}}" alt="No Picture Available"/>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="alert-{{Session::get('status')}}">
                    @if(Session::get('message'))
                        {{Session::get('message')}}
                    @endif
                </h4>
                <div class="product-information"><!--/product-information-->
                    <h2>{{$product->name}}</h2>
                    <span>
								<span>TK. {{$product->price}}</span>
                                <label> Write size-color<b style="color: red;">(hint:xl-red)</b></label>
                                <form action="{{route('add_to_cart')}}" method="post">
                                    {{csrf_field()}}
                                    <textarea name="order_description"></textarea>
                                    <label>Quantity:</label>
                                    <input type="number" value="1" name="qty" min="1"/>
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                </form>
                            </span>
                    <p><b>Availability:</b>@if($product->publication_status)Available @else Not Available @endif</p>
                    <p><b>Short Description:</b> {{$product->short_description}}</p>
                    <p><b>Long Description:</b> {{$product->short_description}}</p>
                    <p><b>Category: </b>{{$product->category->parent->name}}-{{$product->category->name}}</p>
                    <p><b>Available Size: </b>{{$product->size}}</p>
                    <p><b>Color: </b>{{$product->color}}</p>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->
    </div>
@endsection