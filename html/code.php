<?php
session_start();
include ('dbconnection.php');
echo "gffhjghjg";
if (isset($_POST['save-card-btn'])){
    // $Image = $_POST['Image'];
    $Information = $_POST['Information'];
    $Star = $_POST['Star'];
    $Price = $_POST['Price'];

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
?>