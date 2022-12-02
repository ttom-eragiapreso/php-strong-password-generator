<?php


//Includo le funzioni

require_once './partials/functions.php';

// Base Dati


$data = [
  "letters" => ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'o', 'p', 'q', 'r', 's', 't', 'u', 'w', 'y', 'z'],
  "numbers" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
  "special_characters" => ['!', '?', '&', '%', '$', '<', '>', '^', '+', '-', '*', '/', '(', ')', '[', ']', '{', '}', '@', '#', '_', '=']
];
// $letters = ;
// $numbers = ;
// $special_characters = ;

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.css' integrity='sha512-bR79Bg78Wmn33N5nvkEyg66hNg+xF/Q8NA8YABbj+4sBngYhv9P8eum19hdjYcY7vXk/vRkhM3v/ZndtgEXRWw==' crossorigin='anonymous' />
  <title>Document</title>
</head>

<style>
  body {
    height: 100vh;
  }

  .container:last-child {
    margin-top: 75vh;
  }
</style>

<body>

  <div class="container">


    <h1>Genera la tua passord magggica</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
      <label for="input_psw">Quanto vuoi che sia lunga la tua password?</label>
      <input type="number" class="form-control" name="psw_length" id="input_psw" placeholder="Scrivi un numero tra 8 e 32">
      <button class="btn btn-primary mt-3" type="submit">Genera</button>
    </form>


    <?php if (!empty($_GET['psw_length'])) : ?>
      <h2 class="mt-5">La tua password generata è <?php generate_psw($_GET['psw_length']) ?></h2>
    <?php endif; ?>




  </div>
  <div class="container">
    <p class="">
      Descrizione
      Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
      L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.
      Milestone 1
      Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli (!?&%$<>^+-*/()[]{}@#_=)) da restituire all’utente.
        Scriviamo tutto (logica e layout) in un unico file index.php
        Milestone 2
        Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale
        Milestone 3
        Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.
        Milestone 4 (BONUS)
        Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
        Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.

    </p>
  </div>


</body>

</html>