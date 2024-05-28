<?php
session_start();
include ('dbconnection.php');
if (isset($_POST['save-card-btn']) ){
    // $Image = $_FILES['Image'];
    $Information = $_POST['Information'];
    $Star = $_POST['Star'];
    $Price = $_POST['Price'];
    if ($Star && $Price)
    $sql = "INSERT INTO popularfood(img ,information,star,price) value (:img ,:Information,:Star,:Price)"; 
    $sql_run = $connection->prepare($sql);

    $data = [
        ':img' => 'Picture1.png' ,
        ':Information' => $Information ,
        ':Star' => $Star ,
        ':Price' => $Price 
    ];
    
    $sql_execute = $sql_run->execute($data);

    if($sql_execute){
        $_SESSION['message'] = 'Add Successfully .';
        header('Location:add-card.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = 'Not Add .';
        header('Location:add-card.php');
        exit(0);
    }
}

if(isset($_POST['update-card-btn'])){
    // $Image = $_FILES['Image'];
    $Information = $_POST['Information'];
    $Star = $_POST['Star'];
    $Price = $_POST['Price'];
    $id = $_POST['id-input'];
    try{
        $sql = "UPDATE popularfood SET img=:img,information=:information,star=:star,price=:price WHERE id=:id LIMIT 1" ; 
        $sql_run = $connection->prepare($sql);
        $data = [
            ':img' => 'Picture6.png',
            ':information' => $Information,
            ':star' => $Star,
            ':price' => $Price,
            ':id' => $id
        ];
        $sql_execute = $sql_run->execute($data);
        if($sql_execute){
            $_SESSION['message'] = 'Record updated successfully.';
            header('Location:Admin.php');
            exit(0);
        }
        else{
            $_SESSION['message'] = 'Error updating record';
            header('Location:Admin.php');
            exit(0);
        }
    }
    catch(PDOExeption $e){
        echo $e->getmessage();
    }      
}
if(isset($_POST['btn-delete'])){
    $id = $_POST["btn-delete"];
    $sql = "DELETE FROM popularfood WHERE id=:id";
    $stm = $connection->prepare($sql);
    $data = [
        ":id" => $id 
    ];
    $stm_exec = $stm->execute($data);
    if($stm_exec){
        $_SESSION['message'] = 'Deleted successfully.';
        header('Location:Admin.php');
        exit(0);
    }
    else{
        $_SESSION['message'] = 'Error Deleted record';
        header('Location:Admin.php');
        exit(0);
    }
}

?>