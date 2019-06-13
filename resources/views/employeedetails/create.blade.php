@extends('layouts.layout')
@section('title', 'Add New Employee Details')
@section('content')

    <div class="row">

        <div class="col-lg-12">

            <div class="float-left">

                <h1>Add New Employee Details</h1>

            </div>

            <div class="float-right">

                <a href="{{ url('employeedetails') }}"> <button type="button" class="btn btn-success float-right">Back To List</button></a>

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

    'route' => 'employeedetails.store',
    'method' => 'post',
    'files'=>'true',

    ]) !!}

    @include('employeedetails.form')

    {!! Form::close() !!}



@endsection


'enctype'=>'multipart/form-data'







