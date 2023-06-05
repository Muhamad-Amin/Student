<?php

namespace App\Http\Controllers;

// menghubungkan controller dengan model

use App\Models\Student;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentCreateRequest;

class studentController extends Controller
{
    public function index(Request $request) {

        // queri builder ( lumayan di sarankan )
        // $student = DB::table('students')->get();
        // $student = variabel baru yang di pakai untuk menampung data dari data base
        // DB::table('namaTable')->get(); = untuk mengambil data dari table mana ?

        // eloquent ( sangat di sarankan )
        // $student = student::all();
        // $student = nama variabel baru untuk menampung data dari model yang mengambil databse
        // student = nama model


        // menambahkan data


        // queri builder ( insert )

        // DB::table('students')->insert([
            // students = nama table yang akan di tambahkan datanya
            //     'name' => 'queri builder',
            //     'gender' => 'L',
            //     'nis' => '0201021',
            //     'class_id' => 1
            // ]);

        // eloquent ( create )

        // Student::create([
        //     'name' => 'eloquent',
        //     'gender' => 'P',
        //     'nis' => '0201033',
        //     'class_id' => 2
        // ]);


        // update data


        // queri builder

        // DB::table('students')->where('id', 28)->update([ // mengupdate yang id nya 28
        //     'name' => 'bagong',
        //     'class_id' => 3
        // ]);

        // eloquent
        // Student::find(27)->update([ // mengupdate yang memiliki id 27
        //     'name' => 'bagong baging',
        //     'class_id' => 1
        // ]);


        // delete data


        // queri builder

        // DB::table('students')->where('id', 27)->delete();
        // hapus data id 27

        // eloquent

        // Student::find(28)->delete();
        // hapus data id 28


        // mengambil data dari database lewat controller

        // mengambil semua data yang ada di database
        // $student = student::all();
        // $student = variabel baru yang akan di pakai untuk menampung data dari database
        // student = nama model yang terhubung dengan database

        // mengembalikan ke view di dalam folder latihan dan file bernama student
        // return view('latihan.student', [
        //     // disini kita bisa memasukkan apa yang ingin kita kirim
        //     'studentList' => $student
        // ]);


        // collection

        // $nilai = [9, 8, 7, 6, 4, 8, 9, 1, 10, 3, 9, 7, 1, 5, 3, 9];

        // Collection adalah sebuah wreaper ( pembungkus ) dari  data of array atau data yang berupa array yang di dalamnya dibuatkan banyak helpper untuk membantu dalam memproses data.

        // contoh penggunaan collection untuk mencari nilai rata-rata
        // $rataRata = collect($nilai)->avg(); // atau ->average();

        //  berikut bebrapa method yang bisa kita gunakan pada collection

        // 1. contains = cek apakah sebuah array mempunyai sesuatu. berikut contoh penulisannya :


        // $conta = collect($nilai)->contains(10); // mecari nilai 10 di dalam array yang bernama $nilai

        // tidak hanya angka yang bisa kita masukkan. kita juga bisa melakukan pengkondisian. berikut contoh penulisannya :
        // $conta = collect($nilai)->contains(function($value){ // $value = perwakilan dari array $nilai
        //     return $value < 6;
        // });

        // dd($conta);

        // 2. diff = Bisa membantu kita mendapatkan data-data perbandingan antara array satu  dan lainnya yang gak ada datanya di array yang di bandingkan. berikut contohnya :

        // $retauranA = ['burger', 'siomay', 'pizza', 'spaghetti', 'makaroni', 'martabak', 'bakso'];
        // $retauranB = ['pizza', 'fried chicken', 'martabak', 'sayur asam', 'pecel lele', 'bakso'];

        // $menuRestoA = collect($retauranA)->diff($retauranB);
        // dd($menuRestoA); // mencari menu yang gak ada di retauran B
        // $menuRestoB = collect($retauranB)->diff($retauranA);
        // dd($menuRestoB); // mencari menu yang gak ada di retauran A

        // 3. filter = menyaring. berikut contohnya

        // $nilai = [9, 8, 7, 6, 4, 8, 9, 1, 10, 3, 9, 7, 1, 5, 3, 9];
        // $fil = collect($nilai)->filter(function($value){
            //     return $value > 7;
            // })->all(); // menampilkan semua isi array yang lebih dari 7

            // dd($fil);

            // 4. fluck = menampilkan data yang kita inginkan dari array di dalam array

            // $biodata = [
                //     ['nama'=>'budi', 'umur' => 17],
                //     ['nama'=>'ani', 'umur' => 16],
                //     ['nama'=>'siti', 'umur' => 17],
                //     ['nama'=>'rudi', 'umur' => 20],
                // ];

                // $flu = collect($biodata)->pluck('nama'); // ->all(); bisa di tambahkan bisa tidak. hanya menampilkan data nama

                // dd($flu);


        // 5. map = lebih mengarah ke perulangan

        // $nilai = [9, 8, 7, 6, 4, 8, 9, 1, 10, 3, 9, 7, 1, 5, 3, 9];
        // // contoh mencari hasil dari nilai di kali 2 dari data yang ada di array $nilai
        // $kaliDua = collect($nilai)->map(function ($value){
        //     return $value * 2 ;
        //     // 9 * 2 = 18
        //     // 8 * 2 = 16
        //     // dan seterusnya sampai isi array habis
        // });

        // dd($kaliDua);


        // di bawah lebih ringkasnya

        // $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->get();
        // class.homeroomTeacher = memanggil relasi class dan teacher

        $keyword = $request->keyword;

        // di bawah yang sedang saya butuhkan
        // $student = Student::paginate(15);
        $student = Student::with('class')->where('name', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('gender', $keyword)->orWhere('nis', 'LIKE', '%'.$keyword.'%')->
                            orWhereHas('class', function($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%'.$keyword.'%');
                            })
                            ->paginate(15);


        return view('latihan.student', ['studentList' => $student]);

    }


    // di bawah untuk detail data
    public function show($id) {

        $student = Student::with(['class.homeroomTeacher', 'extracurriculars'])->findOrFail($id);
        return view('latihan.student-detail', [ 'student' => $student ]);

    }

    public function create() {
        $class = ClassRoom::select('id', 'name')->get(); // select('id', 'name') = mengambil id dan name
        // ClassRoom = nama model yang memiliki relasi dengan kelas
        return view('latihan.student-add', [ 'class' => $class]);
    }


    public function store(StudentCreateRequest $request) {

        $student = new Student;
        // Student = nama model

        // // di bawah cara biasa
        // // di bawah untuk memasukkan data dari database
        // $student->name = $request->name;
        // // $request->name = name = name yan ada di dalam tag input
        // $student->gender = $request->gender;
        // $student->nis = $request->nis;
        // $student->class_id = $request->class_id;
        // // di bawah untuk menyimpan
        // $student->save;


        // // cara mas asigment
        // $student->created([
        //     // data yang akan di inputkan
        // ]);
        // cara memasukkan seluruh data
        $student= Student::create($request->all());
        // // bisa juga di buat tanpa variabel . contoh di bawah ini
        // Student::create($request->all());


        // di bawah notifikasi penambahan data
        if ($student){
            // berikut sintaks session
            Session::flash('status' , 'success');
            // status = keyword
            // success = nilai
            Session::flash('message', 'add new student success!');
            // massage = yang akan di tampilkan di halaman view
        }


        // di bawah untuk mengembalikan ke view yang memilii route students
        return redirect('/students');
    }

    public function edit(Request $request, $id) {
        $student = Student::with('class')->findOrFail($id);
        // :with('class') = menghubungkan dengan relasi nya
        // $class = ClassRoom::select('id', 'name')->get();
        // di bawah lebih ringkasnya
        $class = ClassRoom::where('id', '!=', $student->class_id)->get(['id', 'name']);
        // ClassRoom = nama model
        // where('id', '!=', $student->class_id) = kirimkan data yang bukan id dari classnya. contoh :
        // udin kelas 1 A. maka jangan kirim data kelas 1A
        return view('latihan.student-edit', [
            'student' => $student,
            'class' => $class
        ]);
    }

    public function update(StudentCreateRequest $request, $id) {
        $student = Student::findOrFail($id);

        // ini menggunakan mass asgiment
        $student->update($request->all());

        if($student) {
            Session::flash('status', 'succes');
            Session::flash('message', 'update student success!');
        }

        return redirect('students');
    }

    public function delete($id) {
        $student = Student::findOrFail($id);
        return view('latihan.student-delete', ['student' => $student]);
    }

    public function destroy($id) {

        // di bawah menggunakan query builder
        // $deletedStudent = DB::table('students')->where( 'id', $id)->delete();
        /**
         * di atas akan mencari table students
         * yang id nya sesuai dengan yang telah kita kirimkan
         * lalu menghapusnya
         */


        // di bawah menggunakaneloduent
        $deletedStudent = Student::findOrFail($id)->delete(); // ini lebih ringkas
        // $deletedStudent->delete();
        /**
         * Student = model
         * findOrFail = mencari id yang sesuai jika tidak sesuai akan not found
         * delete = hapus
         */

        if ($deletedStudent) {
            Session::flash('status', 'succes');
            Session::flash('message', 'delete student succes!');
        }

        return redirect('students');
    }

    public function deletedStudent () {
        $deletedStudent = Student::onlyTrashed()->get();
        // onlyTrashed() = untuk menampilkan data yang telah di hapus menggunaan soft delete
        return view('latihan.student-deleted-list', ['student' => $deletedStudent]);
    }

    public function restore ($id) {
        $deletedStudent = Student::withTrashed()->where('id', $id)->restore();
        // akan mengembalikan data yang id nya di kirim yang telah di hapus menggunakan soft delete
        Session::flash('status', 'succes');
        Session::flash('message', 'restore student success!');
        return redirect('students');
    }
}
