<?php
    include ("dbconnection.php");
    session_start();
    if(isset($_POST["signUp"])){

        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sqlSelc = "SELECT COUNT(*) FROM admin WHERE email = :email";        
        $stm = $connection->prepare($sqlSelc);
        $data = [
            ':email' =>$email            
        ];
        $stm->execute($data);
        $count = $stm->fetchColumn();

        if($count > 0) {
            $_SESSION['message'] = 'Email already exists!';
            header('Location:Admin-Login.php');
            exit(0); 
        }
        else{
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
        
    }
    if(isset($_POST["signIn"])){

        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM admin WHERE email=:email and password=:passwor";
        $stm = $connection->prepare($sql);
        $data = [
            ":email" => $email,
            ":passwor" => $password
        ];
        $result = $stm->execute($data);
        
        if($result->num_rows >0){
            $result = $stm->FetchAll(PDO::FETCH_ASSOC);
            $_SESSION['email']=$row['email'];
            header("Location: Admin.php");
            exit();
        }
        else{
         'Not found, Incorrect email or Password';

        }
        if($result['email'] == $email && $result['password'] == $password ){
            $_SESSION['message'] = 'Welcom '.$result['firstName'].' ' .$result['lasttName'] .":)";
            header('Location:Admin.php');
            exit(0); 
        }
        else{
            $_SESSION['message'] = 'Error. Check your Email or Password !!';
            header('Location:Admin-Login.php');
            exit(0);
        }
    }
    
?>