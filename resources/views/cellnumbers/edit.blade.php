@extends('layouts.layout')
@section('title', 'Edit Cell Number')
@section('content')

    <div class="row">

        <div class="col-lg-12">

            <div class="float-left">

                <h1>Edit Cell Numbers</h1>

            </div>

            <div class="float-right">

                <a href="{{ url('cellnumbers') }}"> <button type="button" class="btn btn-success float-right">Back To List</button></a>

            </div>


        </div>


    </div>
    <hr class="my-4">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open([

    'route' => ['cellnumbers.update', $cellnumber->id],
    'method' => 'put',

    ]) !!}

    @include('cellnumbers.form')

    {!! Form::close() !!}



@endsection
