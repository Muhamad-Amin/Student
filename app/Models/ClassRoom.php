<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory,SoftDeletes;

    // menghubungkan dengan tabel yang bernama classdi dalam database
    protected $table = 'class';

    protected $fillable = [
        'name',
        'teacher_id'
    ];


    // lihat file model yang bernama Student agar lebih mengerti atau paham
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }


    public function homeroomTeacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }

}
