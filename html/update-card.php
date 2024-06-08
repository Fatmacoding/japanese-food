<?php
    include ("dbconnection.php");
    session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!--=============== FAVICON ===============-->
     <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon" />
    <!--=============== TITTLE ===============-->
        <title>Admine Update Card</title>
    <!--=============== STYLE ===============-->
        <link rel="stylesheet" href="../style/style.css">
    <style>
        .div-All{
            display: flex;
            align-items:center;
            justify-content:center;
        }
    </style>
</head>
<body>
    <div class="div-All">
        <div class="container mt-4">
            <div class="row">
            <div class="col-3 mt-4"></div>
                <div class="col-6 mt-4">
                <?php if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM popularfood WHERE id=:id LIMIT 1";
                    $stm = $connection->prepare($sql);
                    $data = [
                        ':id' => $id 
                    ];
                    $stm->execute($data);
                    $result = $stm->fetch(PDO::FETCH_OBJ); 
                    }
                ?> 
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                Update the card.
                                <a href="Admin.php" class="btn btn-danger float-end">BACK</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id-input" value="<?= $result->id;?>">
                                <div class="mb-4">
                                    <label>Image :</label>
                                    <input type="file" class="form-control" name="Image" value="<?= $result->img;?>"/>
                                </div>
                                <div class="mb-4">
                                    <label>Information :</label>
                                    <input type="text" class="form-control" value="<?= $result->information;?>" name="Information" required/>
                                </div>
                                <div class="mb-4">
                                    <label>Star :</label>
                                    <input type="number" step="0.01" class="form-control" value="<?= $result->star;?>" name="Star" required/>
                                </div>
                                <div class="mb-4">
                                    <label>Price :</label>
                                    <input type="number" step="0.01" class="form-control" value="<?= $result->price;?>" name="Price" required/>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" name="update-card-btn" class="btn btn-primary">Save card</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

