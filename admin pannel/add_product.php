<?php 
    include '../components/connect.php';

    if(isset($_COOKIE['seller_id'])){
        $seller_id = $_COOKIE['seller_id'];
    }else{
        $seller_id = '';
        header('location:login.php');
        exit();
    }

    function handleImageUpload($image_file, $seller_id, $folder) {
        // Ambil detail file
        $image_name = $image_file['name'];
        $image_tmp_name = $image_file['tmp_name'];
        $image_size = $image_file['size'];

        // Filter dan validasi nama file
        $image_name = filter_var($image_name, FILTER_SANITIZE_STRING);
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

        // Validasi ekstensi file
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($image_extension), $allowed_extensions)) {
            return ['error' => 'Only JPG, JPEG, PNG, and GIF files are allowed.'];
        }

        // Validasi ukuran file
        if ($image_size > 2000000) { // 2MB limit
            return ['error' => 'Image size is too large.'];
        }

        // Buat nama file unik
        $unique_image_name = time() . "_{$seller_id}." . $image_extension;
        $image_path = $folder . $unique_image_name;

        // Pindahkan file ke folder tujuan
        if (move_uploaded_file($image_tmp_name, $image_path)) {
            return ['success' => $unique_image_name];
        } else {
            return ['error' => 'Failed to upload image.'];
        }
    }

    // Tambahkan produk baru
    if (isset($_POST['publish']) || isset($_POST['draft'])) {
        $id = unique_id();
        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
        $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
        $stock = filter_var($_POST['stock'], FILTER_SANITIZE_STRING);
        $status = isset($_POST['publish']) ? 'active' : 'deactive';
        
        $image_result = handleImageUpload($_FILES['image'], $seller_id, '../uploaded_files/');
        
        if (isset($image_result['error'])) {
            $warning_msg[] = $image_result['error'];
        } else {
            $image = $image_result['success'];
            
            $insert_post = $conn->prepare("INSERT INTO `products` (id, seller_id, name, price, image, stock, product_detail, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $insert_post->execute([$id, $seller_id, $title, $price, $image, $stock, $content, $status]);
            $success_msg[] = 'Product inserted successfully!';
        }
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
	<title>Admin - add product page</title>
</head>
<body>
	<div class="main-container">
		
		<?php include '../components/admin_header.php'; ?>
		<section class="post-editor">
			<div class="heading">
				<h1>add product</h1>
				<img src="../image/separator.png" width="100">
			</div>
			
			
			<div class="form-container">
				<form action="" method="post" enctype="multipart/form-data" class="register">
					<div class="input-field">
						<p>product name <span>*</span></p>
						<input type="text" name="title" maxlength="100" placeholder="add product title" required class="box">
					</div>
					<div class="input-field">
						<label>product price <sup>*</sup></label>
						<input type="number" name="price" maxlength="100" placeholder="add product price" required class="box">
					</div>
					<div class="input-field">
						<p>product detail <span>*</span></p>
						<textarea name="content" required maxlength="10000" placeholder="product detail" class="box"></textarea>
					</div>
					<div class="input-field">
						<p>total stock <span>*</span></p>
         				<input type="number" name="stock" required maxlength="10" placeholder="total products available" min="0" max="9999999999" class="box">
					</div>
					<div class="input-field">
						<label>product image <sup>*</sup></label>
						<input type="file" name="image" accept="image/*" required class="box">
					</div>
					<div class="flex-btn">
						<input type="submit" name="publish" value="publish now" class="btn">
						<input type="submit" name="draft" value="save draft" class="btn">
					</div>
				</form>
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