<?php
    include ('dbconnection.php');
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
        <title>Admine</title>
    <!--=============== STYLE ===============-->
        <link rel="stylesheet" href="../style/style.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            background-color: var(--primary-color);
            background-image: url("../assets/popular_bg.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }
        .div_links{
            display: flex;
            align-items:center;
            justify-content:space-evenly;
            margin : 40px;
        }  
        .table th{
            background-color : var(--color-creamson);
            border : 2px solid var(--primary-color);
            color : var(--black-300);
        }
        .table td{
            background-color : var(--color-white);
            border : 2px solid var(--primary-color);
            color: #702d30;
            font-size:larger;
        }
        .popular-foods__title{
            margin-bottom: 40px;
        }
        #popular-foods__filter-btn{
            background-color:var(--primary-color);
            padding: 10px 28px;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 10px;
            border: 1px solid rgba(255, 255, 255, .05);
            border-radius: 46px;
            font-size: 16px;
            font-weight: 300;
            line-height: 25px;
            font-family: var(--plus-jakarta-sans);
            color: var(--color-creamson);
            cursor: pointer;
        }
    </style>
</head>
<body>
        <section class="popular-foods">
            <div id="div-head">
                <h3 class="popular-foods__title">Your Food / 人気</h3>
                <div class="div_links">
                    <a href="home#home" class="add_card_link">
                        <button class="popular-foods__filter-btn">
                        <img src="../assets/homeAdmn.png" alt="sushi 7" />
                            Home
                        </button>
                    </a>
                    <a href="home#food" class="add_card_link">
                        <button class="popular-foods__filter-btn">
                        <img src="../assets/sushi-3.png" alt="sushi 7" />
                        Popular Food
                        </button>
                    </a>
                    <a href="exploreFood.php" class="add_card_link">
                        <button class="popular-foods__filter-btn">
                            <img src="../assets/sushi-8.png" alt="sushi 8" />
                            All Food
                        </button>
                    </a>
                    <a href="add-card.php" class="add_card_link">
                        <button class="popular-foods__filter-btn active">
                        <img src="../assets/Picture2.png" alt="sushi 7" />
                            ADD new card
                        </button>
                    </a>
                </div>
            </div>
            <div class="body__card">
                <table class="table table-bordered">
                    <thead>
                        <th>Image</th>
                        <th>Information</th>
                        <th>Star</th>
                        <th>Price</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php  
                            $query = "SELECT * FROM popularfood ";
                            $statment = $connection->prepare($query);
                            $statment->execute();
                            $result =  $statment->FetchAll(PDO::FETCH_ASSOC);
                            if($result){
                                foreach($result as $row){
                        ?>
                            <tr>
                                <td><?= $row['img']?></td>
                                <td><?= $row['information']?></td>
                                <td><?= $row['star']?></td>
                                <td><?= $row['price']?></td>
                                <td><a href="delet-card.php"><button id="popular-foods__filter-btn">DELET</button></a></td>

                            </tr>
                        <?php  
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>