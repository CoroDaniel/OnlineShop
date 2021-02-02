<?php
	session_start();
	require_once "functions.php";
	
	$functionsCart = new functionsCart();
	if(isset($_GET["id"])){
		$item = $functionsCart -> getProductById($_GET["id"]);
	}
?>

<html>
	<head>
		<link rel="stylesheet" href="style2.css">
		<link rel="stylesheet" href="style.css">
		<link rel="icon" type="image/png" href="images/icon1.png">
	</head>
	<body>	
	<?=navbar()?>
		<div class="container">
			<div class="item">
				<div class="left">
					<img src="images/<?php echo $item[0]["image"]?>" width="350" height="400" alt="<?php echo $item[0]['name']?>">
					<div class="quantity_sub">
						<form method="post" action="cart.php?action=add&id=<?php echo $item[0]["id"]; ?>">
							<input type="number" name="quantity" value="1" size="1" />
							<input type="submit" value="Add to cart" />
						</form>
					</div>
				</div>
				
				<div class="right">
					<div class="name_item">
						<strong><?php echo $item[0]["name"]; ?></strong>
					</div>
					<div class="descriere">
						<?php echo $item[0]["description"];?>
					</div>
					<div class="dimensiuni">
						Dimensiune: <?php echo $item[0]["dimensions"];?>
					</div>
				</div>
			</div>
		</div>
	<?=footer()?>
	</body>
</html>