@extends('layouts.app')
@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="text-center">

            <h1>Create new Project</h1>
            <form method="POST" action="{{ route('project.store') }}">

                @csrf
                @method('POST')

                <label for="title">title</label>
                <br>
                <input type="text" name="title" id="title">
                <br>
                <label for="description">description</label>
                <br>
                <input type="text" name="description" id="description">
                <br>
                <label for="start_date">start_date</label>
                <br>
                <input type="date" name="start_date" id="start_date">
                <br>
                <label for="project_manager">project_manager</label>
                <br>
                <input type="text" name="project_manager" id="project_manager">
                <br>
                <label for="thumb">thumb</label>
                <br>
                <input type="text" name="thumb" id="thumb">
                <br>
                <select name="type" id="type">

                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                <br>

                <input class="my-3" type="submit" value="create">
            </form>

        </div>
    </div>
@endsection
