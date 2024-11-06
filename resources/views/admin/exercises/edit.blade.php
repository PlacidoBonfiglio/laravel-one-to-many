@extends("layouts.app")

@section("page-title", "Laravel Auth")

@section("content")
    <section class="container">

        <h2 class="text-center mb-3">Modifica dati dell'esercizio selezionato</h2>

        <form class="row row-cols-1 justify-content-center" action="{{ route("admin.exercises.update", $exercise->id) }}" method="POST">
            @method("PUT")
            @csrf

            <div class="col-6 m-3">
                <label for="exercise-name">Modifica il nome dell'esercizio</label>
                <input class="form-control" type="text" value="{{ old('exercise_name', $exercise->exercise_name) }}" id="exercise-name" name="exercise_name">
                @error("exercise_name")
                    <div class="alert alert-warning mt-2">Il titolo deve avere almeno 2 caratteri</div>
                @enderror
            </div>

            <div class="col-6 m-3">
                <label for="repo-name">Inserisci Titolo Originale</label>
                <input class="form-control" type="text" value="{{ old('repo_name', $exercise->repo_name) }}" id="repo-name" name="repo_name">
                @error("repo_name")
                    <div class="alert alert-warning mt-2">Il nome della repo deve avere almeno 2 caratteri</div>
                @enderror
            </div>

            <div class="col-6 m-3">
                <label for="exercise-completed">L'esercizio è stato completato?</label>
                <input class="form-control" type="number" min="0" max="1" value="{{ old('exercise_completed', $exercise->exercise_completed) }}" id="exercise-completed" name="exercise_completed">
                @error("exercise_completed")
                    <div class="alert alert-warning mt-2">Scrivi 1 se l'esercizio è stato completato, 0 se è se è incompleto.</div>
                @enderror
            </div>



            <div class="col-6 m-3 mb-4">
                <label for="exercise-bonus">Il bonus è stato svolto?</label>
                <input class="form-control" type="number" min="0" max="1" value="{{ old('exercise_bonus', $exercise->exercise_bonus) }}" id="exercise-bonus" name="exercise_bonus">
                @error("exercise_bonus")
                    <div class="alert alert-warning mt-2">Scrivi 1 se il bonus è stato fatto, 0 se è se non lo è.</div>
                @enderror
            </div>

            <div class="col-6 m-3 mb-4">
                <label for="exercise-date">Inserisci la data</label>
                <input class="form-control" type="text" value="{{ old('date', $exercise->date) }}" id="exercise-date" name="date">
                @error("date")
                    <div class="alert alert-warning mt-2">Inserisci una data valida</div>
                @enderror
            </div>

            <div class="text-center">
                <button class="btn btn-primary me-3" type="submit">Modifica dati dell'esercizio</button>
                <button class="btn btn-warning" type="reset">Reset</button>
            </div>
        </form>

    </section>
@endsection
