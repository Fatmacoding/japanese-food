<?php
$servername = "localhost" ;
$username = "root";
$password = "";
$database = "data-sushi";

try{
    $connection = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    // echo "Connected failed " .$e->getMessage();
    echo "b";
}

?>