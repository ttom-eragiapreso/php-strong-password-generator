<?php

function generate_psw($data, $length)
{

  $psw = '';
  // Faccio partire la funzione solo se la lunghezza della password è compresa tra 8 e 32
  if ($length >= 8 && $length <= 32) {
    // Faccio un ciclo da 0 alla lunghezza della password
    for ($i = 0; $i < $length; $i++) {

      $random_uppercase = rand(0, 1);
      // Ad ogni ciclo pesco un numero random tra 0 e 2 che sono gli indici dei 3 array che ho dentro l'array genitore "data"
      $random_index = rand(0, 2);
      $list = $data[$random_index];
      // A quel punto accedo a quell'indice e poi estraggo un altro numero random tra 0 e la lunghezza dell'array scelto meno 1 e mi stampo quel item. 
      $random_item = rand(0, count($list) - 1);
      if (is_string($list[$random_item]) && $random_uppercase) {
        $psw .= strtoupper($list[$random_item]);
      } else {
        $psw .= $list[$random_item];
      }
    }
  } else {
    $psw = 'Devi scegliere un numero tra 8 e 32';
  }

  return $psw;
}
