@extends('latihan.layouts.main')

@section('title', 'Class Delete')

@section('content')

    <div class="mt-10">
        <h1>Apakah anda yakin akan mendelete class : {{ $class->name }}</h1>
    </div>

    <div class="mt-10">
        <form action="/class-destroy/{{ $class->id }}" style="display: inline-block" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="danger">Delete</button>
        </form>

        <button>
            <a href="/class">Cancel</a>
        </button>
    </div>

@endsection
