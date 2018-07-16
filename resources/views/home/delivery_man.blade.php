@extends('layout')
@section('content')
    @if($delivery_man == "No Order")
        <h1>You Didn't Order Anything</h1>
    @elseif($delivery_man)
        <h1>Thank You for your purchase</h1>
        <table class="table table-striped">
            <tr>
                <td>Your Last Delivery Person name:</td>
                <td>{{$delivery_man->name}}</td>
            </tr>
            <tr>
                <td>Mobile Number:</td>
                <td>{{$delivery_man->mobile}}</td>
            </tr>
            <tr>
                <td><h3> Picture</h3></td>
                <td><img src="{{asset($delivery_man->image)}}" height="350px" width="500px"></td>
            </tr>
        </table>
    @else
        <h3>Your order is processing .Please wait a few minitues</h3>
    @endif

    <br>
    <br>
    <br>
    <br>
@endsection