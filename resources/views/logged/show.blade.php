@extends('layouts.app')
@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="text-center">

            <span>Title: {{ $project->title }}</span>
            <br>
            @if ($project->picture)
                <img src="{{ asset('storage/' . $project->picture) }}" alt="">
            @endif
            <br>
            <span>Description:{{ $project->description }}</span>
            <br>
            <span>Start Date:{{ $project->start_date }}</span>
            <br>
            <span>Project Manager:{{ $project->project_manager }}</span>
            <br>
            <span>Project Img:{{ $project->thumb }}</span>
            <br>
            <span>Project Type:{{ $project->type->name }}</span>
            <br>
            <span>Technologies:
                <ul>
                    @if (count($project->technologies) > 0)
                        @foreach ($project->technologies as $technology)
                            <li>
                                {{ $technology->name }}
                            </li>
                        @endforeach
                    @else
                        No Technologies
                    @endif

                </ul>
            </span>
            <br>
            <br>
            <br>
            @if ($project->picture)
                <form method="POST"action="{{ route('project.picture.delete', $project->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="CLEAR-PICTURE">
                </form>
            @endif
            <a href="{{ route('index') }}">Back to Projects</a>


        </div>
    </div>
@endsection
