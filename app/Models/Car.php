<?php
//https://www.youtube.com/watch?v=RREsRLuV6OY
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name','manufacture_year','engine_capacity','fuel_type'];

    protected $table = "car";

    protected $primaryKey = "id";


    use HasFactory;

    
}
