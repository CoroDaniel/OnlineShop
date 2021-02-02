<?php 
	
	session_start();
	require_once "functions.php";
?>

<html>
	<head>
		<title>Toate produsele</title>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/png" href="images/icon1.png">
	</head>
	<body>
		<?=navbar()?>
		<div class="container">
			<?php
			
				$functionsCart = new functionsCart();
				$allProducts = $functionsCart -> getAllProducts();
			?>
			
			<div class="some_prducts">
				<?php 
					if(!empty($allProducts)){
						foreach($allProducts as $key => $values){
				?>
				<div class="itemsCategory">
								<form method="post" action="cart.php?action=add&id=<?php echo $allProducts[$key]["id"]; ?>">
									<div class="image">
										<a href='item.php?id=<?php echo $allProducts[$key]['id']?>'>
											<img src="images/<?php echo $allProducts[$key]["image"]; ?>" width="200" height="200" alt="<?php echo $allProducts[$key]['name']?>">
										</a>
									</div>
									<div class="name_product">
										<strong><a href='item.php?id=<?php echo $allProducts[$key]['id']?>'><?php echo $allProducts[$key]["name"]; ?></a></strong>
									</div>
									<div class="price">
										<?php echo "RON: ".$allProducts[$key]["price"]; ?>
									</div>
									<div class="quantity_submit">
										<input type="number" name="quantity" value="1" size="1" />
										<input type="submit" value="Add to cart" />
									</div>
								</form>
				</div>
				
				
			<?php
									}   
							}	
			?>			
			</div>
		</div>
		<?=footer()?>
	</body>
</html>