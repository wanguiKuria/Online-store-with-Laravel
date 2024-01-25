<?php
require_once"ClassLoader.php";


class Quote extends Database implements Crud{

    public function__construct(){
        parent::__construct();///call the parent constructor
    }
    public function insert(){
        $sql="INSERT INTO (quote,author,dob category)
        VALUES
    }
    
    public function insert(){}
    public function get($id=0){}
    public function delete($id){}

}
$test new Quote();
$test-> insert();
