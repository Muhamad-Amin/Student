@extends('latihan.layouts.main')

@section('title', 'Add New Student')

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

        <form action="/student/{{ $student->id }}" method="post">
            @csrf
            @method('PUT')

            <div class="mt-10">
                <label for="name">Name : </label>
                <input type="text" name="name" id="name" value="{{ $student->name }}">
            </div>

            <div class="mt-10">
                <label for="gender">Gender : </label>
                <select name="gender" id="gender">
                    <option value="{{ $student->gender }}">{{ $student->gender }}</option>
                    @if ($student->gender == 'L')
                        <option value="P">P</option>
                    @else
                        <option value="L">L</option>
                    @endif
                </select>
            </div>

            <div class="mt-10">
                <label for="nis">NIS : </label>
                <input type="text" name="nis" id="nis" value="{{ $student->nis }}">
            </div>

            <div class="mt-10">
                <label for="class">Class : </label>
                <select name="class_id" id="class">
                    <option value="{{ $student->class->id }}">{{ $student->class->name }}</option>
                    @foreach ($class as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mt-10">
                <button type="submit">
                    update
                </button>
            </div>

        </form>
    </div>

@endsection
