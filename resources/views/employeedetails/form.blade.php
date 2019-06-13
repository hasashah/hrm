<div class="form-group row">

    {!! Form::label('name','Name',[

        'class' =>'col-sm-2 col-form-label',
    ]) !!}

    <div class="col-sm-10">

    {!! Form::text('name', old("name") ? old("name") : (!empty($employeedetail) ? $employeedetail->name : null), [

        'class'=>'form-control',
        'placeholder'=>'Enter Name',

    ]) !!}
    </div>

</div>

<div class="form-group row">

    {!! Form::label('date_of_birth','Date of Birth',[

        'class' => 'col-sm-2 col-form-label'

    ]) !!}

    <div class="col-sm-10">

    {!! Form::date('date_of_birth', old("date_of_birth") ? old("date_of_birth") : (!empty($employeedetail) ? $employeedetail->date_of_birth : null), [

        'class'=>'form-control',
        'placeholder'=>'Enter Date',

    ]) !!}
    </div>

</div>

<fieldset class="form-group">

    <div class="row">

        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
        <div class="col-sm-10">
            <div class="form-check">

                <input class="form-check-input" type="radio" name="gender" id="gender1" value="Male" checked>
                <label class="form-check-label" for="gender1">
                    Male
                </label>

            </div>
            <div class="form-check">

                <input class="form-check-input" type="radio" name="gender" id="gender2" value="Female">
                <label class="form-check-label" for="gender2">
                    Female
                </label>

            </div>

        </div>

    </div>

</fieldset>

<div class="form-group row">
<label for="hobbies" class="col-sm-2 col-form-label">Hobby</label>

    <div class="col-sm-10">

        <select id="hobbies" class="form-control" name="hobby">
            <option selected>Choose...</option>
            <option>Playing Cricket</option>
            <option>Playing Football</option>
        </select>

    </div>
</div>

<div class="form-group row">

    <label for="skills" class="col-sm-2 col-form-label">Skills</label>

    <div class="col-sm-10">

        <textarea type="text" class="form-control" id="skills" rows="3" name="skills"></textarea>

    </div>

</div>

<div class="form-group row">

    <label for="bios" class="col-sm-2 col-form-label">Bio</label>

    <div class="col-sm-10">

        <textarea class="form-control" id="bios" rows="3" name="bio"></textarea>

    </div>

</div>

<div class="form-group row">

    <label for="pics" class="col-sm-2 col-form-label">Picture</label>

    <div class="col-sm-10">

        <input type="file" class="form-control-file" id="pics" name="picture">

    </div>




</div>



<div class="form-group">

    {{Form::submit('Submit Form',
         [
            "class" => "btn btn-primary"
         ])
     }}

</div>

