@extends('layout')
@section('content')
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{asset($product->image)}}" alt="" />
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href=""><img src="{{asset('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="{{asset('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="{{asset('frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <h2>{{$product->name}}</h2>
                            <img src="{{asset('frontend/images/product-details/rating.png')}}" alt="" />
                            <span>
									<span>TK. {{$product->price}}</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
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
@endsection