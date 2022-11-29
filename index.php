<?php

// **Descrizione**
// Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
// L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
// **Milestone 1**
// Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
// Scriviamo tutto (logica e layout) in un unico file *index.php*
// Milestone 2
// Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file *functions.php* che includeremo poi nella pagina principale
// Milestone 3
// Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
// Milestone 4 (BONUS)
// Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
// Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.

session_start();

$pass_lenght = $_GET["pass_lenght"] ?? "";
$pass_lenght = intval($pass_lenght);

// include_once __DIR__ . '/functions.php';
include_once __DIR__ . '/functions/functions.php';

if (!empty($pass_lenght)) {
    $_SESSION["password"] = generatorPass($pass_lenght);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <title>PHP PASS</title>
</head>

<body>
    <div class="container pt-5">
        <div class="text-center ">
            <h1>Strong password generator</h1>
            <h2>Genera una password sicura</h2>
        </div>
        <form action="index.php" method="GET" class="pt-5">
            <div class="row mb-3">
                <label for="pass" class="col-6 col-form-label">Lunghezza password:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" min="1" id="pass" name="pass_lenght">
                </div>
            </div>
            <fieldset class="row mb-3">
                <legend class="col-form-label col-6 pt-0">Consenti ripetizioni di uno o più caratteri:</legend>
                <div class="col-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1"
                            checked>
                        <label class="form-check-label" for="gridRadios1">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                        <label class="form-check-label" for="gridRadios2">
                            No
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" checked>
                        <label class="form-check-label" for="gridCheck1">
                            Lettere
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" checked>
                        <label class="form-check-label" for="gridCheck1">
                            Numeri
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" checked>
                        <label class="form-check-label" for="gridCheck1">
                            Simboli
                        </label>
                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Invia</button>
            <button type="reset" class="btn btn-secondary">Annulla</button>
            <?php if ($pass_lenght != 0) { ?>
            <a class="btn btn-success" href="recover.php">Recupera password</a>
            <?php } ?>
        </form>
    </div>
</body>

</html>