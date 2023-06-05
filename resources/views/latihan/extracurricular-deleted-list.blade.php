@extends('latihan.layouts.main')

@section('title', 'List Deleted Extracurriculars')

@section('content')

    <h1>Ini halaman extracurricular yang sudah di delete</h1>

    <div class="mt-10">
        <button><a href="ekstracullicurars">Back</a></button>
    </div>

    <table>
        <thead>
            <th>NO</th>
            <th>Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($ekskul as $data)
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    <a href="ekstracullicurar/{{ $data->id }}/restore">restore</a>
                </td>
            @endforeach
        </tbody>
    </table>
@endsection
