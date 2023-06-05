@extends('latihan.layouts.main')

@section('title', 'detail kelas')

@section('content')

    <h1>Selamat datang di data detail class {{ $class->name }}</h1>


    <div>

        <h4>
            Homeroom Teacher :{{ $class->homeroomTeacher->name }}
        </h4>

    </div>

    <div>

        <h5>List Student</h5>

        <ol>
            @foreach ($class->students as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>

    </div>

@endsection
