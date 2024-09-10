<?php
try{
    $config = require_once 'config.php';
    $databaseConfig = $config['database'];
    $connection = new PDO("mysql:host=".$databaseConfig['servername'].";dbname=".$databaseConfig['database'],$databaseConfig['username'],$databaseConfig['password']);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    // echo "Connected failed " .$e->getMessage();
    header('Location:failedConnection.php');
    exit(0); 
}
?>