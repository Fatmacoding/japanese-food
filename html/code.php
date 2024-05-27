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
    $stm = $connection->prepare($sql);
    $data = [
        ':img' => 'Picture6.png',
        ':information' => $Information,
        ':star' => $Star,
        ':Price' => $Price,
        ':id' => $id
    ];
    $stm->execute($data);

    }catch(PDOExeption $e){
        echo $e->getmessage();
    }
    
    
}
?>