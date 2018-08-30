@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container col-sm-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            @if(Cart::content()->count()<1)
                <h4 class="alert-danger">You didn't shop anything</h4>
            @endif
            <h4 class="alert-{{Session::get('status')}}">
                @if(Session::get('message'))
                    {{Session::get('message')}}
                @endif
            </h4>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="description">Order Description</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $cartItem)
                        <tr>
                            <td class="cart_product" style="margin-left: 0;">
                                <a href=""><img src="{{asset($cartItem->options->image)}}" alt="" height="80px"
                                                width="80px"></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$cartItem->name}}</a></h4>
                            </td>
                            <form action="{{route('update_cart')}}" method="post">
                                {{csrf_field()}}
                                <td class="cart_description">
                                    <textarea name="order_description">{{$cartItem->options->description}}</textarea>
                                </td>
                                <td class="cart_price">
                                    <p>{{$cartItem->price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <input class="cart_quantity_input" type="number" name="qty" min="1"
                                               style="height:30px;width:55px;"
                                               value="{{$cartItem->qty}}">
                                        <input type="hidden" name="rowId" value="{{$cartItem->rowId}}">
                                        <input type="hidden" name="productId" value="{{$cartItem->id}}">
                                        <input type="hidden" name="image" value="{{$cartItem->options->image}}">
                                        <input type="submit" value="update" class="btn btn-sm">
                                    </div>

                                </td>
                            </form>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$cartItem->total()}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete"
                                   href="{{route('delete_cart',['rowId'=>$cartItem->rowId])}}"><i
                                            class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::total()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::total()}}</span></li>
                        </ul>
                        <a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

@endsection