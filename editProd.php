<?php
	session_start();
	require_once "functions.php";
	
	$functionsCart = new functionsCart();
	
	if(isset($_GET["id"])){
		$item = $functionsCart -> getProductById($_GET["id"]);
	}
	
	
	if(isset($_POST["id"])){
		//testam daca a fost introsdusa o categorie existenta (dintre cele 4 posibile)
		if($_POST["category"]==usa_exterior || $_POST["category"]==usa_interior || $_POST["category"]==fereastra_termopan || fereastra_lemn){
			$functionsCart->updateProduct($_POST["id"],$_POST["name"], $_POST["image"], $_POST["price"], $_POST["category"], $_POST["description"], $_POST["dimensions"]);
			header("Location: operatiune_cu_succes.php");
		}
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
				<div class="Add-page">
					<div class="formAdd">
								 <form action="editProd.php" method="post" autocomplete="no"> 
									  <div class="Add">Editare produs: <br><?php echo $item[0]["name"];?></div><br>
									  Nume:
									  <input type="text" name="name" value="<?php echo $item[0]["name"];?>" />
									  Imagine:
									  <input type="text" name="image" value="<?php echo $item[0]["image"];?>"/>
									  Pret:
									  <input type="number" name="price" value="<?php echo $item[0]["price"];?>"/>
									  Categorie:
									  <input type="text " name="category" value="<?php echo $item[0]["category"];?>"/>
									  Descriere:
									  <input type="text" name="description" value="<?php echo $item[0]["description"];?>" />
									  Dimensiuni:
									  <input type="text" name="dimensions" value="<?php echo $item[0]["dimensions"];?>"/>
									  *categoriile pot fi: usa_exterior, usa_interior, fereastra_termopan, fereastra_lemn
									  <input type="text" name="id" value="<?php echo $item[0]["id"];?>" style="visibility: hidden;">
									  <input type="submit" value="Submit Edit">
								</form>
					</div>
				</div>
		<?=footer()?>
			</body>
	</html>