<?php

session_start();
@header("Content-type: application/json");

if (isset($_GET['inicio']) && $_GET['inicio'] == 'si') {

    $_SESSION['rand'] = rand(1, 3);
    switch ($_SESSION['rand']) {
        case 1:
            $_SESSION['ruta'] = array("ruta" => "img/505.jpg");
            break;
        case 2:
            $_SESSION['ruta'] = array("ruta" => "img/511.jpg");
            break;
        case 3:
            $_SESSION['ruta'] = array("ruta" => "img/puzzle1.jpg");
            break;
    }
    $json = json_encode($_SESSION['ruta']);
}
if (isset($_GET['pista']) && $_GET['pista'] == 'si') {
     switch ($_SESSION['rand']) {
         case 1:
    $_SESSION['pista'] = array("pista" => "compleix les regles aritmetiques...");
    break;
         case 2:
    $_SESSION['pista'] = array("pista" => "pensa be, 1$ just");
    break;
         case 3:
    $_SESSION['pista'] = array("pista" => "mutiplica");
    break;

     }
     
    $json = json_encode($_SESSION['pista']);
}
if (isset($_GET['respuestas']) && $_GET['respuestas'] == 'si') {
    
      switch ($_SESSION['rand']) {
         case 1:
     $_SESSION['respuestas'] = array("good" => 18, "bad" => 25);
    break;
         case 2:
    $_SESSION['respuestas'] = array("good" => 1.05, "bad" => 1.00);
    break;
         case 3:
    $$_SESSION['respuestas'] = array("good"=>15,"bad"=>13);
    break;

     }
    $_SESSION['respuestas'] = array("good" => 18, "bad" => 25);
    $json = json_encode($_SESSION['respuestas']);
}
echo($json);


