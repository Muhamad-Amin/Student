<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Student extends Model
{
    // use HasFactory;
    // use SoftDeletes;
    // bawah lebih singkat
    use HasFactory,SoftDeletes;


    // berikut yang bisa kita set up di file model

    // berikut jika tidak ada kolom yang bernama created_at dan updated_at dalam table ( harus taruh di atas )
    // protected $timestamps = false;
    protected $table = 'students';
    // untuk menghubungkan dengan table yang ada di database

    // setup primaryKey ( kata kunci ) khusus untuk yang bukan id primarynya
    // berlaku jika primaryKey nya bukan id ( kalau id tak perlu di tulis )
    // protected $primaryKey = 'nama_id';


    // berikut jika primaryKey bukan AI ( auto increment )
    // public $incrementing = false;

    // berikut untuk memberitahu kepada laravel apa type primaryKey nya
    // protected $keyType = 'string';

    // di bawah kita akan mendaftarkan nama kolom yang akan kita insert / masukkan lewat controller dengan metde eloquent
    protected $fillable = [
        'name', 'gender', 'nis', 'class_id'
    ];

    // di bawah ini relationship jenis many to one ( banyak untuk satu )

    public function class() // class = nama function ( bebas )
    {
        return $this->belongsTo(ClassRoom::class);
        // ClassRoom = nama model yang akan menjadi relationship
        // jika forenkeynya bukan id maka tambahkan = , 'foreign_key', 'other_key' setelah ClassRoom::class
        // jika forenkey kedua table menggunakan id maka bisa tidak di tulis foreign_key dan
    }


    public function extracurriculars()
    {
        return $this->belongsToMany(Extracurricular::class, 'student_extracurricular', 'student_id', 'extracurricular_id');
        // student_extracurricular = nama pivot ( table penghubung ) yang telah di buat menggunakan migration
        // student_id = nama prymarekey dari table student
        // extracurricular_id = nama prymarekey dari table extracurricular
    }


}
