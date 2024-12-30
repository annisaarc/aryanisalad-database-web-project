<?php 
	include 'components/connect.php';
	
	if(isset($_COOKIE['user_id'])){
      $user_id = $_COOKIE['user_id'];
   }else{
      $user_id = '';
      
   }

	

	include 'components/add_wishlist.php';
	include 'components/add_cart.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- box icon cdn link  -->
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="css/user_style.css">
	<title>Aryani Salad - menu page</title>
</head>
<body>
	<?php include 'components/user_header.php'; ?>
	
	<div class="banner">
        <div class="detail">
            <h1>our menu</h1>
            <p>Discover a variety of delicious and healthy fresh fruit options on our menu,<br>
				designed to satisfy every taste and provide you with a refreshing dining experience.</p>
            <span><a href="home.html">home</a><i class='bx bx-right-arrow-alt'></i>our menu</span>
        </div>
    </div>
	<section class="products">
		<div class="box-container">
		<?php 
			$select_products = $conn->prepare("SELECT * FROM `products` WHERE status = ?");
			$select_products->execute(['active']);
			if ($select_products->rowCount() > 0) {
				while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){


		?>
		<form action="" method="post" class="box <?php if($fetch_products['stock'] == 0){echo 'disabled';}; ?>">
			<img src="uploaded_files/<?= $fetch_products['image']; ?>" class="image">
			<?php if ($fetch_products['stock'] > 9) { ?>
		         <span class="stock" style="color: green;"><i class="fas fa-check" style="margin-right: .5rem;"></i>In Stock</span>
		      <?php }elseif($fetch_products['stock'] == 0){ ?>
		         <span class="stock" style="color: red;"><i class="fas fa-times" style="margin-right: .5rem;"></i>Out Of Stock</span>
		      <?php }else{ ?>
		         <span class="stock" style="color: red;">Hurry, only <?= $fetch_products['stock']; ?>left</span>
		      <?php } ?>
			<div class="content">
				<img src="image/shape-19.png" alt="" class="shap">
				<div class="button">
					<div><h3 class="name"><?= $fetch_products['name']; ?></h3></div>
					<div>
						<button type="submit" name="add_to_cart"><i class="bx bx-cart"></i></button>
						<button type="submit" name="add_to_wishlist"><i class="bx bx-heart"></i></button>
						<a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="bx bxs-show"></a>
					</div>
				</div>
				<p class="price">price Rp<?= $fetch_products['price']; ?></p>
				<input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
				<div class="flex-btn">
					<a href="checkout.php?get_id=<?= $fetch_products['id']; ?>" class="btn">buy now</a>
					<input type="number" name="qty" required min="1" value="1" max="99" maxlength="2" class="qty">
				</div>
			</div>
		</form>
		<?php 
				}
			}else{
				echo'
					<div class="empty">
						<p>no products added yet!</p>
					</div>
				';
			}
		?>
		

	</div>

	</section>


	<?php include 'components/footer.php'; ?>
	
	<!-- sweetalert cdn link  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<!-- custom js link  -->
	<script type="text/javascript" src="js/script.js"></script>

	<?php include 'components/alert.php'; ?>
</body>
</html>
