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
    <title>Aryani Salad - about us page</title>
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>about us</h1>
            <p>At Aryani Salad, we bring you the perfect blend of freshness and flavor<br>
            with our premium fruit salads crafted to brighten your day.</p>
            <span><a href="home.html">home</a><i class='bx bx-right-arrow-alt'></i>about us</span>
        </div>
    </div>
    <div class="story">
        <div class="heading">
            <h1>Our Story</h1>
            <img src="image/separator.png" alt="">
        </div>
        <p>Our story began with a simple mission: to create delightful, nutritious fruit salads and desserts that bring joy and wellness to every table. 
            <br> With a commitment to using only the freshest ingredients and an unwavering passion for quality, we have grown into a trusted name for delicious, handcrafted treats. 
            <br> Each product we make is a testament to our love for food and our dedication to satisfying our customers, one bite at a time.</p>
        <a href="menu.php" class="btn">our services</a>
    </div>

    <!-- -----------------testimonial----------------- -->
    <div class="testimonial">
        <div class="heading">
            <h1>testimonial</h1>
            <img src="image/separator.png" alt="">
        </div>
        <div class="testimonial-container">
            <div class="slide-row" id="slide">
              <div class="slide-col">
                    <div class="user-text">
                        <p>"The fruit salads here are absolutely amazing! Fresh, flavorful, and so beautifully presented. It's my go-to treat for every occasion!"</p>
                        <h2>Zen</h2>
                        <p>Author</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial (1).jpg" alt="avatar">
                    </div>
                </div>
    
                <div class="slide-col">
                    <div class="user-text">
                        <p>"I’ve tried so many dessert places, but nothing compares to the quality and taste here. The attention to detail and freshness are unbeatable!"</p>
                        <h2>Jonathan</h2>
                        <p>Treymont Inc.</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial (2).jpg" alt="avatar">
                    </div>
                </div>
    
                <div class="slide-col">
                    <div class="user-text">
                        <p>"Every bite feels like a burst of joy! The perfect balance of sweetness and freshness – I can’t recommend it enough."</p>
                        <h2>Charlie</h2>
                        <p>Hallmark Inc.</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial (3).jpg" alt="avatar">
                    </div>
                </div>
              
               <div class="slide-col">
                    <div class="user-text">
                        <p>"Not only is the presentation stunning, but the taste is out of this world. These fruit salads are the highlight of my week!"</p>
                        <h2>Sarah</h2>
                        <p>Zara Inc.</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial (4).jpg" alt="avatar">
                    </div>
                </div>

            </div>
        </div>
        
        <div class="indicator">
            <span class="btn1 active"></span>
            <span class="btn1"></span>
            <span class="btn1"></span>
            <span class="btn1"></span>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>
    <script src="js/script.js"></script>
</body>
</html>