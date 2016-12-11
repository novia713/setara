<?php
declare(strict_types = 1);
require __DIR__ . "/vendor/autoload.php";
use Novia713\Setara\Setara;


$setara = new Setara("Bulbasaur", "emojis");

$enc = $setara->enc("La guitarra tocada por gitanos, que luego regresaroñ al campo");
d($enc);

$setara->dec(
  $enc
  );


$enc = $setara->enc("610687590 hola");
d($enc);

d( $setara->dec(
  $enc
  ));


$enc = $setara->enc("Goran Bregovic compone música para muchos artistas!! ·%&");
d($enc);

d( $setara->dec(
  $enc
  ));
