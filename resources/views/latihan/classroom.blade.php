@extends('latihan.layouts.main')

@section('title', 'Class')

@section('content')

    <h1>Ini Halaman Class</h1>

    <div class="between">
        <button><a href="class-add">Add data</a></button>
        <button><a href="class-deleted">Show Deleted Data</a></button>
    </div>

    @if (Session::has('status'))
        <div class="mt-10 notif">
            {{ Session::get('message') }}
        </div>
    @endif

    <h3> Class List </h3>

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
                <th>NO</th>
                <th>name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($classList as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>
                        <a href="class-detail/{{ $data->id }}">detail</a>
                        <a href="class-delete/{{ $data->id }}">delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button>{{ $classList->withQueryString()->links() }}</button>
@endsection
