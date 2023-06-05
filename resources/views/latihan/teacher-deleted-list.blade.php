@extends('latihan.layouts.main')

@section('title', 'Teacher Deleted List')

@section('content')
    <h1>Ini halam teacher yang sudah anda delete</h1>

    <div class="mt-10">
        <table>
            <thead>
                <th>NO</th>
                <th>Nama</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($teacher as $data)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a href="/teacher/{{ $data->id }}/restore">restore</a>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
