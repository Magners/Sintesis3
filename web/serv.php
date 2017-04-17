<?php
session_start();
@header("Content-type: application/json");
 $json = "";
if (isset($_GET['inicio']) && $_GET['inicio']=='si') {     
    $_SESSION['ruta'] = "img/505.jpg";
   
    $json .='{"ruta":"'.$_SESSION['ruta'].'",';//retornamos el numero generado
} 
if(isset($_GET['pista']) && $_GET['pista']=='si'){
    $_SESSION['pista'] = "compleix les regles aritmetiques...";
     $json .='{"pista":"'.$_SESSION['pista'].'",';//retornamos el numero generado
}
if(isset($_GET['respuestas']) && $_GET['respuestas']=='si'){
    $_SESSION['respuestas'] = array(18,25);
    
     $json .='{"good":'.$_SESSION['respuestas'][0].",".
             '"bad":'.$_SESSION['respuestas'][1].',';//retornamos el numero generado
}
//finalizamos la estructura XML
$json .= '"":""}';
//insertamos la respuesta XML
echo($json);


