@extends('latihan.layouts.main')

@section('title', 'Teacher Detail')

@section('content')

    <h1>Selamat datang di data detail teacher yang bernama {{ $teacher->name }}</h1>

    <div>

        <h3>
            Class :
            @if ($teacher->class)
                {{ $teacher->class->name }}
            @else
                -
            @endif
        </h3>
    </div>

    <div>

        <h4>List Student</h4>

        @if ($teacher->class)
            <ol>
                @foreach ($teacher->class->students as $item)
                    <li>{{ $item->name }}</li>
                @endforeach
            </ol>
        @else
            -
        @endif
    </div>


@endsection
