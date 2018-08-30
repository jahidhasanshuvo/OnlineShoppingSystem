@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <p class="label label-{{Session::get('status')}}">
                    @if(Session::get('message'))
                        {{Session::get('message')}}
                    @endif
                </p>
                <form action="{{route('sellingOnDate')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <h2>Generate Selling Report</h2>
                        <label class="control-label">Select Date From:</label>
                        <div class="controls">
                            <input type="date" name="fromDate" required="" id="forfuturedatesdisable"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Select Date To:</label>
                        <div class="controls">
                            <input type="date" name="toDate" required="" id="forfuturedatesdisable"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Generate Report</button>
                </form>
            </div>
        </div>
        <br>
        @if(!empty($orders))
            <div id="masterContent">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Selling report from {{$fromDate}} to {{$toDate}}</h4>
                        <table class="table table-hover" id="dt">
                            <thead class="label-success">
                            <th>Product Name</th>
                            <th>Product Quantity</th>
                            <th>Sub total</th>
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
                                <td style="text-align: right">Total :</td>
                                <td>{{$orders->sum('subtotal')}}</td>
                            </tr>
                        </table>
                    </div>
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

    <script>
        $(document).ready(function () {
            $('#dt').DataTable(
            );
        });
    </script>
    <script>
        $(document).ready(function () {
            var now = new Date();
            var day = ("0" + now.getDate()).slice(-2);
            var month = ("0" + (now.getMonth() + 1)).slice(-2);
            var today = now.getFullYear() + "-" + (month) + "-" + (day);
            $("[id$='forfuturedatesdisable']").attr('max', today);
            $("[id$='pastdatesdisable']").attr('min', today);
        });
    </script>
@endsection