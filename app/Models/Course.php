<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Course extends Model
{
    use HasFactory;
  
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'name', 
        'code',
        'description',
        // 'status'
    ];


    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }

    public function students()
    {
        return $this->hasMany(User::class, 'student_id');
    }


}
