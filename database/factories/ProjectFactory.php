<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            "title" => fake() -> city(),
            "description" => fake() -> text(),
            "start_date" => fake() -> dateTime(),
            "project_manager" => fake() -> name($gender = 'male'|'female'),
            "thumb" => "http://picsum.photos/350/350",


        ];
    }
}
