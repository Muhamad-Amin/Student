@extends('latihan.layouts.main')

@section('title', 'detail extracurricular')

@section('content')

    <h1>Selamat datang di data detail extracurricular {{ $ekskul->name }}</h1>


    <div>

        <h3>List Peserta</h3>

        <ol>
            @foreach ($ekskul->students as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

@endsection
