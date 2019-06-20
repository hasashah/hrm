@extends('layouts.layout')
@section('title', 'Edit Images to Slider')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Edit Image For Silders</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))

                        <div class="alert alert-success alert-block">

                            <button type="button" class="close" data-dismiss="alert">×</button>

                            <strong>{{ $message }}</strong>

                        </div>

                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('imagesliders.update', $imageslider->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" class="form-control" name="title" value="{{$imageslider->title}}">
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="picture" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                        </div>
                        <br>

                        <img src="{{url('storage/picture/')}}/{{$imageslider->picture}}" alt="image" width="100">
                        <br>
                        <br>
                        <br>



                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
