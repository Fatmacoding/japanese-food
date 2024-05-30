<?php
    include ("dbconnection.php");
    session_start();
    if(isset($_POST["signUp"])){

        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO admin(firstName,lastName,email,password) VALUES (:firstName,:lastName,:email,:passw)";
        $stm = $connection->prepare($sql);
        $data = [
            ':firstName' =>$fName, 
            ':lastName' =>$lName, 
            ':email' =>$email, 
            ':passw' =>$password 
        ];
        $stm_execute = $stm->execute($data);
        if($stm_execute){
            $_SESSION['message'] = 'Your account create Successfully.';
            header('Location:Admin-Login.php');
            exit(0); 
        }
        else{
            $_SESSION['message'] = 'Error';
            header('Location:Admin-Login.php');
            exit(0);
        }
    }
?>