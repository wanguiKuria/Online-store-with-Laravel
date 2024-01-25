<?php

//require_once"Classes/main.php";
//require_once"Classes/Design.php";
//Aliasing USE
function loader($className){
    require_once $className.'.php';

}
spl_autoload_register("loader");

$object1=new Classes\main();
$object2=new Design\main();