@section('slider')
    <section id="slider"><!--slider-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <?php
                        $sliders = \App\Slider::all()->where('publication_status',1)->sortBy('position');
                        ?>
                        <ol class="carousel-indicators">
                            @foreach($sliders as $slider)
                                <li data-target="#slider-carousel" data-slide-to="{{$loop->index}}" class="{{$loop->first?'active':""}}"></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @foreach($sliders as $slider)
                                <div class="item {{$loop->first ?'active':""}}">
                                    <div class="col-sm-12" style="padding-right:30px;">
                                        <div class="pricing">

                                            <h2>{{$slider->title}}</h2>
                                            <p>{{$slider->description}}</p>
                                        </div>
                                        <img src="{{asset($slider->image)}}" style="width:95%;height: 400px;"/>
                                    </div> <!-- -->
                                </div>
                            @endforeach
                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection