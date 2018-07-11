@extends('admin_layout')
@section('title','Order Page')
@section('admin_content')
    <h2><span class="break"></span>All Orders List</h2>
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
            <th>Order<br> ID</th>
            <th>Customer<br> Name</th>
            <th>Customer<br> Phone</th>
            <th>Order<br> Status</th>
            <th>Payment<br> Status</th>
            <th>City</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach($orders as $order)
            <tbody>
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->customer->name}}</td>
                <td>{{$order->customer->mobile_number}}</td>
                <td class="center">{{$order->status}}</td>
                <td class="center">{{$order->payment->status}}</td>
                <td class="center">{{$order->shipping->city}}</td>
                <td class="center">{{$order->shipping->address}}</td>
                <td class="center">
                    <a class="btn btn-default" href="{{route('order_details',['id'=>$order->id])}}">
                        <i class="halflings-icon eye-open"></i>
                    </a>
                    <a class="btn btn-info" href="{{route('edit_order',['id'=>$order->id])}}">
                        <i class="halflings-icon edit"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
@endsection()
