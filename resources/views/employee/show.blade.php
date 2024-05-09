@extends('employee.layout')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Employee Information
                </div>
                <div class="float-end">
                    <a href="{{ route('employee.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="firstname" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->firstname }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>Email:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->email }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="mobile" class="col-md-4 col-form-label text-md-end text-start"><strong>Mobile:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->mobile }}--{{ $countryname }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Address:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->address }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Gender:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        @if($employee->gender == 'F') 
                        <span>Female</span>
                        @else 
                        <span>Male</span>
                        @endif 
                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Hobby:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $employee->hobby }}
                        </div>
                    </div>
                   
                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Image:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            <img src="{{ url('uploads/employee/'.$employee->image) }}" alt="Pic" width="400" height="400"></img>
                        </div>
                    </div>
                   
        
            </div>
        </div>
    </div>    
</div>
    
@endsection