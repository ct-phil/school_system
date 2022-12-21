<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Student extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [ 
        'first_name',
        'middle_name',
        'surname',
        'father_name',
        'father_phone',
        'mother_name',
        'mother_phone',
        'sex',
        'email',
        'dob',
        'address',
        'nationality',
        

    ];
}