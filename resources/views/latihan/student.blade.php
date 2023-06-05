@extends('latihan.layouts.main')

@section('title', 'Students')

@section('content')

    <h1>Ini Halaman Students</h1>

    <div class="between">
        <button><a href="student-add">Add data</a></button>
        <button><a href="student-deleted">Show Deleted Data</a></button>
    </div>

    @if (Session::has('status'))
        <div class="mt-10 notif">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Student List</h3>

    <div class="mb-10">
        <form action="" method="get">
            <div class="mt-10">
                <input type="text" name="keyword" placeholder="Keyword">
                <button>Search</button>
            </div>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->class->name }}</td>
                    <td>
                        <a href="student/{{ $data->id }}">detail</a>
                        <a href="student-edit/ {{ $data->id }}">edit</a>
                        <a href="student-delete/{{ $data->id }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-10">
        <button>{{ $studentList->withQueryString()->links() }}</button>
    </div>
@endsection
