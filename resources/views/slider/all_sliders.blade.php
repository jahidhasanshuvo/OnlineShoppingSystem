@extends('admin_layout')
@section('title','All Sliders')
@section('admin_content')
    <h2></span>Sliders</h2>
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
            <th>Slider Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Publication Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach($sliders as $slider)
            <tbody>
            <tr>
                <td class="center"><img src="{{$slider->image}}" height="150" width="400"></td>
                <td>{{$slider->title}}</td>
                <td class="center">{{$slider->description}}</td>
                <td class="center">
                    @if($slider->publication_status == 1)
                        <span class="label label-success">Active</span>
                    @else
                        <span class="label label-warning">Inactive</span>
                    @endif
                </td>
                <td class="center">
                    @if($slider->publication_status == 1)
                        <a class="btn btn-warning" href="{{url('/inactive_slider/'.$slider->id)}}">
                            <i class="halflings-icon eye-close"></i>
                        </a>
                    @else
                        <a class="btn btn-success" href="{{url('/active_slider/'.$slider->id)}}">
                            <i class="halflings-icon eye-open"></i>
                        </a>
                    @endif

                    <a class="btn btn-info" href="{{url('/edit_slider/'.$slider->id)}}">
                        <i class="halflings-icon edit"></i>
                    </a>
                    <a class="btn btn-danger" id="delete" href="{{url('/delete_slider/'.$slider->id)}}">
                        <i class="halflings-icon trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        @endforeach
    </table>
@endsection()