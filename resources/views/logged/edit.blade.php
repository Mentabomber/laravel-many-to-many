@extends('layouts.app')
@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="text-center">

            {{-- <h1>Edit {{ $project->name }}</h1> --}}
            <form method="POST" action="{{ route('project.update', $project->id) }}">

                @csrf
                @method('PUT')

                <label for="title">title</label>
                <br>
                <input type="text" name="title" id="title" value="{{ $project->title }}">
                <br>
                <label for="description">description</label>
                <br>
                <input type="text" style=" width: 300px; height: 150px;" name="description" id="description"
                    value="{{ $project->description }}">
                <br>
                <label for="start_date">start_date</label>
                <br>
                <input type="date" name="start_date" id="start_date" value="{{ $project->start_date }}">
                <br>
                <label for="project_manager">project_manager</label>
                <br>
                <input type="text" name="project_manager" id="project_manager" value="{{ $project->project_manager }}">
                <br>
                <label for="thumb">thumb</label>
                <br>
                <input type="text" name="thumb" id="thumb" value="{{ $project->thumb }}">
                <br>
                <label for="">type</label>
                <br>
                <select name="type_id" id="type_id">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @selected($project->type->id === $type->id)>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                <br>
                <br>
                <label for="">technology</label>
                <br>
                @foreach ($technologies as $technology)
                    <div class="form-check mx-auto" style="width: 200px">
                        <input class="form-check-input" type="checkbox" id="technology{{ $technology->id }}"
                            name="technologies[]" value="{{ $technology->id }}"
                            @foreach ($project->technologies as $projectTechnology)
                                @checked($projectTechnology -> id === $technology -> id) @endforeach>
                        <label class="form-check-label" for="technology{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
                </select>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input class="my-3" type="submit" value="Edit">
            </form>

        </div>
    </div>
@endsection
