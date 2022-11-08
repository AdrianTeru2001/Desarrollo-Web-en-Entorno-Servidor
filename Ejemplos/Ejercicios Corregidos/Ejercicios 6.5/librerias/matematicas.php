<?php

  function esPrimo($n, &$cont) {
    //$esPrimo = true;

    for ($i = 2; $i < $n; $i++) {
      echo "@";
      $cont++;
      if ($n % $i == 0) {
        return false;
      }
    }

    // El 0 y el 1 no se consideran primos
    if (($n == 0) || ($n == 1)) {
      return false;
    }

    return true;
  }