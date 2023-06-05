@extends('latihan.layouts.main')

@section('title', 'Class Deleted List')

@section('content')

    <h1>Ini halaman Class yang sudah di delete</h1>

    <div class="mt-10">
        <button>
            <a href="/class">Back</a>
        </button>
    </div>

    <div class="mt-10">
        <table>
            <thead>
                <th>NO</th>
                <th>Nama</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($class as $data)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a href="class/{{ $data->id }}/restore">restore</a>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
