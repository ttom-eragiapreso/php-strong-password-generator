<?php

function generate_psw($data, $length, $filter = [0, 1, 2])
{
  session_unset();
  $psw = '';
  // Faccio partire la funzione solo se la lunghezza della password è compresa tra 8 e 32
  if (!empty($length) && $length >= 8 && $length <= 32) {
    // Faccio un ciclo da 0 alla lunghezza della password
    for ($i = 0; $i < $length; $i++) {

      $random_uppercase = rand(0, 1);
      // Ad ogni ciclo pesco un numero random tra 0 e 2 che sono gli indici dei 3 array che ho dentro l'array genitore "data"
      $random_index = rand($filter[0], $filter[count($filter) - 1]);

      if (in_array($random_index, $filter)) {
        $list = $data[$random_index];
        // A quel punto accedo a quell'indice e poi estraggo un altro numero random tra 0 e la lunghezza dell'array scelto meno 1 e mi stampo quel item. 
        $random_item = rand(0, count($list) - 1);
        if (is_string($list[$random_item]) && $random_uppercase) {
          $psw .= strtoupper($list[$random_item]);
        } else {
          $psw .= $list[$random_item];
        }
      }
    }
  } else {
    $psw = 'Devi scegliere un numero tra 8 e 32';
  }

  return $psw;
}
