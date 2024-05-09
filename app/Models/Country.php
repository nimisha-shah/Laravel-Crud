<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table ="country";
    protected $primaryKey = "id";
    protected $fillable=['name','code'];
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
