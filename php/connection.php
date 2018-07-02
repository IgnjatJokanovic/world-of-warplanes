<?php

include 'config.php';
global $con;
try{
    $con = new PDO("mysql:host=".host.";dbname=".db.";", user, pass);
    
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $ex){
    echo $ex->getMessage();
}