<?php

namespace App\Http\Controllers\Status;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $data = $request -> validate([
            "title" => "required|string|min:3|max:64",
            "description" => "required|string|min:3|max:64",
            "start_date" => "required|date",
            "project_manager" => "nullable",
            "thumb" => "nullable",
            "technologies" => "nullable|array",
            "picture" => "nullable",

            "type_id" => "nullable"

        ]);;

        $img_path = Storage :: put('uploads', $data['picture']);
        $data['picture'] = $img_path;

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
        $data = $request -> validate([
            "title" => "required|string|min:3|max:64",
            "description" => "required|string|min:3|max:250",
            "start_date" => "required|date",
            "project_manager" => "nullable",
            "thumb" => "nullable",
            "type_id" => "nullable",
            "technologies" => "nullable|array",
            "picture" => "nullable"

        ]);;
        $project = Project :: findOrFail($id);
        if(!array_key_exists('picture', $data)){
            $data['picture'] = $project -> picture;
        }
        else{
            $oldImgPath = $project -> picture;

            if($oldImgPath){
                Storage :: delete($oldImgPath);
            }

            $img_path = Storage :: put('uploads', $data['picture']);
            $data['picture'] = $img_path;
        }
        $project = Project :: findOrFail($id);
        $project -> update($data);
        // $project -> technologies() -> sync($data['technologies']);
        if (array_key_exists('technologies', $data)) {

            $project -> technologies() -> sync($data['technologies']);
        } else {

            $project -> technologies() -> detach();
        }

        return redirect() -> route('show', $project -> id);
    }
    public function clearPicture($id){
        $project = Project :: findOrFail($id);

        $oldImgPath = $project -> picture;
        if ($oldImgPath){
            Storage :: delete($oldImgPath);
        }
        $project -> picture;
        $project -> save();

        return redirect() -> route('show', $project -> id);
    }
}
