<?php

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();


$arobl =array(
    array(15 => "Киевская область"),
    array(3 => "Львовская область"),
    array(4 => "Днепропетровская область"),
    array(8 => "Винницкая область"),
    array(9 => "Волынская область"),
    array(10 => "Донецкая область"),
    array(11 => "Житомирская область"),
    array(12 => "Закарпатская область"),
    array(13 => "Запорожская область"),
    array(14 => "Ивано-Франковская область"),
    array(16 => "Кировоградская область"),
    array(17 => "Крым"),
    array(18 => "Луганская область"),
    array(19 => "Николаевская область"),
    array(20 => "Одесская область"),
    array(21 => "Полтавская область"),
    array(22 => "Ровенская область"),
    array(23 => "Сумская область"),
    array(24 => "Тернопольская область"),
    array(25 => "Харьковская область"),
    array(26 => "Херсонская область"),
    array(27 => "Хмельницкая область"),
    array(28 => "Черкасская область"),
    array(29 => "Черниговская область"),
    array(30 => "Черновицкая область"),

);

try {
  $loader = new Twig_Loader_Filesystem('templates');

  $twig = new Twig_Environment($loader, array(
      'debug' => true,
      // ...
  ));

  $template = $twig->loadTemplate('index.tmpl');

    $filejson  = file_get_contents('data.json', true);
    $cities = json_decode($filejson, true);

  echo $template->render(array(
    'cities' => $cities,
      'cities_kiev' => $cities[15],
      'arobl' => $arobl,
  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>