<?php
    include ('dbconnection.php');
    session_start(); 
    if(!isset($_SESSION['email'])){
        header('Location:Admin-Login.php');
    };
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
            text-align:center;
        }
        .table td{
            background-color : var(--color-white);
            color: #702d30;
            font-size:larger;
        }
        tr{
            border : 4px solid var(--primary-color);
        }
        .td1{
            border : 2px solid var(--primary-color);
        }
        .popular-foods__title{
            margin-bottom: 40px;
        }
        #popular-foods__filter-btn-delete{
            background-color:var(--primary-color);
            padding: 10px 28px;
            /* margin-left: 20px; */
            /* margin-right: -45px; */
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
        #popular-foods__filter-btn-update{
            background-color:var(--primary-color);
            padding: 10px 28px;
            /* margin-left:-12px; */
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
        .a{
            display: inline-block;
        }
    </style>
</head>
<body>
        <section class="popular-foods">
            <div id="div-head">
                <?php if(isset($_SESSION['email'])) : ?>
                        <h5 class="alert alert-light w-25">Welcome <?= $_SESSION['email'];?> </h5>
                <?php 
                    // unset($_SESSION['email']);
                    endif; 
                ?>
                <?php if(isset($_SESSION['message'])) : ?>
                    <script type='text/javascript'>alert('<?= $_SESSION['message']; ?>')</script>
                <?php 
                    unset($_SESSION['message']);
                    endif; 
                ?>
                <a href="logoutAdmin.php"><button type="button" class="btn btn-outline-warning float-end">Logout</button></a>
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
                                $query = " SELECT * FROM popularfood ORDER BY price asc ";
                                $statment = $connection->prepare($query);
                                $statment->execute();
                                $result =  $statment->FetchAll(PDO::FETCH_ASSOC);
                                if($result){
                                    foreach($result as $row){
                            ?>
                                <tr>
                                    <td class="td1"><img class="popular-foods__card-img"
                                                        src="../assets/<?= $row['img']?>"
                                                        alt="sushi 12"/></td>
                                    <td class="td1"><?= $row['information']?></td>
                                    <td class="td1"><?= $row['star']?></td>
                                    <td class="td1"><?= $row['price']?></td> 
                                    <td class="td">                                        
                                        <a href="update-card.php?id=<?= $row['id'];?>" class="a"><button type="submit" id="popular-foods__filter-btn-update">UPDATE</button></a>
                                        <form action="code.php" method="post" style="display: inline-block;">
                                            <button type="submit" id="popular-foods__filter-btn-delete" value="<?= $row['id']; ?>" name="btn-delete">DELETE</button>
                                        </form>
                                    </td>

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