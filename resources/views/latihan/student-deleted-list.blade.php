@extends('latihan.layouts.main')

@section('title', 'Student Deleted List')

@section('content')

    <h1>Ini Halaman Student yang sudah di delete</h1>

    <div class="mt-10">
        <button><a href="students">Back</a></button>
    </div>

    <div class="mt-10">
        <table>
            <thead>
                <th>No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>NIS</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($student as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>
                            <a href="student/{{ $data->id }}/restore">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
