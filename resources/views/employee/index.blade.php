@extends('employee.layout')
@section('content')
<div class="card">
        <div class="card-header">
            <h1>Employee List</h1>
            <a href="{{ url('employee/create') }}" class="btn btn-primary">Add</a>
        </div>

       @if(Session::has('message'))
       <span class="alert alert-info">{{ Session::get('message') }}</span>
       @endif

        <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                    <thead>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Action</th>

                    </thead>
                    </tr>
                    @foreach($employees as $emp)
                    <tr>                       
                    <td>{{ $emp->firstname." ".$emp->lastname }}</td>
                    <td>{{ $emp->mobile }}</td>
                    <td>{{ $emp->email }}</td>
                    <td>
                    
                        <form action="{{ route('employee.destroy',$emp->id)}}" method="post">
                        @csrf
                        @method('DELETE')                        
                        <a href="{{ url('employee/'.$emp->id.'/edit') }}" class="btn btn-primary">Edit</a>

                        <a href="{{ route('employee.show',$emp->id) }}" class="btn btn-warning">View</a>

                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </table>
        </div>

</div>
@endsection