@extends('layouts.app')
@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="text-center">

            <span>Title: {{ $project->title }}</span>
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
            <br>
            <br>
            <a href="{{ route('index') }}">Back to Projects</a>

        </div>
    </div>
@endsection
