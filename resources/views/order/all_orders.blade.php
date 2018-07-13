@extends('admin_layout')
@section('title','Order Page')
@section('admin_content')

    <h2>All Orders List</h2>
    <p class="alert-success">
        <?php
        if (Session::get('message')) {
            echo Session::get('message');
            Session::put('message', null);
        }
        ?>
    </p>
    <table class="table table-hover" id="myTable">
        <thead class="label-success">
        <th>ID</th>
        <th>Order Status</th>
        <th>Customer name</th>
        <th>Mobile Number</th>
        <th>Payment Status</th>
        <th>Shipping City</th>
        <th>Address</th>
        <th style="width: 100px">Action</th>
        </thead>
    </table>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('ajaxOrder')}}",
                "columns": [
                    {data: 'id'},
                    {data: 'order_status', name: 'orders.status'},
                    {data: 'name', name: 'customers.name'},
                    {data: 'mobile_number', name: 'customers.mobile_number'},
                    {data: 'payment_status', name: 'payments.status',searchable:false},
                    {data: 'city', name: 'shippings.city'},
                    {data: 'address', name: 'shippings.address'},
                    {
                        data: 'action', name: 'action', orderable: false, searchable: false, render: function (data) {

                            return '<a class="btn btn-danger" href="edit_order/' + data + '" ><i class="halflings-icon edit"><i></a> <a class="btn btn-info" href="order_details/' + data + '" ><i class="halflings-icon eye-open"><i></a>'
                        }
                    }
                ]
            });
        });
    </script>
@endsection()