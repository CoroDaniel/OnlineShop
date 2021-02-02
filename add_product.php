<?php 
	session_start();
	require_once "functions.php";
	
	
	if(isset($_POST["name"])){	
		//daca este administrator
		if($_SESSION["position"]==1){
			//testam daca a fost introsdusa o categorie existenta (dintre cele 4 posibile)
			if($_POST["category"]==usa_exterior || $_POST["category"]==usa_interior || $_POST["category"]==fereastra_termopan || fereastra_lemn){
				$functionsCart= new functionsCart();
				$functionsCart->addProduct($_POST["name"], $_POST["image"], $_POST["price"], $_POST["category"], $_POST["description"], $_POST["dimensions"]);
				header("Location: operatiune_cu_succes.php");
			}
		}
	}
	

	if(isset($_SESSION["position"]) && $_SESSION["position"]==1){
		echo <<<EOT
		<html>
			<head>
				<link rel="stylesheet" href="style2.css">
				<link rel="stylesheet" href="style.css">
				<link rel="icon" type="image/png" href="images/icon1.png">
			</head>
			
			<body>
EOT;
		navbar();
		echo <<<EOT
				<div class="Add-page">
					<div class="formAdd">
								 <form action="add_product.php" method="post" autocomplete="no"> 
									  <div class="Add">Add Product</div><br>
									  <input type="text" name="name" placeholder="Nume produs" required/>
									  <input type="text" name="image" placeholder="nume_imagine.jpg (ex usa.jpg)" required/>
									  <input type="number" name="price" placeholder="Pret" required/>
									  <input type="text " name="category" placeholder="Categorie" required/>
									  <input type="text" name="description" placeholder="Descriere" required/>
									  <input type="text" name="dimensions" placeholder="Dimensiune" required/>
									  *categoriile pot fi: usa_exterior, usa_interior, fereastra_termopan, fereastra_lemn <br><br>
									  <input type="submit" value="Add">
								</form>
					</div>
				</div>
EOT;
		footer();
		echo <<<EOT
			</body>
		</html>
EOT;
	}
	else{
		navbar();
		echo "<link rel='stylesheet' href='style.css'><h1>Nu aveti drepturi de adaugare!</h1>";
		footer();
	}

?>
