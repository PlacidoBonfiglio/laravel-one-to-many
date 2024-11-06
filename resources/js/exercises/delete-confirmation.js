const deleteExercises = document.querySelectorAll("form.exercises-destroyer");

deleteExercises.forEach((singleExercise) =>{
    singleExercise.addEventListener("submit", function (e) {
        e.preventDefault();

        const userChoice = window.confirm(`Confermi la rimozione dell'esercizio "${this.getAttribute("custom-data-name")}"?`)

        if ( userChoice === true ) {
            this.submit();
        }
    })
})
