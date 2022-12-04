<?php


// Faccio partire una sessione se non è già attiva
session_unset();
if (!isset($_SESSION)) {
  session_start();
}


//Includo le funzioni

require_once './partials/functions.php';

// Base Dati

$data = [
  ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'o', 'p', 'q', 'r', 's', 't', 'u', 'w', 'y', 'z'],
  [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
  ['!', '?', '&', '%', '$', '<', '>', '^', '+', '-', '*', '/', '(', ')', '[', ']', '{', '}', '@', '#', '_', '=']
];

$char_once = $_GET['char_once'] ?? '';

if (isset($_GET['psw_length']) && isset($_GET['filter'])) {

  $_SESSION['psw'] = generate_psw($data, $_GET['psw_length'], $char_once, $_GET['filter']);
}







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
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>

<body>

  <div class="container">


    <h1>Genera la tua passord magggica</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
      <label for="input_psw">Quanto vuoi che sia lunga la tua password?</label>
      <input type="number" class="form-control" name="psw_length" id="input_psw" placeholder="Scrivi un numero tra 8 e 32" value="<?php echo $_GET['psw_length'] ?? ''; ?>">


      <!-- CHECKBOXES -->
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="filter[]" value="0" id="flexCheckDefault1" checked>
        <label class="form-check-label" for="flexCheckDefault1">
          Includi Lettere
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="filter[]" value="1" id="flexCheckDefault2" checked>
        <label class="form-check-label" for="flexCheckDefault2">
          Includi Numeri
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="filter[]" value="2" id="flexCheckDefault3" checked>
        <label class="form-check-label" for="flexCheckDefault3">
          Includi Caratteri Speciali
        </label>
      </div>
      <div class="form-check">
        <input type="checkbox" name="char_once" id="once" class="form-check-input" value="1">
        <label for="once">Escludi ripetizioni</label>
      </div>
      <button class="btn btn-primary mt-3" type="submit">Genera</button>
    </form>


    <?php if (isset($_SESSION['psw'])) : ?>
      <h2 class="mt-5">La tua password generata è</h2>
      <p class="text-primary fs-2"> <?php echo $_SESSION['psw'] ?></p>
    <?php endif; ?>


    <?php var_dump($_GET) ?>
    <?php var_dump($_SESSION) ?>
    <?php var_dump($char_once)  ?>


  </div>



</body>

</html>