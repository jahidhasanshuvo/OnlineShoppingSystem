@extends('admin_layout')
@section('title','Delivery Men')
@section('admin_content')

    <h2></span>Delivery Men</h2>
    <p class="alert-success">
        <?php
        if (Session::get('message')) {
            echo Session::get('message');
            Session::put('message', null);
        }
        ?>
    </p>
    <table class="table table-hover table-striped" id="myTable">
        <thead class="label-success">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Mobile Number</th>
            <th>Zone</th>
            <th style="width:150px">Actions</th>
        </tr>
        </thead>
    </table>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('ajax_delivery_man')}}",
                "columns": [
                    {
                        orderable: false, data: 'image', searchable: false, render: function (data) {
                            return "<img src='" + data + "' alt='DElivery Man image' style='height:150px;width:200px'/>"
                        }
                    },
                    {"data": "name"},
                    {"data": "mobile"},
                    {"data": "zone"},
                    {
                        data: 'action', name: 'action', orderable: false, searchable: false, render: function (data) {
                            return '<a class="btn btn-info" href="edit_delivery_man/' + data + '" ><i class="halflings-icon edit"><i></a><a id="delete" class="btn btn-danger" href="delete_delivery_man/' + data + '" ><i class="halflings-icon trash"><i></a>'
                        }
                    }
                ]
            });
        });
    </script>

@endsection()
