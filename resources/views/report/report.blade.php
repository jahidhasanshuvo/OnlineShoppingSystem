@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('sellingOnDate')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <h2>Generate Selling Report on Date Base</h2>
                        <label class="control-label">Select Date From:</label>
                        <div class="controls">
                            <input type="date" name="fromDate"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Select Date To:</label>
                        <div class="controls">
                            <input type="date" name="toDate"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
            </div>
        </div>
        @if(!empty($orders))
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <th>Product Name :</th>
                        <th>Product Quantity :</th>
                        <th>Sub total :</th>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->product->name}}</td>
                                <td>{{$order->qty}}</td>
                                <td>{{$order->subtotal}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tr>
                            <td></td>
                            <td style="text-align: right">Total : </td>
                            <td>{{$orders->sum('subtotal')}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            @else
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
        @endif
    </div>
@endsection