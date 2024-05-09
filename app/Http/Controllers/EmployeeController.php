<?php
//Modify column
//https://laracoding.com/how-to-change-a-table-column-type-using-laravel-migrations/

//Image upload : 
//https://www.fundaofwebit.com/post/laravel-10-crud-with-image-upload-tutorial-with-example

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();        
        return view("employee.index",compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view("employee.create",compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        //Add employee
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'mobile'=>'required|min:10',
            'image'=>'required|mimes:jpg,jpeg,png,bmp'
        ]);

        $firstname = $request->post('firstname');
        $lastname = $request->post('lastname');
        $email = $request->post('email');
        $mobile = $request->post('mobile');
        $country = $request->post('country');
        $address = $request->post('address');
        $gender = $request->post('gender');
        $hobby = $request->post('hobby');
        
        $hobbynew = implode(',',$hobby);       
        
        $filename = NULL;
        $path = NULL;

        if($request->has('image')){            
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;

            $path = 'uploads/employee/';
            $file->move($path, $filename);
        }
     
        $employee = new Employee();
        $employee->fill([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'mobile' => $mobile,
            'email' => $email,
            'country' => $country,
            'address' => $address,
            'gender' => $gender,
            'hobby' => $hobbynew,
            'image'=> $filename
        ]);

        $employee->save();                
        return redirect()->route('employee.index')->with('message','Employee added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {    
        $employee = Employee::find($id);        
        $countryname = Country::find($employee->country)->name;               
        
        return view('employee.show')->with(['employee'=>$employee,'countryname'=>$countryname]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {        
        $countries = Country::all();
        $employee = Employee::findOrFail($id);
        $hobby = $employee->hobby;
        $exhobby = explode(',',$hobby);                
        return view('employee.edit',compact('countries','employee','exhobby'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'mobile'=>'required|min:10',
            'image'=>'required|mimes:jpg,jpeg,png,bmp'
        ]);
        $empOld = Employee::findOrFail($id);
        $empOld->firstname = $request->post('firstname');        
        $empOld->lastname = $request->post('lastname');
        $empOld->email = $request->post('email');
        $empOld->mobile = $request->post('mobile');
        $empOld->country = $request->post('country');
        $empOld->address = $request->post('address');
        $empOld->gender = $request->post('gender');
        $hobbyvalue = $request->post('hobby');        
        $empOld->hobby = implode(',',$hobbyvalue);    

        if($request->hasFile('image')){ 

            if(File::exists($empOld->image)){
                File::delete('uploads/employee/'.$empOld->image);
            }  

            $file = $request->image;
            $extension = $file->getClientOriginalExtension();

            $empOld->image = $image = time().'.'.$extension;

            $path = 'uploads/employee/';
            $file->move($path, $image);

                      
        }
        
        $empOld->save();

        // $empOld->update([
        //     'firstname' => $firstname,
        //     'lastname' => $lastname,
        //     'mobile' => $mobile,
        //     'email' => $email,
        //     'country' => $country,
        //     'address' => $address,
        //     'gender' => $gender,
        //     'hobby' => $hobbynew
        // ]);

        return redirect()->back()->with('message','Employee updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
    
        return redirect()->route('employee.index')
                        ->with('message','User deleted successfully');
    }
}
