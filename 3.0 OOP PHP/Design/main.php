<?php

namespace Design;
$path=__DIR__;
$path=trim($path,"Design");
//die($path);

require_once $path.'Classes/database.php';

class main{
    public function_construct(){
        echo "<p>Design\main</p>";
    }
}