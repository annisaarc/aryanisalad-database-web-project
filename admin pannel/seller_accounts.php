<?php 
    include '../components/connect.php';
    if(isset($_COOKIE['seller_id'])){
        $seller_id = $_COOKIE['seller_id'];
       }else{
          $seller_id = '';
          header('location:login.php');
       }
?>
<style>
    <?php include '../css/admin_style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- box icon cdn link  -->
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin - Seller Account Page</title>
</head>
<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="accounts">
            <div class="heading">
                <h1>Registered Sellers</h1>
                <img src="../image/separator.png" width="100">
            </div>
            <div class="box-container">
                <?php 
                    $select_sellers = $conn->prepare("SELECT * FROM `sellers`");
                    $select_sellers->execute();
                    if ($select_sellers->rowCount() > 0) {
                        while($fetch_sellers = $select_sellers->fetch(PDO::FETCH_ASSOC)){
                            $seller_id = $fetch_sellers['id'];
                ?>
                <div class="box">
                    <img src="../uploaded_files/<?= $fetch_sellers['image']; ?>" alt="Seller Image">
                    <p>Seller ID : <span><?= $seller_id ?></span></p>
                    <p>Seller Name : <span><?= $fetch_sellers['name']; ?></span></p>
                    <p>Seller Email : <span><?= $fetch_sellers['email']; ?></span></p>
                </div>
                <?php 
                        }
                    }else{
                        echo '
                            <div class="empty">
                                <p>No sellers registered yet</p>
                            </div>
                        ';
                    }
                ?>
            </div>
        </section>
        
    </div>
    
    <!-- sweetalert cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- custom js link  -->
    <script type="text/javascript" src="script.js"></script>

    <?php include '../components/alert.php'; ?>
</body>
</html>