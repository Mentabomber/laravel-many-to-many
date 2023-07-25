@extends('layouts.app')
@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="text-center d-flex justify-content-center">
            <h2>Projects</h2> <a href="{{ route('project.create') }}">New</a>
        </div>

        <div class="text-center">
            <ul class="list-unstyled">
                @foreach ($projects as $project)
                    <li><a href="{{ route('show', $project->id) }}">{{ $project->title }}</a></li>
                @endforeach
            </ul>

        </div>
    </div>
@endsection
