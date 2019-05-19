@extends('layouts.layout')
@section('title', 'List of Cell Numbers')
@section('content')


    <div class="row">

        <div class="col-lg-12">

            <div class="float-left">

                <h1>List of Cell Numbers</h1>

            </div>

            <div class="float-right">

                <a href="{{ url('cellnumbers/create') }}"> <button type="button" class="btn btn-success float-right">Add New Cell Number</button></a>

            </div>


        </div>


    </div>
    <hr class="my-4">

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="table-responsive-lg">

        <table class="table table-hover">
            <thead class="text-white bg-dark">

                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Cell Number</th>
                    <th scope="col">Action</th>
                </tr>

            </thead>
            <tbody>
            @php
            $i=0
            @endphp

            @foreach($cellnumbers as $cellnumber)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td><a href="/cellnumbers/{{$cellnumber->id}}"> {{ $cellnumber->firstname }} {{ $cellnumber->lastname }}</a></td>
                    <td>{{ $cellnumber->cellnumber }}</td>
                    <td><a href="/cellnumbers/{{$cellnumber->id}}/edit"> EDIT </a> | <a href="{{ route('cellnumbers.delete', $cellnumber->id) }}" onclick="return confirm('Are You Sure to Delete this?')" >DELETE</a></td>



                </tr>

                @endforeach

            </tbody>




        </table>




    </div>











@endsection