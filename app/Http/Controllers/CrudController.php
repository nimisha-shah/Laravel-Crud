<?php
//https://techsolutionstuff.com/post/laravel-9-ajax-crud-operations-with-popup-modal
//https://www.youtube.com/watch?v=RREsRLuV6OY

namespace App\Http\Controllers;
use App\Models\Car;

use Illuminate\Http\Request;

class CrudController extends Controller
{
    //
    public function showAllCars(){
        $allcars = Car::all();        
        return view('car/show',compact('allcars'));
    }

    // public function create(){
    //     return view('car/create');
    // }

    public function addCar(Request $request){
        
        print_r($request->all());
        exit();
        return view('car/show');
    }
}
