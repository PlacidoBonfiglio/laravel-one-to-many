@extends("layouts.app")

@section("page-title", "Laravel Auth")

@section('content')
    <section class="container">

        <h2 class="text-center mb-5">Il Film che hai selezionato</h2>

        <div class="text-center">
            <p class="mt-3">
                <span class="fw-bold">Nome Esercizio: </span>{{$exercise->exercise_name}}
            </p>
            <p>
                <span class="fw-bold">Nome repo: </span>{{$exercise->repo_name}}
            </p>
            <p>
                <span class="fw-bold">Esercizio completato: </span>{{$exercise->exercise_completed}}
            </p>
            <p>
                <span class="fw-bold">Bonus dell'esercizio: </span>{{$exercise->exercise_bonus}}
            </p>
            <p>
                <span class="fw-bold">Data: </span>{{$exercise->date}}
            </p>
        </div>

    </section>
@endsection
