@extends('latihan.layouts.main')

@section('title', 'Extracurricular Delete')

@section('content')

    <h1>Apakah anda yakin akan mendelete Extracurricular : {{ $ekskul->name }}</h1>

    <form action="/ekstracullicurar-destroy/{{ $ekskul->id }}" style="display: inline-block" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="danger">Delete</button>
    </form>
    <button><a href="/ekstracullicurars">Back</a></button>
@endsection
