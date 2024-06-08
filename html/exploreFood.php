<?php
  include 'dbconnection.php ';
  session_start(); 
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--=============== FAVICON ===============-->
     <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon" />

    <!--=============== TITTLE ===============-->
        <title>Food-Menu</title>

    <!--=============== STYLE ===============-->
        <link rel="stylesheet" href="../style/style.css">

    <!--=============== AOS ===============-->
        <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
    <style>
        .header__logo{
            background-color: var(--color-white);
            
        }
        .header__logo h4 {
            color : var(--primary-color);
        }
    </style>
</head>
<body>
<header>

<nav class="header__nav">
  <div class="header__logo">
    <h4 data-aos="fade-down">Sakura<span class="sou__title">Bite</span></h4>
    <div class="header__logo-overlay"></div>
  </div>

    <!--=============== MENU ===============-->
  <ul class="header__menu"  data-aos="fade-down">
    <li>
      <a href="home#home">home</a>
    </li>
    <li>
      <a href="home#food">Food</a>
    </li>
    <li>
      <a href="home#services">Services</a>
    </li>
    <li>
      <a href="home#about-us">About Us</a>
    </li>
    <li>
      <img src="../assets/search.svg" alt="search" />
    </li>
    <li class="close">
      <img src="../assets/close.png" alt="close" />
    </li>
  </ul>
    <!--=============== MENU-MOBILE ===============-->
    <ul class="header__menu-mobile" id="menu" data-aos="fade-down">
      <li>
        <img src="../assets/menu.svg" alt="menu" />
      </li>
    </ul>
  </nav>
</header>

<!--=============== POPULAR-FOODS ===============-->
    <section class="popular-foods" id="food">
        <h2 class="popular-foods__title" data-aos="flip-up">All Food / すべての食べ物</h2>
        <div class="popular-foods__catalogue"  data-aos="fade-up">
            <?php 
                $query = 'SELECT * FROM popularfood';
                $STATMENT = $connection->prepare($query);
                $STATMENT->execute();
                $result = $STATMENT->fetchAll();
                if($result){
                    foreach($result as $row ){
                        ?>   
                        <article class="popular-foods__card">
                            <img
                                class="popular-foods__card-img"
                                src="../assets/<?= $row['img'];?>"
                                alt="sushi 12"
                            />
                            <h4 class="popular-foods__card-title"><?= $row['information'];?></h4>
                            <div class="popular-foods__card-details flex-between">
                                <div class="popular-foods__card-rating">
                                <img src="../assets/star.svg" alt="" />
                                <p><?= $row['star'];?></p>
                                </div>

                                <p class="popular-foods__card-price">
                                <?= $row['price'];?>$
                                </p>
                            </div>
                        </article>
                    <?php  
                    }
                }
            ?>
        </div>
    </section>
    <!--=============== FOOTER ===============-->
    <footer class="footer flex-between">
        <h3 class="footer__logo">
          <span>Sakura</span>Bite
        </h3>
  
        <ul class="footer__nav">
        <li><a href="home#home">Home</a></li>
        <li><a href="home#food">Food</a></li>
        <li><a href="home#services">Services</a></li>
        <li><a href="home#about-us">About US</a></li>
        </ul>
  
        <ul class="footer__social">
        <li class="flex-center">
            <img src="../assets/facebook.svg" alt="facebook">
        </li>
        <li class="flex-center">
            <img src="../assets/instagram.svg" alt="instagram">
        </li>
        <li class="flex-center">
            <img src="../assets/twitter.svg" alt="twitter">
        </li>
        </ul>
    </footer>
        <!--=============== MAIN JS ===============-->
            <script src="../javascript/main.js"></script>
</body>
</html>