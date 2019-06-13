@extends('layouts.layout')
@section('title', 'List of Employee Details')
@section('content')


    <div class="row">

        <div class="col-lg-12">

            <div class="float-left">

                <h1>List of Employee Details</h1>

            </div>

            <div class="float-right">

                <a href="{{ url('employeedetails/create') }}"> <button type="button" class="btn btn-success float-right">Add New Employee Details</button></a>

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
                <th scope="col">Date of Birth</th>
                <th scope="col">Gender</th>
                <th scope="col">Hobby</th>
                <th scope="col">Skills</th>
                <th scope="col">Bio</th>
                <th scope="col">Picture</th>
                <th scope="col">Action</th>

            </tr>

            </thead>
            <tbody>
            @php
                $i=0
            @endphp

            @foreach($employeedetails as $employeedetail)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td><a href="/employeedetails/{{$employeedetail->id}}"> {{ $employeedetail->name }}</a></td>
                    <td>{{ $employeedetail->date_of_birth }}</td>
                    <td>{{ $employeedetail->gender }}</td>
                    <td>{{ $employeedetail->hobby }}</td>
                    <td>{{ $employeedetail->skills }}</td>
                    <td>{{ $employeedetail->bio }}</td>
                    <td><img src="{{asset('storage/'.$employeedetail->picture)}}" width="100px" height="100px">

                   </td>

                    <td><a href="/employeedetails/{{$employeedetail->id}}/edit"> EDIT </a> | <a href="{{-- route('employeedetails.delete', $employeedetail->id) --}}" onclick="return confirm('Are You Sure to Delete this?')" >DELETE</a></td>



                </tr>

            @endforeach

            </tbody>




        </table>




    </div>











@endsection