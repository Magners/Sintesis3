
<?php
session_start();
@header("Content-type: application/json");
$json = "";
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = array(["nombre" => "Paco", "edad" => 25, "puntos" => 30, "mail"=> "gallego@gmail"], ["nombre" => "Carrero", "edad" => 50, "puntos" => 20, "mail"=> "astronauta@gmail"]);
}

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        $id = explode("users/", $_SERVER['REQUEST_URI']); 
        if (isset($id[1])) {
            echo json_encode($_SESSION['users'][$id[1]]); 
        } else {
            echo json_encode($_SESSION['users']);
        }
        break;
    case "PUT": 
        $jsonUser = json_decode(file_get_contents("php://input"), true);
        $exists = false;
        for ($i = 0; $i < count($_SESSION['users']); $i++) {
            if ($_SESSION['users'][$i]["nombre"] == $jsonUser["nombre"]) {
                $_SESSION['users'][$i] = $jsonUser;
                $exists = true;
            }
        }
        if ($exists == false) {
            $_SESSION['users'][count($_SESSION['users'])] = $jsonUser;
        }

        echo json_encode($_SESSION['users']);
        break;
    case "DELETE": 
        $id = explode("user/", $_SERVER['REQUEST_URI']);

        if (isset($id[1])) {
            for ($i = 0; $i < count($_SESSION['users']); $i++) {
                if ($_SESSION['users'][$i]["nombre"] == $id[1]) {
                  
                    array_splice($_SESSION['users'],$i,1);
                    
                    break;
                }
            }
            echo json_encode($_SESSION['users']); 
        } else {
            echo json_encode($_SESSION['users']);
        }
        break;
}
