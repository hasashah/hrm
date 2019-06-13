@extends('layouts.layout')
@section('title','Create Information')
@section('content')

    <h1>Add Information</h1>

    <form action="{{ route('personals.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">

            <label for="inputFirstName">First Name</label>
            <input type="text" class="form-control" id="inputFirstName" name="firstname" placeholder="First Name">

        </div>

        <div class="form-group">

            <label for="inputLastName">Last Name</label>
            <input type="text" class="form-control" id="inputLastName" name="lastname" placeholder="Last Name">

        </div>

        <div class="form-group">

            <label for="inputDateofBirth">Date of Birth</label>
            <input type="date" class="form-control" id="inputDateofBirth" name="dob" placeholder="Date of Birth">

        </div>

        <legend class="col-form-label pt-0">Gender</legend>
        <div class="form-check form-check-inline">

            <input class="form-check-input" type="radio" name="gender" id="gender1" value="Male" checked>
            <label class="form-check-label" for="gender1">
                Male
            </label>

        </div>
        <div class="form-check form-check-inline">

            <input class="form-check-input" type="radio" name="gender" id="gender2" value="Female">
            <label class="form-check-label" for="gender2">
                Female
            </label>

        </div>

        <div class="form-group">

            <label for="pics" class="col-form-label">Picture</label>

            <input type="file" class="form-control-file" id="pics" name="picture">



        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>


    </form>

@endsection