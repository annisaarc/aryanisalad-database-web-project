<?php

   include 'components/connect.php';

   if(isset($_COOKIE['user_id'])){
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/user_style.css">
    <title>Aryani Salad - home page</title>
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <!-- slider section -->
    <div class="slider-container" id="home">
        <div class="slider">
            <div class="slideBox active">
                <div class="textBox">
                    <h1>we pride ourselfs on <br> exceptional flavors</h1>
                    <a href="" class="btn">shop now</a>
                </div>
                <div class="imgBox">
                    <img src="image/saladbanner_1.jpg" alt="">
                </div>
            </div>
            <div class="slideBox">
                <div class="textBox">
                    <h1>cold treats are my kind <br> of comfort food</h1>
                    <a href="" class="btn">shop now</a>
                </div>
                <div class="imgBox">
                    <img src="image/saladbanner_1.jpg" alt="">
                </div>
            </div>
            
        </div>
        <ul class="controls">
            <li onclick="nextSlide();" class="next"><i class='bx bx-right-arrow-alt'></i></li>
            <li onclick="prevsSlide();" class="prev"><i class='bx bx-left-arrow-alt'></i></li>
        </ul>
    </div>
    <!-- service -->
    <div class="service">
        <div class="box-container">
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services.png" alt="" class="img1">
                        <img src="image/services (1).png" alt="" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>delivery</h4>
                    <span>100% secure</span>
                </div>
            </div>
            <!-- service item -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services (2).png" alt="" class="img1">
                        <img src="image/services (3).png" alt="" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>payment</h4>
                    <span>100% secure</span>
                </div>
            </div>
            <!-- service item -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services (5).png" alt="" class="img1">
                        <img src="image/services (6).png" alt="" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>support</h4>
                    <span>24x7 hours</span>
                </div>
            </div>
            <!-- service item -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services (7).png" alt="" class="img1">
                        <img src="image/services (8).png" alt="" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>gift service</h4>
                    <span>support gift service</span>
                </div>
            </div>
            <!-- service item -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/service.png" alt="" class="img1">
                        <img src="image/service (1).png" alt="" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>returns</h4>
                    <span>24x7 free returns</span>
                </div>
            </div>
            <!-- service item -->
            <div class="box">
                <div class="icon">
                    <div class="icon-box">
                        <img src="image/services.png" alt="" class="img1">
                        <img src="image/services (1).png" alt="" class="img2">
                    </div>
                </div>
                <div class="detail">
                    <h4>delivery</h4>
                    <span>100% secure</span>
                </div>
            </div>
        </div>
    </div>

    <!-- taste -->
    <div class="taste">
        <div class="heading">
            <h1>Taste</h1>
            <img src="image/separator.png" alt="">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/strawberry_taste.jpg" alt="">
                <div class="detail">
                    <h2>Natural Sweetness</h2>
                    <h1>Strawberry</h1>
                </div>
            </div>
            <div class="box">
                <img src="image/matcha_taste.jpg" alt="">
                <div class="detail">
                    <h2>Natural Sweetness</h2>
                    <h1>Matcha</h1>
                </div>
            </div>
            <div class="box">
                <img src="image/oreo_taste.jpg" alt="">
                <div class="detail">
                    <h2>Natural Sweetness</h2>
                    <h1>Oreo</h1>
                </div>
            </div>
            <div class="box">
                <img src="image/original_taste.jpg" alt="">
                <div class="detail">
                    <h2>Natural Sweetness</h2>
                    <h1>Original</h1>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- taste end-->

    <!-- container -->
    <div class="ice-container">
        <div class="overlay"></div>
        <div class="detail">
            <h1>Fruit Salad is cheaper than <br> therapy for stress</h1>
            <p>Come choose your Fruit Salad!</p>
            <a href="menu.php" class="btn">shop now</a>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>