@extends('latihan.layouts.main')

@section('title', 'Ektracullicular')

@section('content')

    <h1>Ini Halaman Extracurriculars</h1>

    <div class="between">
        <button><a href="extracurricular-add">Add data</a></button>
        <button><a href="extracurricular-deleted">Show Deleted Data</a></button>
    </div>

    @if (Session::has('status'))
        <div class="mt-10 notif">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Ekstracurricular List</h3>

    <div class="mb-10">
        <form action="" method="get">
            <div class="mt-10">
                <input type="text" name="keyword" placeholder="keyword">
                <button>Search</button>
            </div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekskulList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a href="extracurricular-detail/{{ $data->id }}">detail</a>
                        <a href="extracurricular-delete/{{ $data->id }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button>{{ $ekskulList->withQueryString()->links() }}</button>
@endsection
