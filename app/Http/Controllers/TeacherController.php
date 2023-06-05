<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherCreateRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{


    public function index(Request $request) {
        $keyword = $request->keyword;
        $teacher = Teacher::where('name', 'LIKE', '%'.$keyword.'%')->paginate(15);
        return view('latihan.teacher', [ 'teacherList' => $teacher ] );
    }

    public function show($id) {
        $teacher = Teacher::with('class.students')->findOrFail($id);
        return view('latihan.teacher-detail', ['teacher' => $teacher]);
    }

    public function create() {
        return view('latihan.teacher-add');
    }

    public function store(TeacherCreateRequest $request) {
        $teacher = new Teacher;
        $teacher = Teacher::create($request->all());

        if($teacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'add new teacher success!');
        }

        return redirect('teachers');
    }

    public function delete($id) {
        $deletedTeacher = Teacher::findOrFail($id);
        return view('latihan.teacher-delete', ['teacher' => $deletedTeacher]);
    }

    public function destroy($id) {
        $deletedTeacher = Teacher::findOrFail($id)->delete();
        if($deletedTeacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'delete teacher success!');
        }
        return redirect('teachers');
    }

    public function deletedTacher() {
        $deletedTeacher = Teacher::onlyTrashed()->get();
        return view('latihan.teacher-deleted-list', ['teacher' => $deletedTeacher]);
    }

    public function restore($id) {
        $deletedTeacher = Teacher::withTrashed($id)->where('id', $id)->restore();
        if($deletedTeacher) {
            Session::flash('status', 'success');
            Session::flash('message', 'restore teacher success!');
        }
        return redirect('teachers');
    }
}
