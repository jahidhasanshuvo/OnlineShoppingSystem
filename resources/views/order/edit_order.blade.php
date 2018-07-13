@extends('admin_layout')
@section('admin_content')
    <div id="masterContent">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="box span5">
                        <div class="box-header">
                            <h2>Payment Details</h2>
                        </div>
                        <div class="box-content">
                            <form method="post" action="{{route('update_order',['id'=>$order->id])}}">
                                <table class="table table-striped table-bordered table-hover">
                                    {{csrf_field()}}
                                    <tr>
                                        <td>Order Status:</td>
                                        <td>
                                            <select name="order_status">
                                                <option value="pending" @if($order->status=="pending") selected @endif>
                                                    Pending
                                                </option>
                                                <option value="processing"
                                                        @if($order->status=="processing") selected @endif>Processing
                                                </option>
                                                <option value="done" @if($order->status=="done") selected @endif>Done
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Payment Status:</td>
                                        <td>
                                            <select name="payment_status">
                                                <option value="pending"
                                                        @if($order->payment->status=="pending") selected @endif>Pending
                                                </option>
                                                <option value="done"
                                                        @if($order->payment->status=="done") selected @endif>
                                                    Done
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Payment Type :</td>
                                        <td>{{$order->payment->method}}</td>
                                    </tr>
                                    @if($order->payment->method=='Bkash')
                                        <tr>
                                            <td>Transaction ID :</td>
                                            <td>{{$order->payment->tID}}</td>
                                        </tr>
                                    @endif
                                    <tr></tr>
                                    <tr>
                                        <td>Delivery Man</td>
                                        <td>
                                            <select name="delivery_man">
                                                <option>Select Delivery Man</option>
                                                @foreach($delivery_man as $dm)
                                                    <option value="{{$dm->id}}"
                                                            @if($dm->id == $order->delivery_man_id) selected @endif>{{$dm->name}}
                                                        ({{$dm->zone}})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="submit" class="btn-primary" value="Submit"></td>
                                    </tr>
                                </table>
                            </form>
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
                            <table class="table table-striped table-bordered table-hover">
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
@endsection()
