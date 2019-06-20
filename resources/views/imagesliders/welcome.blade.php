@extends('layouts.layout')
@section('title','Image Slider')
@section('content')


    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $slider)

                <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>

                @endforeach

            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                    <img src="{{url('storage/picture')}}/{{$slider->picture}}" class="d-block w-100" alt="slider">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider->title }}</h5>

                    </div>
                </div>
                    @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>







@endsection