@extends('layouts.layout')
@section('title', 'Image Sliders')
@section('content')


    <div class="row">

        <div class="col-lg-12">

            <div class="float-right">

                <a href="{{ url('sliders/create') }}"> <button type="button" class="btn btn-success float-right">Add New Picture</button></a>

            </div>


        </div>


    </div>
    <hr class="my-4">

    <div style="margin-top:30px;">


    @foreach($sliders as $slider)
        <img src="{{url('images')}}/{{$slider->picture}}" alt="{{$slider->picture}}" width="250" height="150"> <br />

            <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-block btn-info">Edit</a>


            {!! Form::open(['method' => 'DELETE', 'route' => ['sliders.destroy', $slider->id] ]) !!}
            <button class="btn btn-block btn-danger" type="submit">Delete</button>
            {!! Form::close() !!}

            <br>



        @endforeach




    </div>




@endsection