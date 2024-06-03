<?php
session_start();
include ('dbconnection.php');
if (isset($_POST['save-card-btn']) ){
    $Information = $_POST['Information'];
    $Star = $_POST['Star'];
    $Price = $_POST['Price'];
    $Image = $_FILES['Image']['name'];
    $tmp_dir = $_FILES['Image']['tmp_name'];
    $ImageSize = $_FILES['Image']['size'];
    $upload_dir = "assets/";
    $imgExt = strtolower(pathinfo($Image,PATHINFO_EXTENSION)); 
    $valid_extensions = array('jpeg','jpg','png','gif','pdf');
    $picProfile = rand(1000,1000000) . '.' . $imgExt ;
    move_uploaded_file($tmp_dir , $upload_dir.$picProfile); 

    $sql = "INSERT INTO popularfood(img ,information,star,price) value (:img ,:Information,:Star,:Price)"; 
    $sql_run = $connection->prepare($sql);

    $data = [
        ':img' => $picProfile,
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
    $ImageName = $_FILES['Image']['name'];
    $tmp_name = $_FILES['Image']['tmp_name'];
    $size = $_FILES['Image']['size'];
    $error = $_FILES['Image']['error'];

    $Information = $_POST['Information'];
    $Star = $_POST['Star'];
    $Price = $_POST['Price'];
    $id = $_POST['id-input'];
    echo $ImageData ;
    try{
        $sql = "UPDATE popularfood SET img=:img,information=:information,star=:star,price=:price WHERE id=:id LIMIT 1" ; 
        $sql_run = $connection->prepare($sql);
        $data = [
            ':img' => $ImageData,
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