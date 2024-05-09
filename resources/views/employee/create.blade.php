@extends('employee.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h1>Add Employee</h1>
    </div>

    <div class="card-body">
        <form class="" action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div>
            <label>First Name</label></br>
            <input type="text" name="firstname" id="firstname" value='' class="form-control">
            @if ($errors->has('firstname'))
                <span class="text-danger">{{ $errors->first('firstname') }}</span>
            @endif
            </div>
            <br/>
            <div>
            <label>Last Name</label></br>
            <input type="text" name="lastname" id="lastname" value='' class="form-control">
            </div>
            @if($errors->has('lastname'))
            <span class="text-danger">{{ $errors->first('lastname') }}</span>
            @endif
            <br/>
            <div>
            <label>Email</label></br>
            <input type="text" name="email" id="email" value='' class="form-control">
            </div>
            <div class="row">
                <label>Mobile</label></br>
                <div class="col-md-6">
                <input type="text" name="mobile" id="mobile" value='' class="form-control">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                </div>
                
                <div class="col-md-6" class="form-select">
                <label>Country</label></br>
                    <select name="country" id="country">
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
  <label for="address" class="form-label">Address</label>
  <textarea class="form-control" name="address" id="address" rows="3" cols="20"></textarea>
</div>

<div class="mb-3">
<label for="gender" class="form-label">Gender</label>
<input type="radio" name="gender" id="gender" value="M" class="form-check-input">Male
<input type="radio" name="gender" id="gender" value="F" class="form-check-input">Female
</div>

<div class="mb-3">
<label for="Hobby" class="form-label">Hobby</label>
<input type="checkbox" name="hobby[]" id="hobby[]" value="Dancing" class="form-check-input">Dancing
<input type="checkbox" name="hobby[]" id="hobby[]" value="Sports" class="form-check-input">Sports
<input type="checkbox" name="hobby[]" id="hobby[]" value="Swim" class="form-check-input">Swim
</div>

<div class="mb-3">
    <input type="file" name="image" id="image">
</div>
@if($errors->has('image'))
    <span class="text-danger">{{ $errors->first('image') }}</span>
@endif
      
<input type="submit" class="btn btn-primary" value="Save">
</form>
</div>
</div>
@endsection