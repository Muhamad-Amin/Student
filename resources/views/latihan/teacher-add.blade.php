@extends('latihan.layouts.main')

@section('title', 'Add New Teacher')

@section('content')

    <div class="mt-10">

        @if ($errors->any())
            <div class="mt-10">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="teacher" method="post">
            @csrf

            <div class="mt-10">
                <label for="name">Name : </label>
                <input type="text" name="name" id="name">
            </div>

            <div class="mt-10">
                <button type="submit">Save</button>
            </div>

        </form>

    </div>

@endsection
