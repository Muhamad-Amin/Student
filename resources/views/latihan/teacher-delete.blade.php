@extends('latihan.layouts.main')

@section('title')

@section('content')

    <h1>Apakah anda yakin akan men delete teacher : {{ $teacher->name }}</h1>

    <div class="mt-10">
        <form action="/teachers-destroy/{{ $teacher->id }}" style="display: inline-block" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="danger">Delete</button>
        </form>
        <button><a href="/teachers">Cancel</a></button>
    </div>

@endsection
