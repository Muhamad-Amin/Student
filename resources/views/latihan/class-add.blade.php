@extends('latihan.layouts.main')

@section('title', 'Add New Class')

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

        <form action="/class" method="post">
            @csrf

            <div class="mt-10">
                <label for="class">Class : </label>
                <input type="text" name="name" id="class">
            </div>

            <div class="mt-10">
                <label for="homeroom teacher">Homeroom Teacher</label>
                <select name="teacher_id" id="homeroom teacher">
                    <option value="">Select One</option>
                    @foreach ($teacher as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-10">
                <button type="submit">Save</button>
            </div>

        </form>
    </div>
@endsection
