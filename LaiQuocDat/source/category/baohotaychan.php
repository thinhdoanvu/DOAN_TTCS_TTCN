<?php
include("../dashboard/connection.php");
$title = "Bảo hộ tay - chân";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>DMS | <?php echo $title; ?></title>
	<!-- favicon -->
	<link rel="icon" type="image/x-icon" href="../ico/favicon.ico" />
	<!--css-->
	<link href="../css/front/header.css" rel="stylesheet" type="text/css" />
	<link href="../css/front/category.css" rel="stylesheet" type="text/css" />
	<!-- js -->
	<script type="text/javascript" src="../js/main.js"></script>
</head>

<body>
	<div class="container">
		<!-- NAVIGATION -->
		<section class="nav">
			<a href="../index.html" class="logo"></a>
			<div class="navigation">
				<div class="navlink" id="navlink">
					<a href="../index.html#sec1">ĐỐI KHÁNG</a>
					<a href="../index.html#sec2">QUYỀN</a>
					<a href="../index.html#sec3">TRANG BỊ KHÁC</a>
					<a href="../index.html#sec4">VỀ DMS</a>
				</div>
				<a class="hamburger"></a>
			</div>
		</section>
		<!-- CATEGORY ITEM -->
		<div class="category">
			<div class="breadcrumb">
				<p class="breadcrumb-text">TRANG CHỦ \ QUYỀN \ <?php echo "<span style='text-transform: uppercase'>$title</span>" ?></p>
			</div>
			<p class="category-title"><?php echo $title; ?></p>
			<div class="category-row">
				<?php
				$i=1;
				$query = "SELECT product.Name, product.Thumbnail FROM product INNER JOIN subcategory ON product.Subcategory = subcategory.Id WHERE subcategory.Name = '$title'";
				$result = $conn->query($query);
				while ($rows = $result->fetch_assoc()) {
					echo "
					<a href='javascript:openItem($i);' class='category-item'>
					<img class='thumb' src='$rows[Thumbnail]'>
					<p class='item-title' style='text-transform:uppercase'>$rows[Name]</p>
				</a>
					";
				$i++;
				}
				?>

			</div>
		</div>
		<!-- ITEM DETAIL POP-UP -->
		<?php
		$i = 1;
		$query = "SELECT * FROM product INNER JOIN subcategory ON product.Subcategory = subcategory.Id WHERE subcategory.Name = '$title'";
		$result = $conn->query($query);
		while ($rows = $result->fetch_assoc()) {
			echo "
					<div class='popup-container' id='popupcontainer$i'>
					<div class='popup' id='popup$i'>
						<div class='popup-thumbnail'>
							<div class='productimgwrapper' id='wrapper$i'>
								<div class='productimg'><img src='$rows[Thumbnail]'></div>
							</div>
						</div>
						<div class='popup-content'>
							<p class='product-title'>$rows[Name]</p>
							<p class='product-description'>
								Hãng:<span>$rows[Brand]</span>
								<br>Chất liệu:<span>$rows[Material]</span>
								<br>Màu sắc:<span>$rows[Color]</span>
								<br>Mô tả:<span>$rows[Note]</span>
							</p>
						</div>
					</div>
					<a href='javascript:exitpopup($i)' class='dismiss'></a>
				</div>
				<div class='popup-bg' id='popup-bg$i' onclick='exitpopup($i)'></div>
					";
			$i++;
		}
		?>
		<!-- FOOTER -->
		<section class="footer">
			<p class="copyright">&copy; 2023 Copyright: DMS</p>
			<a href="#">LOG IN</a>
		</section>
		<!-- BACK TO TOP -->
		<a href="#" class="backtotop">BACK TO TOP</a>
	</div>
	<script type="text/javascript" src="../js/main.js"></script>
</body>

</html>