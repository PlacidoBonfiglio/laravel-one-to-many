<?php

namespace Database\Seeders;

use App\Models\Exercise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ( $i=0; $i < 60; $i++ ) {
            $newExercise = new Exercise();
            $newExercise->exercise_name = $faker->text(5, 15);
            $newExercise->repo_name = $faker->text(10, 20);
            $newExercise->exercise_completed = $faker->boolean();
            $newExercise->exercise_bonus = $faker->boolean();
            $newExercise->date = $faker->dateTimeBetween("-6 months", "-0 months");
            $newExercise->save();
        }
    }
}
