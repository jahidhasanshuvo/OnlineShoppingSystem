@extends('admin_layout')
@section('title','All Admin')
@section('admin_content')
    <h2>Admin List</h2>
    <p class="alert-success">
        <?php
        if (Session::get('message')) {
            echo Session::get('message');
            Session::put('message', null);
        }
        ?>
    </p>
    <table class="table table-hover">
        <thead class="label-success">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile Number</th>
            <th>Access Level</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach($admins as $admin)
            <tbody>
            <tr>
                <td class="center">{{$admin->name}}</td>
                <td class="center">{{$admin->email}}</td>
                <td class="center">{{$admin->phone}}</td>
                <td class="center">{{$admin->access_level}}</td>
                <td class="center">
                    <a class="btn btn-info" href="{{route('edit_admin',['id'=>$admin->id])}}">
                        <i class="halflings-icon edit"></i>
                    </a>
                    <a class="btn btn-default" href="{{route('edit_password',['id'=>$admin->id])}}">Change
                        Password
                    </a>
                    @if($admin->id != Session::get('admin_id'))
                        <a class="btn btn-danger" id="delete" href="{{route('delete_admin',['id'=>$admin->id])}}">
                            <i class="halflings-icon trash"></i>
                        </a>
                    @endif
                </td>
            </tr>
            </tbody>

        @endforeach
    </table>
    <div class="text-center">
        {!! $admins->links() !!}
    </div>
    <div style="height: 220px">
    </div>

@endsection()