<?php 
session_start();
require_once "functions.php";
?>

<html>
	<head>
		<title>Produse</title>
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/png" href="images/icon1.png">
	</head>
	
	<body>
		<?=navbar()?>
		<div class='container'>
			<?php 
				if(isset($_GET['category'])){
					
					$functionsCart = new functionsCart();
					if($_GET['category']=="usi")
						$products=$functionsCart->getProductsByCategory("usa_exterior","usa_interior");
					else if($_GET['category']=="ferestre")
						$products=$functionsCart->getProductsByCategory("fereastra_lemn","fereastra_termopan");
					else
						$products=$functionsCart->getProductsByCategory($_GET['category']); 
			?>
					
					<div id="some_products">
					
			<?php
						if(!empty($products)){
									foreach($products as $key=>$value){
			?>
							<div class="itemsCategory">
								<form method="post" action="cart.php?action=add&id=<?php echo $products[$key]["id"]; ?>">
									<div class="image">
										<a href='item.php?id=<?php echo $products[$key]['id']?>'>
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
			<?php			
				}
				else{
					echo <<<EOT
						<div id="some_products">
							<div class="items">
									<div class="image">
										<a href="category.php?category=usa_exterior">
											<img src="images/categ1.png" width="300" height="300" alt="Usi exterioare" style="margin-top:90px;"> 
										</a>
									</div>
							</div>
							<div class="items">
									<div class="image">
										<a href="category.php?category=usa_interior">
											<img src="images/categ3.png" width="320" height="310" alt="Usi interioare" style="margin-top:85px;"> 
										</a>
									</div>
							</div>
							<div class="items">
									<div class="image">
										<a href="category.php?category=fereastra_termopan">
											<img src="images/categ2.png" width="300" height="300" alt="ferestre lemn" style="margin-top:90px;"> 
										</a>
									</div>
							</div>
							<div class="items">
									<div class="image">
										<a href="category.php?category=fereastra_lemn">
											<img src="images/categ4.png" width="300" height="400" alt="Ferestre termopan" style="margin-top:55px;"> 
										</a>
									</div>
							</div>
							
						</div>
EOT;
				}
			?>
		</div>
		<?=footer()?>
	</body>
</html>