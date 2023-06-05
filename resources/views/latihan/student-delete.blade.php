@extends('latihan.layouts.main')

@section('title', 'Student delete')

@section('content')

    <div class="mt-10">
        <h2>Are you sure to delete data : {{ $student->name }} ({{ $student->nis }})</h2>

        <form action="/student-destroy/{{ $student->id }}" style="display: inline-block" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="danger">Delete</button>
        </form>
        <button><a href="/students">Cancel</a></button>
    </div>

@endsection
