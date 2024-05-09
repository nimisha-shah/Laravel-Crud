<?php
//https://techvblogs.com/blog/laravel-10-crud-example-tutorial-for-beginners
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employee";
    protected $primaryKey = "id";
    protected $fillable = ['firstname','lastname','email','mobile','country','address','gender','hobby','image'];
    use HasFactory;

    public function country()
    {
        return $this->hasOne(Country::class);
    }
}
