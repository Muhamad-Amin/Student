<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtracurriculrCreateRequest;
use Illuminate\Http\Request;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Session;

class ExtracurricularController extends Controller
{
    public function index(Request $request){
        // di bawah di sarankan
        // $ekskul = Extracurricular::with('students')->get();

        $keyword = $request->keyword;

        // saya sedang butuh di bawah untuk ikut tutor
        $ekskul = Extracurricular::where('name', 'LIKE', '%'.$keyword.'%')->paginate(15);

        // students = nama function yang dibuat di model
        return view('latihan.extracurricular', [
            'ekskulList'=> $ekskul
        ]);

    }
    public function show($id) {
        $ekskul = Extracurricular::with('students')->findOrFail($id);
        return view('latihan.extracurricular-detail', ['ekskul'=> $ekskul]);
    }

    public function create() {
        return view('latihan.extracurricular-add');
    }

    public function store(ExtracurriculrCreateRequest $request){
        $ekskul = new Extracurricular;
        $ekskul = Extracurricular::create($request->all());

        if($ekskul){
            Session::flash('status', 'success');
            Session::flash('message', 'add new extracurricular success!');
        }

        return redirect('ekstracullicurars');
    }

    public function delete($id) {
        $ekskul = Extracurricular::findOrFail($id);
        return view('latihan.extracurricular-delete', ['ekskul' => $ekskul]);
    }

    public function destroy($id) {
        $deletedekstracullicurar = Extracurricular::findOrFail($id)->delete();
        if($deletedekstracullicurar){
            Session::flash('status', 'success');
            Session::flash('message', 'delete extracurricular success!');
        }
        return redirect('ekstracullicurars');
    }

    public function deletedExtracurricular() {
        $deletedExtracurricular = Extracurricular::onlyTrashed()->get();
        return view('latihan.extracurricular-deleted-list', ['ekskul' => $deletedExtracurricular]);
    }

    public function restore($id) {
        $deletedekstracullicurar = Extracurricular::withTrashed()->where('id', $id)->restore();

        if($deletedekstracullicurar){
            Session::flash('status', 'success');
            Session::flash('message', 'restore extracurricular success!');
        }
        return redirect('ekstracullicurars');
    }
}
