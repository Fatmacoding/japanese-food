<?php
    include ("dbconnection.php");
    if(isset($_POST["signUp"])){
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "INSERT INTO admin(firstName,lastName,email,password) VALUES (:firstName,:lastName,:email,:passw)";
        $stm = $connection->prepare($sql);
        $data = [
            ':firstName' =>$fName, 
            ':firstName' =>$lName, 
            ':firstName' =>$email, 
            ':firstName' =>$password 
        ];
        $stm_exect = $stm->execute($data);
        if($stm_execute){
            $_SESSION['message'] = '';
            header('Location:Admin.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = 'Error';
            header('Location:Admin.php');
            exit(0);
        }
    }
?>