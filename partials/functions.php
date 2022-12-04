<?php

// Per implementare il filtro passo un altro parametro che di default ha il valore 0,1,2 per permettermi di iterare tra tutti e 3 gli array che ho in $data.

function generate_psw($data, $length, $once, $filter = [0, 1, 2])
{
  session_unset();
  $psw = "";
  // Faccio partire la funzione solo se la lunghezza della password è compresa tra 8 e 32
  if (!empty($length) && $length >= 8 && $length <= 32) {
    // Faccio un ciclo da 0 alla lunghezza della password

    $i = 0;
    while ($i < $length) {
      // Creo un random tra 0 e 1 così da porterlo usare come booleano random per rendere il carattere maiuscolo o meno.
      $random_uppercase = rand(0, 1);
      // Ad ogni ciclo pesco un numero random tra il primo elemento dell'array $filter e l'ultimo, che corrispondono agli indici dei 3 array che ho dentro l'array genitore "data"
      $random_index = rand($filter[0], $filter[count($filter) - 1]);

      // Questo è per risolvere il caso in cui l'array del filtro contiene 0 e 2 (caso in cui includi lettere e caratteri speciali ma non numeri) quando esce un numero che non è presente (in questo caso solo 1) allora non fa niente.
      if (in_array($random_index, $filter)) {
        $list = $data[$random_index];
        // A quel punto accedo a quell'indice e poi estraggo un altro numero random tra 0 e la lunghezza dell'array scelto meno 1 e mi stampo quel item. 
        $random_item = rand(0, count($list) - 1);

        if ($once && count($list) > $length) {
          echo "all'iterazione $i, once è  $once <br>";

          if (!str_contains($psw, $list[$random_item])) {
            is_string($list[$random_item]) && $random_uppercase ? $psw .= strtoupper($list[$random_item]) : $psw .= $list[$random_item];
            $i++;
          } else {
            echo "ho estratto $list[$random_item] e $psw già lo contiene";
            //$psw .= $list[$random_item];
          }
        } else {
          if (is_string($list[$random_item]) && $random_uppercase) {
            $psw .= strtoupper($list[$random_item]);
          } else {
            $psw .= $list[$random_item];
          }
          $i++;
        }
      }
    }
  } else {
    $psw = 'Devi scegliere un numero tra 8 e 32';
  }
  return $psw;
}




// BUG
// Nel var dump di debug che ho fatto della password, esce sempre della lunghezza corrispondente al valore dell'input dell'utente, tuttavia non sempre l'eco della password in pagina è lungo tanto quanto quello generato dalla funzione. Non saprei perché
//UPDATE : Ho notato che nella maggior parte delle volte quando la password non è mostrata per intero, si ferma sempre al carattere '<' che suppongo hmtl crede sia un suo tag e infatti ispezionando la pagina si vede che poi i restanti caratteri della password vengono messi dentro quel tag. Non saprei però come risolvere. 
