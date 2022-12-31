<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        
    ];

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
}
