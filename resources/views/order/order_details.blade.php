@extends('admin_layout')
@section('admin_content')
    <div id="masterContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="box span6">
                        <div class="box-header">
                            <h2>Customer & Shipping Details</h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td>Customer Name :</td>
                                    <td>{{$order->customer->name}}</td>
                                </tr>
                                <tr>
                                    <td>Customer Mobile :</td>
                                    <td>{{$order->customer->mobile_number}}</td>
                                </tr>
                                <tr>
                                    <td>Shipping City:</td>
                                    <td>{{$order->shipping->city}}</td>
                                </tr>
                                <tr>
                                    <td>Shipping Address:</td>
                                    <td>{{$order->shipping->address}}</td>
                                </tr>
                                <tr>
                                    <td>Shipping Mobile Number:</td>
                                    <td>{{$order->shipping->mobile_number}}</td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>
                <div class="col-md-1">
                    <div class="span1">

                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box span5">
                        <div class="box-header">
                            <h2>Payment Details</h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <td>Payment Status:</td>
                                    <td>{{$order->payment->status}}</td>
                                </tr>
                                <tr>
                                    <td>Payment Type :</td>
                                    <td>{{$order->payment->method}}</td>
                                </tr>
                                <tr>
                                    <td>Transaction ID :</td>
                                    <td>{{$order->payment->tID}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box span12">
                        <div class="box-header">
                            <h2>Order Details</h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-bordered table-hover">
                                <thead class="box-header">
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>

                                </thead>
                                @foreach($order->order_details as $order_details)
                                    <tbody>
                                    <tr>
                                        <td>{{$order_details->product->name}}</td>
                                        <td>{{$order_details->qty}}</td>
                                        <td>{{$order_details->subtotal}}</td>
                                    </tr>
                                    </tbody>
                                @endforeach
                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td style="text-align: right;"><b>TOTAL = </b></td>
                                    <td>{{$order->total}}/-</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button id="btnPrint" class="btn-primary">  Print  Preview</button>

@endsection()
