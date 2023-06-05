@extends('latihan.layouts.main')

@section('title', 'Detail siswa')

@section('content')

    <h2>
        anda sedang melihat data detail dari siswa yang bernama {{ $student->name }}
    </h2>


    <table>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Homeroom Teacher</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->nis }}</td>
                <td>
                    @if ($student->gender == 'P')
                        Perempuan
                    @else
                        Laki-Laki
                    @endif
                </td>
                <td>{{ $student->class->name }}</td>
                <td>{{ $student->class->homeroomTeacher->name }}</td>
            </tr>
        </tbody>
    </table>

    <div>
        <h3>Extracurriculas</h3>
        <ol>
            @foreach ($student->extracurriculars as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ol>
    </div>

@endsection
