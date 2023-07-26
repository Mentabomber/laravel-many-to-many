<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class LoggedController extends Controller
{
    // PROJECTS
    public function show($id){

        $project = Project :: findOrFail($id);

        return view("logged.show", compact('project'));
    }
    public function create(){
        $types = Type :: all();
        $technologies = Technology :: all();

        return view('logged.create', compact('types', 'technologies'));
    }
    public function store(Request $request) {

        $data = $request -> all();

        $project = Project :: create($data);
        $project -> technologies() -> attach($data['technologies']);

        return redirect() -> route('show', $project -> id);
    }
    // public function edit($id) {

    //     $technology = Technology :: findOrFail($id);
    //     $projects = Project :: all();

    //     return view('logged.edit', compact("technology", "projects"));
    // }
    public function edit($id) {

        $project = Project :: findOrFail($id);
        $technologies = Technology :: all();
        $types = Type :: all();

        return view('logged.edit', compact("technologies", "project","types"));
    }
    public function update(Request $request, $id) {

        $data = $request -> all();

        $project = Project :: findOrFail($id);
        $project -> update($data);
        $project -> technologies() -> sync($data['technologies']);
        // if (array_key_exists('projects', $data)) {

        //     $project -> technologies() -> sync($data['technologies']);
        // } else {

        //     $project -> technologies() -> detach();
        // }

        return redirect() -> route('show', $project -> id);
    }
}
