<?php
	session_start();
	require_once "functions.php";
	
	if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']==0) {
		header('Location: loginForm.php');
	}
	
	$functionsCart = new functionsCart();
	
	if(isset($_GET["delete"])){
		$functionsCart->deleteProduct($_GET["delete"]);
	}

?>

<html>
	<head>
		<title>Editare produse</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
		<link rel="icon" type="image/png" href="images/icon1.png">
	</head>
	<body>
	
		<?=navbar()?>
		<div class="container">
				<div class="welcome_cart">
					<div class="">Puteti edita urmatoarele urmatoarele produse:</div> 
				</div>
			
				
				<?php
					$cartItem = $functionsCart->getAllProducts();
					if (! empty($cartItem)) {
						$item_total = 0;
						$products_img=$functionsCart->getAllProducts();
				?>	 
				<div class="mycart">
					<table cellpadding="12" cellspacing="10">
						<tr id="cap_tabel">
							<th style="text-align: left;"><strong>Produs</strong></th>
							<th style="text-align: left;"><strong>Descriere</strong></th>
							<th style="text-align: left;"><strong>Dimensiuni</strong></th>
							<th style="text-align: right;"><strong>Pret</strong></th>
						</tr>
						<?php
							foreach ($cartItem as $item) {
						?>
						<tr>
							<td style="cursor:pointer;  border-top: 3px solid brown;">
								<a href='item.php?id=<?php echo $item['id']?>'>
									<strong><?php echo $item["name"]; ?></strong>
								</a>
							</td>
							<td style="border-top: 3px solid brown;">
								<?php echo $item["description"]; ?>
							</td>
							<td style="border-top: 3px solid brown;">
								<?php echo $item["dimensions"]; ?>
							</td style="border-top: 3px solid brown;">
							<td align=right style="border-top: 3px solid brown;">
								<?php echo $item["price"]." RON"; ?>
							</td style="border-top: 3px solid brown;">
							<td style="border-top: 3px solid brown;">
								<a id="sterg_produs" href="editProd.php?id=<?php echo $item["id"];?>" class="btnEditAction">
									Editeaza
								</a>
							</td>
							<td style="border-top: 3px solid brown;">
								<a id="sterg_produs" href="edit_products.php?delete=<?php echo $item["id"];?>" class="btnRemoveAction">
									Stergere
								</a>
							</td>
						</tr>
						<?php
						
							}
						?>
					</table>
				<?php
					}
				?>
				</div>
		</div>
		<?=footer() ?>		
	</body>
</html>