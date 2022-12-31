<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
