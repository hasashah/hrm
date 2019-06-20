@extends('layouts.layout')
@section('title', 'Images for Silders')
@section('content')

    <div class="row">

        <div class="col-lg-12">

            <div class="float-left">

                <h1>List of Images for Sliders</h1>

            </div>

            <div class="float-right">

                <a href="{{ url('imagesliders/create') }}"> <button type="button" class="btn btn-success float-right">Add New Image</button></a>

            </div>


        </div>

    </div>



    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="table-responsive-lg">

        <table class="table table-hover">
            <thead class="text-white bg-dark">

            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Picture</th>
                <th scope="col">Action</th>
            </tr>

            </thead>
            <tbody>
            @php
                $i=0
            @endphp

            @foreach($sliders as $slider)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td> <!--<a href="/cellnumbers/{{--$cellnumber->id--}}">--> {{ $slider->title }}<!--</a>--></td>
                    <td><img src="{{url('storage/picture')}}/{{$slider->picture}}" alt="{{$slider->picture}}" width="100" height="100"></td>
                    <td><a href="/imagesliders/{{$slider->id}}/edit"> EDIT </a> | <a href="{{ route('imagesliders.delete', $slider->id) }}" onclick="return confirm('Are You Sure to Delete this?')" >DELETE</a></td>

                </tr>

            @endforeach

            </tbody>




        </table>




    </div>






@endsection
