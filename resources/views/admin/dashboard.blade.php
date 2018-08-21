@extends('admin_layout')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" style="background-color: #7074e2">
                <br>
                <br>
                <h3 align="center"><b>Total Order</b></h3>
                <h3 align="center"><b>{{$order}}</b></h3>
                <br>
                <br>
            </div>

            <div class="col-md-3 col-md-offset-1" style="background-color: #ffc12e">
                <br>
                <br>
                <h3 align="center"><b>Pending Order</b></h3>
                <h3 align="center"><b>{{$pending}}</b></h3>
                <br>
                <br>
            </div>
            <div class="col-md-3 col-md-offset-1" style="background-color: #54a91f">
                <br>
                <br>
                <h3 align="center"><b>Completed Order</b></h3>
                <h3 align="center"><b>{{$done}}</b></h3>
                <br>
                <br>
            </div>
        </div>
    </div>
@endsection
