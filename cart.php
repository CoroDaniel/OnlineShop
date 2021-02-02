<?php
	session_start();
	require_once "functions.php";
	
	if (!isset($_SESSION['loggedin'])) {
		header('Location: loginForm.php');
	}
	
	$user_id=$_SESSION['id'];
	$functionsCart = new functionsCart();
	if (! empty($_GET["action"])) {
		if ($_GET["action"]=="add") {
				if (! empty($_POST["quantity"])) {
					$productResult = $functionsCart->getProductById($_GET["id"]);
					$cartResult = $functionsCart->getCartItemByProduct($productResult[0]["id"], $user_id);
					if (! empty($cartResult)) {
						// Modificare cantitate in cos
						$newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
						$functionsCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
					}
					else {
						// Adaugare in tabelul cos
						$functionsCart->addToCart($productResult[0]["id"], $_POST["quantity"], $user_id);
					}
				}
		}
		else if($_GET["action"]=="remove"){
				// Sterg o sg inregistrare
				$functionsCart->deleteCartItem($_GET["id"]);
		}
		else{
				// Sterg cosul
				$functionsCart->emptyCart($member_id);
		}
	}
?>

<html>
	<head>
		<title>My Cart</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
		<link rel="icon" type="image/png" href="images/icon1.png">
	</head>
	<body>
	
		<?=navbar() ?>
		<div class="container">
				<div class="welcome_cart">
					<div class="">Bună <?php echo strtoupper($_SESSION['name'])?>!<br>Acesta este cosul dumneavoastră de cumparaturi:</div> 
				</div>
				
				<div class="clear_cart">
					<a href="cos.php?action=empty">
						Sterge toate articolele din cos
					</a> 	
				</div>
				
				<div class="add_prod">
					<a href="products.php">
						Adauga alte produse
					</a>
				</div><br><br><br>
				
				<?php
					$cartItem = $functionsCart->getMemberCartItem($user_id);
					if (! empty($cartItem)) {
						$item_total = 0;
						$products_img=$functionsCart->getAllProducts();
				?>	 
				<div class="mycart">
					<table cellpadding="12" cellspacing="10">
						<tr id="cap_tabel">
							<th style="text-align: left;"><strong>Produs</strong></th>
							<th style="text-align: left;"><strong>Cod produs</strong></th>
							<th style="text-align: right;"><strong>Cantitate</strong></th>
							<th style="text-align: right;"><strong>Pret</strong></th>
						</tr>
						<?php
							foreach ($cartItem as $item) {
						?>
						<tr>
							<td style="cursor:pointer">
								<a href='item.php?id=<?php echo $item['id']?>'>
									<strong><?php echo $item["name"]; ?></strong>
								</a>
							</td>
							<td>
								<?php echo $item["id"]; ?>
							</td>
							<td>
								<?php echo $item["quantity"]; ?>
							</td>
							<td align=right>
								<?php echo $item["price"]." RON"; ?>
							</td>
							<td>
								<a id="sterg_produs" href="cart.php?action=remove&id=<?php echo $item['cart_id']; ?>" class="btnRemoveAction">
									Sterge
								</a>
							</td>
						</tr>
						<?php
							$item_total += ($item["price"] * $item["quantity"]);
							}
						?>
						<tr>
							<td colspan="3" align=right><strong>Total:</strong></td>
							<td align=right><?php echo $item_total." RON"; ?></td>
							<td></td>
						</tr>
						<div class="add_prod">
							<a href="delivery.php" style="background:green;">
								Trimite comanda
							</a>
						</div>
					</table>
				<?php
					}
				?>
				</div>
		</div>
		<?=footer() ?>		
	</body>
</html>