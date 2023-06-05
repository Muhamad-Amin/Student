@extends('latihan.layouts.main')

@section('title', 'Teacher')

@section('content')

    <h1>Ini Halaman Teacher</h1>

    <div class="between">
        <button><a href="/teacher-add">Add data</a></button>
        <button><a href="/teacher-deleted">Show Deleted Data</a></button>
    </div>

    @if (Session::has('status'))
        <div class="mt-10 notif">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3>Teacher List</h3>

    <div class="mb-10">
        <form action="" method="get">
            <div class="mt-10">
                <input type="text" name="keyword" placeholder="keyword">
                <button>Search</button>
            </div>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacherList as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="teacher-detail/ {{ $item->id }}">detail</a>
                        <a href="teacher-delete/{{ $item->id }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button>{{ $teacherList->withQueryString()->links() }}</button>
@endsection
