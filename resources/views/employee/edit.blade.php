@extends('employee.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <h1>Edit Employee</h1>
        </div>
        <div class="float-end">
         <a href="{{ route('employee.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
         </div>
    </div>

    <div>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    </div>

    <div class="card-body">
        <form class="" action="{{ url('employee',$employee->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div>
            <label>First Name</label></br>
            <input type="text" name="firstname" id="firstname" value='{{ $employee->firstname }}' class="form-control">
            @if ($errors->has('firstname'))
                <span class="text-danger">{{ $errors->first('firstname') }}</span>
            @endif
            </div>
            <br/>
            <div>
            <label>Last Name</label></br>
            <input type="text" name="lastname" id="lastname" value='{{ $employee->lastname }}' class="form-control">
            </div>
            @if($errors->has('lastname'))
            <span class="text-danger">{{ $errors->first('lastname') }}</span>
            @endif
            <br/>
            <div>
            <label>Email</label></br>
            <input type="text" name="email" id="email" value='{{ $employee->email }}' class="form-control">
            </div>
            <div class="row">
                <label>Mobile</label></br>
                <div class="col-md-6">
                <input type="text" name="mobile" id="mobile" value='{{ $employee->mobile }}' class="form-control">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                </div>
                
                <div class="col-md-6" class="form-select">
                <label>Country</label></br>
                    <select name="country" id="country">
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}"  {{ $employee->country == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
  <label for="address" class="form-label">Address</label>
  <textarea class="form-control" name="address" id="address" rows="3" cols="20">{{ $employee->address }}</textarea>
</div>

<div class="mb-3">
<label for="gender" class="form-label">Gender</label>
<input type="radio" name="gender" id="gender" value="M" class="form-check-input" {{ $employee->gender =='M' ? 'checked' : '' }}>Male
<input type="radio" name="gender" id="gender" value="F" class="form-check-input" {{ $employee->gender =='F' ? 'checked' : '' }}>Female
</div>

<div class="mb-3">
<label for="Hobby" class="form-label">Hobby</label>
<input type="checkbox" name="hobby[]" id="hobby[]" value="Dancing" {{ in_array('Dancing', $exhobby) ? 'checked' : '' }} class="form-check-input">Dancing
<input type="checkbox" name="hobby[]" id="hobby[]" value="Sports" {{ in_array('Sports', $exhobby) ? 'checked' : '' }} class="form-check-input">Sports
<input type="checkbox" name="hobby[]" id="hobby[]" value="Swim" {{ in_array('Swim', $exhobby) ? 'checked' : '' }} class="form-check-input">Swim
</div>

<div class="mb-3">
    <input type="file" name="image" id="image">
    @if ($employee->image)
    Photo Preview:
    <img src="{{ "/uploads/employee/".$employee->image  }}" width="200" height="200">
    @endif
</div>

      
<input type="submit" class="btn btn-primary" value="Save">
</form>
</div>
</div>
@endsection