<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercises = Exercise::paginate(15);
        return view("guest.exercises.index", compact("exercises"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exerciseData = $request->validate([
            "exercise_name" => ["required", "string", "min:2", "max:255"],
            "repo_name" => ["required", "string", "min:2", "max:255"],
            "exercise_completed" => ["required", "boolean", "numeric"],
            "exercise_bonus" => ["required", "boolean", "numeric"],
            "date" => ["required", "date"],
        ]);

        // $exerciseData = $request->all();

        $exercise = new Exercise();
        $exercise->exercise_name = $exerciseData["exercise_name"];
        $exercise->repo_name = $exerciseData["repo_name"];
        $exercise->exercise_completed = $exerciseData["exercise_completed"];
        $exercise->exercise_bonus = $exerciseData["exercise_bonus"];
        $exercise->date = $exerciseData["date"];
        $exercise->save();

        // $exercise = Exercise::create($exerciseData);
        return redirect()->route("guest.exercises.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exercise = Exercise::findOrFail($id);
        return view("guest.exercises.show", compact("exercise"));
    }
}
