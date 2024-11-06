@extends("layouts.app")

@section("page-title", "Laravel Auth")

@section("content")
    <section class="container">

        <h2 class="text-center mb-5">Lista degli esercizi</h2>

        <div>
            <a href="{{ route("admin.exercises.create") }}" class="btn btn-primary mb-4 fw-bold">Aggiungi esercizio</a>
        </div>

        <table class="table table-dark table-hover">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome esercizio</th>
                  <th scope="col">Nome repo</th>
                  <th scope="col">Esercizio completato</th>
                  <th scope="col">Bonus</th>
                  <th scope="col">Data</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

                @foreach ( $exercises as $exercise )
                    <tr>
                        <th scope="row">{{ $exercise->id }}</th>
                        <td>{{ $exercise->exercise_name }}</td>
                        <td>{{ $exercise->repo_name }}</td>
                        <td>{{ $exercise->exercise_completed }}</td>
                        <td>{{ $exercise->exercise_bonus }}</td>
                        <td>{{ $exercise->date }}</td>
                        <td class="text-center">
                            <a href="{{ route("admin.exercises.show", $exercise->id ) }}" class="btn btn-primary">Mostra</a>

                            <a href="{{ route("admin.exercises.edit", $exercise->id) }}" class="btn btn-success">Modifica</a>

                            <form action="{{ route("admin.exercises.delete", $exercise->id) }}" method="POST" class="d-inline exercises-destroyer" custom-data-name="{{ $exercise->exercise_name }}">
                                @method("DELETE")
                                @csrf
                                <button href="/delete" type="submit" class="btn btn-danger">Rimuovi</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

              </tbody>
        </table>

        <div>
            {{ $exercises->links() }}
        </div>

    </section>
@endsection

@section("additional-scripts")
    @vite("resources/js/exercises/delete-confirmation.js")
@endsection
