<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!--=============== FAVICON ===============-->
     <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon" />
    <!--=============== TITTLE ===============-->
        <title>Admine Add Card</title>
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
                <?php if(isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php 
                    unset($_SESSION['message']);
                    endif; 
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h3>
                                Tap the information of card.
                                <a href="Admin.php" class="btn btn-danger">BACK</a>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label>Image :</label>
                                    <input type="file" class="form-control" name="Image"/>
                                </div>
                                <div class="mb-4">
                                    <label>Information :</label>
                                    <input type="text" class="form-control" name="Information"/>
                                </div>
                                <div class="mb-4">
                                    <label>Star :</label>
                                    <input type="text" class="form-control" name="Star"/>
                                </div>
                                <div class="mb-4">
                                    <label>Price :</label>
                                    <input type="text" class="form-control" name="Price"/>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" name="save-card-btn" class="btn btn-primary">Save card</button>
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
