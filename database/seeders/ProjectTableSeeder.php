<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project;
use App\Models\Type;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $types = Type :: all();
        $projects = Project :: factory() -> count(30) -> make();

        // for ($x=0; $x < 10; $x++) {

        //     $type = $types[$x];
        //     $project = $projects[$x];

        //     $project -> type_id = $type -> id;
        //     $project -> save();
        // }

        foreach ($projects as $project) {
            $type = Type :: inRandomOrder() -> first();

            $project -> type_id = $type -> id;
            $project -> save();
        }
    }
}
