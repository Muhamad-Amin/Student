@extends('latihan.layouts.main')

@section('title', 'Add New Student')

@section('content')

    @if ($errors->any())
        <div class="mt-10">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="mt-10">
        <form action="/student" method="post">
            @csrf
            {{--  @csrf = wajib untuk di buat  --}}

            <div class="mt-10">
                <label for="name">Name : </label>
                <input type="text" name="name" id="name">
                {{--  atribut name yang ada di dalam tag input itu harus sama dengan yang ada di dalam database   --}}
            </div>

            <div class="mt-10">
                <label for="gender">Gender : </label>
                <select name="gender" id="gender">
                    {{--  atribut name yang ada di dalam tag input itu harus sama dengan yang ada di dalam database   --}}
                    <option value="">Select One</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>

            <div class="mt-10">
                <label for="nis">NIS : </label>
                <input type="text" name="nis" id="nis">
                {{--  atribut name yang ada di dalam tag input itu harus sama dengan yang ada di dalam database   --}}
            </div>

            <div class="mt-10">
                <label for="class">Class : </label>
                <select name="class_id" id="class">
                    {{--  atribut name yang ada di dalam tag input itu harus sama dengan yang ada di dalam database   --}}
                    <option value="">Select One</option>
                    @foreach ($class as $item)
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
