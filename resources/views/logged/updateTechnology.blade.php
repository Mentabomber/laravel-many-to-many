@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>UPDATE PROJECT</h1>
        <form method="POST" action="{{ route('project.update', $technology->id) }}">

            @csrf
            @method('PUT')

            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name" value="{{ $technology->name }}">
            <br>
            <label for="creation_date">creation_date</label>
            <br>
            <input type="text" name="creation_date" id="creation_date" value="{{ $technology->creation_date }}">
            <br>
            <label for="developer">Developer</label>
            <br>
            <input type="text" name="developer" id="developer" value="{{ $technology->developer }}">
            <br>
            <h4 class="mt-3">Projects</h4>
            @foreach ($projects as $project)
                <div class="form-check mx-auto" style="width: 200px">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" name="projects[]"
                        value="{{ $project->id }}"
                        @foreach ($technology->projects as $projectTechnology)
                        @if ($projectTechnology->id === $project->id)
                            checked
                        @endif @endforeach>
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $project->name }}

                    </label>
                </div>
            @endforeach

            <br>
            <input class="my-3" type="submit" value="UPDATE">
        </form>
    </div>
@endsection
