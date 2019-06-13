@extends('layouts.layout')
@section('title','Personal Information')
@section('content')

    <div class="float-left">
<h1>Information Table</h1>
    </div>
<div class="float-right">

    <a class="btn btn-primary" href="{{route('personals.create')}}">Add New</a>

</div>

<div class="mb-4 pt-4">


    <table class="table table-hover">

        <thead>

        <tr>

            <th scope="col">Sl. No.</th>
            <th scope="col">Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Gender</th>
            <th scope="col">Picture</th>
            <th scope="col">Action</th>

        </tr>

        </thead>

        <tbody>

        @php

        $i=0;

        @endphp



        @foreach($personals as $personal)

            <tr>
               <th scope="row">{{++$i}}</th>
                <td>{{$personal->firstname}} {{$personal->lastname}}</td>
                <td>{{$personal->dob}}</td>
                <td>{{$personal->gender}}</td>
                <td><img src="{{asset('storage/'.$personal->picture)}}" width="100px" height="100px"></td>
                <td>EDIT | DELETE</td>
            </tr>

            @endforeach




        </tbody>





    </table>

</div>








@endsection