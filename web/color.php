<?php
$color=array("color"=>"hola");
$random= rand(1, 3);
switch ($random){
    case 1:
        $color["color"]="red";
        break;
     case 2:
        $color["color"]="blue";
        break;
     case 3:
        $color["color"]="green";
        break;
    
}
echo json_encode($color);