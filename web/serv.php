<?php
session_start();
@header("Content-type: application/json");

if (isset($_GET['inicio']) && $_GET['inicio']=='si') {     
    $_SESSION['ruta'] = array("ruta"=>"img/505.jpg");
    $json= json_encode($_SESSION['ruta']);
} 
if(isset($_GET['pista']) && $_GET['pista']=='si'){
     $_SESSION['pista'] = array("pista"=>"compleix les regles aritmetiques...");
     $json= json_encode($_SESSION['pista']);
}
if(isset($_GET['respuestas']) && $_GET['respuestas']=='si'){
    $_SESSION['respuestas'] = array("good"=>18,"bad"=>25);  
     $json = json_encode($_SESSION['respuestas']);
}
echo($json);


