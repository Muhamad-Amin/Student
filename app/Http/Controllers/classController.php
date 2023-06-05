<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassCreateRequest;
use App\Models\Teacher;
use App\Models\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class classController extends Controller
{
    public function index(Request $request) {

        // mengambil database lewat model

        // lazy load
        // $class = ClassRoom::all();

        // eager load ( di sarankan )
        // $class = ClassRoom::with('students', 'homeroomTeacher')->get();

        $keyword = $request->keyword;

        // saya sedang butuh di bawah ini untuk mengikuti tutorial
        $class = ClassRoom::where('name', 'LIKE', '%'.$keyword.'%')->paginate(15);

        // mengembalikan ke view di dalam folder latihan dan file bernama class
        return view('latihan.classroom', [
            'classList' => $class
        ]);
    }

    public function show($id) {
        $class = ClassRoom::with(['students', 'homeroomTeacher'])->findOrFail($id);

        return view('latihan.class-detail', ['class' => $class]);
    }

    public function create() {
        $teacher = Teacher::select('id', 'name')->get();
        return view('latihan.class-add', [ 'teacher' => $teacher]);
    }

    public function store(ClassCreateRequest $request) {
        $class = new ClassRoom;
        $class = ClassRoom::create($request->all());

        if ($class){
            Session::flash('status', 'success');
            Session::flash('message', 'add new class success!');
        }

        return redirect('/class');
    }

    public function delete ($id) {
        $class = ClassRoom::findOrFail($id);
        return view('latihan.class-delete', ['class' => $class]);
    }

    public function destroy ($id) {
        $deletedClass = ClassRoom::findOrFail($id)->delete();
        if($deletedClass) {
            Session::flash( 'status' ,'success');
            Session::flash('message', 'delete class success!');
        }
        return redirect('class');
    }

    public function deletedClass() {
        $deletdClass = ClassRoom::onlyTrashed()->get();
        return view('latihan.class-deleted-list', ['class' => $deletdClass]);
    }

    public function restore($id) {
        $deletdClass = ClassRoom::withTrashed()->where('id', $id)->restore();
        if($deletdClass) {
            Session::flash('status', 'succes');
            Session::flash('message', 'restore class success!');
        }
        return redirect('class');
    }
}
