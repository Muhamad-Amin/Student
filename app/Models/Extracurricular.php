<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Extracurricular extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'extracurriculars';

    protected $fillable = [
        'name'
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_extracurricular' ,'extracurricular_id', 'student_id');
    }

}
