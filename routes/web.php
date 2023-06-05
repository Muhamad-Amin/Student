<?php

use Illuminate\Support\Facades\Route;

// untuk memangggil controller


// untuk class controller
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\classController as ClassController;
use App\Http\Controllers\studentController as StudentController;

// di atas untuk mengakses controllernya

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', function () {
//     return "Hello world";
// });


// Route::get('/tes', function () {
//     return view('tes', [ 'nama' => 'Muhamad Amin', 'Kelas' => 'X-RPL 1', 'Alamat' => 'Apitaik', 'No' => '085339029310']);
// });

// di bawah ini cara lebih singkat

// Route::view('/tes', 'tes', [ 'nama' => 'Muhamad Amin', 'Kelas' => 'X-RPL 1', 'Alamat' => 'Apitaik', 'No' => '085339029310']);

// Route::view('/about', '/');



// Route::get('harga', [HargaController::class, 'tampilkan']);
// get untuk ke controller
// buat route dari link harga harga ke class harga controller
// tampilkan adalah nama function dari controller


// menghubungkan dengan file home yang ada di dalam folder latihan
Route::get('/home', function(){
    return view('latihan.home');
});

Route::get('students', [studentController::class, 'index']);
Route::get('student/{id}',[studentController::class, 'show']);
Route::get('student-add', [StudentController::class, 'create']);
Route::post('student', [StudentController::class, 'store']);
// post = agar kita bisa menggunakan method post
Route::get('/student-edit/{id}', [StudentController::class, 'edit']);
Route::put('/student/{id}', [StudentController::class, 'update']);
// laravel tidak bakal bingung karna method nya beda
Route::get('/student-delete/{id}', [StudentController::class, 'delete']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy']);
Route::get('/student-deleted', [StudentController::class, 'deletedStudent']);
Route::get('student/{id}/restore', [StudentController::class, 'restore']);


// menghubungkan dengan file class yang ada di dalam folder latihan

Route::get('/class', [classController::class, 'index']);
Route::get('class-detail/{id}', [ClassController::class, 'show']);
Route::get('class-add', [classController::class, 'create']);
Route::post('class', [classController::class, 'store']);
// laravel tidak akan bingung karena method yang di gunakan berbeda dengan yang di atas
Route::get('class-delete/{id}', [classController::class, 'delete']);
Route::delete('class-destroy/{id}', [classController::class,'destroy']);
Route::get('class-deleted', [classController::class, 'deletedClass']);
Route::get('class/{id}/restore', [ClassController::class, 'restore']);

Route::get('ekstracullicurars', [ExtracurricularController::class, 'index']);
Route::get('extracurricular-detail/{id}', [ExtracurricularController::class, 'show']);
Route::get('extracurricular-add', [ExtracurricularController::class, 'create']);
Route::post('extracurricular', [ExtracurricularController::class, 'store']);
Route::get('extracurricular-delete/{id}', [ExtracurricularController::class, 'delete']);
Route::delete('ekstracullicurar-destroy/{id}', [ExtracurricularController::class, 'destroy']);
Route::get('extracurricular-deleted', [ExtracurricularController::class, 'deletedExtracurricular']);
Route::get('ekstracullicurar/{id}/restore', [ExtracurricularController::class, 'restore']);

Route::get('/teachers', [TeacherController::class, 'index']);
Route::get('teacher-detail/{id}', [TeacherController::class, 'show']);
Route::get('teacher-add', [TeacherController::class, 'create']);
Route::post('teacher', [TeacherController::class, 'store']);
Route::get('teacher-delete/{id}', [TeacherController::class, 'delete']);
Route::delete('/teachers-destroy/{id}', [TeacherController::class, 'destroy']);
Route::get('teacher-deleted', [TeacherController::class, 'deletedTacher']);
Route::get('teacher/{id}/restore', [TeacherController::class, 'restore']);

