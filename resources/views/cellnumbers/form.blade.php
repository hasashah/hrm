<div class="form-group">

    {!! Form::label('firstname','First Name') !!}
    {!! Form::text('firstname', old("firstname") ? old("firstname") : (!empty($cellnumber) ? $cellnumber->firstname : null), [

        'class'=>'form-control',
        'placeholder'=>'Enter First Name',

    ]) !!}

</div>

<div class="form-group">

    {!! Form::label('lastname','Last Name') !!}
    {!! Form::text('lastname', old("lastname") ? old("lastname") : (!empty($cellnumber) ? $cellnumber->lastname : null), [

        'class'=>'form-control',
        'placeholder'=>'Enter Last Name',

    ]) !!}

</div>

<div class="form-group">

    {!! Form::label('cellnumber','Cell Number') !!}
    {!! Form::text('cellnumber', old("cellnumber") ? old("cellnumber") : (!empty($cellnumber) ? $cellnumber->cellnumber : null), [

        'class'=>'form-control',
        'placeholder'=>'Enter Cell Number',

    ]) !!}

</div>

<div class="form-group">

    {{Form::submit('Submit Form',
         [
            "class" => "btn btn-primary"
         ])
     }}

</div>

