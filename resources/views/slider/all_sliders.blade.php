@extends('admin_layout')
@section('title','All Sliders')
@section('admin_content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                    <thead class="alert-success">
                    <tr>
                        <th>Slider Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Position</th>
                        <th>Publication Status</th>
                        <th style="width:150px">Actions</th>
                    </tr>
                    </thead>
                    @foreach($sliders as $slider)
                        <tbody>
                        <tr>
                            <td class="center"><img src="{{$slider->image}}" height="150" width="400"></td>
                            <td>{{$slider->title}}</td>
                            <td class="center">{{$slider->description}}</td>
                            <td class="center">{{$slider->position}}</td>
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
            </div>
        </div>
    </div>
    <div class="text-center">
        {!! $sliders->links() !!}
    </div>

@endsection()


<?php /*
<!--

<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{route('ajaxSlider')}}",
            "columns": [
                {
                    data: 'image', searchable: false, render: function (data) {
                        return "<img src='" + data + "' alt='product image' style='height:150px;width:300px'/>"
                    }
                },
                {"data": "title"},
                {"data": "description"},
                {"data": "publication_status"},
                {
                    data: 'action', name: 'action', orderable: false, searchable: false, render: function (data) {
                        return '<a class="btn btn-info" href="edit_slider/' + data + '" ><i class="halflings-icon edit"><i></a><a id="delete" class="btn btn-info" href="delete_slider/' + data + '" ><i class="halflings-icon trash"><i></a>'
                    }
                }
            ]
        });
    });
</script>
 */?>