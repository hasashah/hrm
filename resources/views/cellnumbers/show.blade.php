@extends('layouts.layout')
@section('title', 'Showing Cell Number')
@section('content')

    <div class="jumbotron">

        <div class="row">

            <div class="col-lg-12">

                <div class="float-left">

                    <h1>Showing Cell Numbers</h1>

                </div>

                <div class="float-right">

                    <a href="{{ url('cellnumbers') }}"> <button type="button" class="btn btn-success float-right">Back To List</button></a>

                </div>


            </div>


        </div>
        <hr class="my-4">
        <ul>

            <li>Name: {{$cellnumber->firstname}} {{ $cellnumber->lastname }}</li>
            <li>Cell Number: {{ $cellnumber->cellnumber }}</li>


        </ul>



    </div>







@endsection