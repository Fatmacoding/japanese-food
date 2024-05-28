<?php
  include 'dbconnection.php '; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon" />

    <!--=============== TITTLE ===============-->
        <title>SakuraBite</title>

    <!--=============== STYLE ===============-->
        <link rel="stylesheet" href="../style/style.css">

    <!--=============== AOS ===============-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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
          <a href="#home">home</a>
        </li>
        <li>
          <a href="#food">Food</a>
        </li>
        <li>
          <a href="#services">Services</a>
        </li>
        <li>
          <a href="#about-us">About Us</a>
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
        <!--=============== HOME ===============-->
      <section class="hero" id="home">
        <div class="hero-image">
          <img src="../assets/sushi-1.png" alt="sushi" data-aos="fade-right"/>
          <h2 data-aos="fade-right">
            日 <br />
            本 <br />
            食
          </h2>
  
          <div class="hero-image__overlay"></div>
        </div>
  
        <div class="hero-content">
          <div class="hero-content-info" data-aos="fade-left">
            <h1>Feel the taste of Japanese food</h1>
            <p>Feel the taste of Japanese food from anywhere and anytime.</p>
            <div class="hero-content__btns">
              <button class="hero-content__order-btn">Order Now</button>
              <button class="hero-content__play-btn">
                <img src="../assets/play-circle.svg" alt="play" />
                How to Order
              </button>
            </div>
          </div>
  
          <div class="hero-content__testimonial" data-aos="fade-up">
            <div class="hero-content__customer flex-center">
              <h4>24 <span>K+</span></h4>
              <p>Happy Customars</p>
            </div>
  
            <div class="hero-contnet__review">
              <img src="../assets/user.png" alt="user" />
              <p>
                "This is the best Japanese food delivery service that ever
                existed."
              </p>
            </div>
          </div>
        </div>
      </section>
        

    <!--=============== ABOUT-US ===============-->
    <section class="about-us" id="about-us">
      <div class="about-us__img">
        <div class="about-us__img-sushi3">
          <img src="../assets/sushi-3.png" alt="sushi"  data-aos="fade-right"/>
        </div>

        <button class="about-us__btn" data-aos="fade-left">
          Learn More
          <img src="../assets/arrow-up-right.svg" alt="learn more" />
        </button>

        <div class="about-us__img-sushi2">
          <img src="../assets/sushi-2.png" alt="sushi" data-aos="fade-right"/>
        </div>
      </div>

      <div class="about-us__content" data-aos="fade-left">
        <p class="sushi__subtitle">About Us / 私たちに関しては</p>
        <h3 class="sushi__title">
          Our mission is to bring true Japanese flavours to you.
        </h3>
        <p class="sushi__description">
          We will continue to provide the experience of Omotenashi, the Japanese
          mindset of hospitality, with our shopping and dining for our
          customers.
        </p>
      </div>

    </section>
    <!--=============== POPULAR-FOODS ===============-->
    <section class="popular-foods" id="food">
      <h2 class="popular-foods__title" data-aos="flip-up">Popular Food / 人気</h2>
      <div class="popular-foods__filters sushi__hide-scrollbar"  data-aos="fade-up">
        <button class="popular-foods__filter-btn active">All</button>
        <button class="popular-foods__filter-btn">
          <img src="../assets/sushi-9.png" alt="sushi 9" />
          Sushi
        </button>       
        <button class="popular-foods__filter-btn">
          <img src="../assets/sushi-8.png" alt="sushi 8" />
          Ramen
        </button>
        <button class="popular-foods__filter-btn">
          <img src="../assets/sushi-7.png" alt="sushi 7" />
          Udon
        </button>
        <button class="popular-foods__filter-btn">
          <img src="../assets/sushi-6.png" alt="sushi 6" />
          Danggo
        </button>
        <button class="popular-foods__filter-btn">Other</button>
      </div>

      <div class="popular-foods__catalogue"  data-aos="fade-up">
      <?php 
            $query = 'SELECT * FROM popularfood ORDER BY star DESC ';
            $STATMENT = $connection->prepare($query);
            $STATMENT->execute();
            $result = $STATMENT->fetchAll(PDO::FETCH_ASSOC);
            $arr = [1,0,2];
            if($result){
              foreach($arr as $i){  
                    if($i==0){
                ?>
                  <article class="popular-foods__card active-card ">
                      <img
                          class="popular-foods__card-img"
                          src="../assets/<?= $result[$i]['img'];?>"
                          alt="sushi 12"
                      />
                      <h4 class="popular-foods__card-title"><?= $result[$i]['information'];?></h4>
                      <div class="popular-foods__card-details flex-between">
                          <div class="popular-foods__card-rating">
                          <img src="../assets/star.svg" alt="" />
                          <p><?=$result[$i]['star'];?></p>
                          </div>

                          <p class="popular-foods__card-price">
                          <?= $result[$i]['price'];?>$
                          </p>
                      </div>
                  </article>
                <?php  
                    }
                else{ ?>
                    <article class="popular-foods__card">
                        <img
                            class="popular-foods__card-img"
                            src="../assets/<?= $result[$i]['img'];?>"
                            alt="sushi 12"
                        />
                        <h4 class="popular-foods__card-title"><?= $result[$i]['information'];?></h4>
                        <div class="popular-foods__card-details flex-between">
                            <div class="popular-foods__card-rating">
                            <img src="../assets/star.svg" alt="" />
                            <p><?=$result[$i]['star'];?></p>
                            </div>

                            <p class="popular-foods__card-price">
                            <?= $result[$i]['price'];?>$
                            </p>
                        </div>
                    </article>

                <?php    
                }
                }
            }       
        ?>
        </article>
      </div>
      <div class="Aexplore">
      <a href="exploreFood.php" class="a__explore" >    
        <button class="popular-foods__btn">
          Explore Food
          <img src="../assets/arrow-right.svg" alt="arrow-right" />
        </button>                                                
      </a>        
      </div>
    </section>
    <!--=============== TRENDING-SUSHI ===============-->
      <section class="trending" id="food">
        <section class="trending-sushi">
          <div class="trending__content"  data-aos="fade-right">
            <p class="sushi__subtitle">What's Trending / トレンド</p>
            <h3 class="sushi__title">Japanese Sushi</h3>
            <p class="sushi__description">Feel the taste of the most delicious Sushi here.</p>
    
            <ul class="trending__list flex-between">
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Make Sushi</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Oshizushi</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Uramaki Sushi</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Nigiri Sushi</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Temaki Sush</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Inari Sushi</p>
              </li>
            </ul>
          </div>
    
          <div class="trending__img flex-center">
            <img src="../assets/sushi-5.png" alt="sushi 5" data-aos="fade-left">
            <div class="trending__arrow trending__arrow-left">
              <img src="../assets/arrow-vertical.svg" alt="arrow vertical">
            </div>
            <div class="trending__arrow trending__arrow-bottom">
              <img src="../assets/arrow-horizontal.svg" alt="arrow horizontal">
            </div>
          </div>
        </section>
        
      <!--=============== TRENDING-SUSHI/ button (Discover) /TRENDING-DRINKS ===============-->

        <div class="trending__discover" data-aos="zoom-in">
          <p>Discover</p> 
        </div>
  
      <!--=============== TRENDING-DRINKS ===============-->
        <section class="trending-drinks">
          <div class="trending__img flex-center">
            <img src="../assets/sushi-4.png" alt="sushi 4" data-aos="fade-right">
            <div class="trending__arrow trending__arrow-top">
              <img src="../assets/arrow-horizontal.svg" alt="arrow horizontal">
            </div>
            <div class="trending__arrow trending__arrow-right">
              <img src="../assets/arrow-vertical.svg" alt="arrow vertical">
            </div>
          </div>
  
          <div class="trending__content" data-aos="fade-left">
            <p class="sushi__subtitle">What's Trending / トレンド</p>
            <h3 class="sushi__title">Japanese Drinks</h3>
            <p class="sushi__description">Feel the taste of the most delicious Japanese Drinks here.</p>
    
            <ul class="trending__list flex-between">
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Oruncha</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Sakura Tea</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Aojiru</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Ofukucha</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Kombu-cha</p>
              </li>
              <li>
                <div class="trending__icon flex-center">
                  <img src="../assets/check.svg" alt="check">
                </div>
                <p class="p-trending">Mugicha</p>
              </li>
            </ul>
          </div>
        </section>
      </section>

      <!--=============== SUBSCRIPTION ===============-->
      <section class="subscription flex-center" id="services">
        <h2 data-aos="flip-down">
          Get offers straight <br>
          to your inbox
        </h2>
        <p data-aos="fade-up">Sign up for the <b><span class="span-sakura">Sakura</span><span class="sou__title">Bite</span></b> newsletter</p>
  
        <div class="subscription__form" data-aos="fade-up">
          <input type="text" placeholder="Enter Your email address ">
          <button>Get Started</button>
        </div>
      </section>  
    <!--=============== FOOTER ===============-->
      <footer class="footer flex-between">
        <h3 class="footer__logo">
          <span>Sakura</span>Bite
        </h3>
  
          <ul class="footer__nav">
            <li><a href="#home">Home</a></li>
            <li><a href="#food">Food</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about-us">About US</a></li>
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
    <!--=============== AOS JS ===============-->
      <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
        // init AOS animation
        AOS.init({
            duration: 1000,
            offset: 100,
        });
    </script>

  </body>
</html>