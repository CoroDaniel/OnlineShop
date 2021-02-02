<?php 
	session_start();

	require_once "functions.php";
	
?>

<html>
	<head>
		<title>Our shop of doors and windows</title>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/png" href="images/icon1.png">
	</head>
	<body>
		<?=navbar()?> 
		
		<div class="container">
			<div class="title_page">
				Usi si ferestre
			</div>
			
			<div class="description">
				Alegeti cu incredere usi si ferestre de divese modele si culori la o calitate superioara!
			</div>
			
			<div id="some_products">
				
				<?php
					$functionsCart= new functionsCart();
					$products=$functionsCart->getFourProducts();
					if(!empty($products)){
						foreach($products as $key=>$value){
				?>
				<div class="items">
					<form method="post" action="cart.php?action=add&id=<?php echo $products[$key]["id"]; ?>">
						<div class="image">
							<a href="item.php?id=<?php echo $products[$key]['id']?>">
								<img src="images/<?php echo $products[$key]["image"]; ?>" width="200" height="200" alt="<?php echo $products[$key]['name']?>">
							</a>
						</div>
						
						<div class="name_product">
							<strong><a href='item.php?id=<?php echo $products[$key]['id']?>'><?php echo $products[$key]["name"]; ?></a></strong>
						</div>
						
						<div class="price">
							<?php echo "RON: ".$products[$key]["price"]; ?>
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