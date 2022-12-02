<?php


// Faccio partire una sessione se non è già attiva
if (!isset($_SESSION)) {
  session_start();
}

//Includo le funzioni

require_once './partials/functions.php';


$data = [
  ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'o', 'p', 'q', 'r', 's', 't', 'u', 'w', 'y', 'z'],
  [1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
  ['!', '?', '&', '%', '$', '<', '>', '^', '+', '-', '*', '/', '(', ')', '[', ']', '{', '}', '@', '#', '_', '=']
];

if (isset($_GET['psw_length'])) {
  $_SESSION['psw'] = generate_psw($data, $_GET['psw_length']);
}

// Base Dati






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
      <button class="btn btn-primary mt-3" type="submit">Genera</button>
    </form>


    <?php if (isset($_SESSION['psw'])) : ?>
      <h2 class="mt-5">La tua password generata è <span class="text-primary">
          <?php echo $_SESSION['psw']; ?>
        </span>
      </h2>
    <?php endif; ?>



  </div>



</body>

</html>