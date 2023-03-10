<?php
  
namespace App\Models;
  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Faculty extends Model
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

    ];

    public function lecturers()
    {
        return $this->hasMany(Users::class, 'lectuerer_id');
    }
   
}