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
		<title>Useri produse</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
		<link rel="icon" type="image/png" href="images/icon1.png">
	</head>
	<body>
	
		<?=navbar()?>
		<div class="container">
				<div class="welcome_cart">
					<div class="">Useri</div> 
				</div>
			
				
				<?php
					$cartItem = $functionsCart->getAllUsers();
					if (! empty($cartItem)) {
						$item_total = 0;
						$products_img=$functionsCart->getAllUsers();
				?>	 
				<div class="mycart">
					<table cellpadding="12" cellspacing="10">
						<tr id="cap_tabel">
							<th style="text-align: left;"><strong>Useri</strong></th>
							<th style="text-align: left;"><strong>Email</strong></th>
						</tr>
						<?php
							foreach ($cartItem as $item) {
						?>
						<tr>
							<td style="cursor:pointer;  border-top: 3px solid brown;">
								<a href='item.php?id=<?php echo $item['id']?>'>
									<strong><?php echo $item["username"]; ?></strong>
								</a>
							</td>
							<td style="border-top: 3px solid brown;">
								<?php echo $item["email"]; ?>
							</td style="border-top: 3px solid brown;">
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