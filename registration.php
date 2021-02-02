<?php
	// Schimbați acest lucru cu informațiile despre conexiune.
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = "";
	$DATABASE_NAME = 'mystore';
	$conect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
	
	if(mysqli_connect_errno()){
		exit("Nu se poate face conexiunea la baza de date".mysqli_connect_errno);
	}
	
	if(!isset($_POST["username"], $_POST["email"], $_POST["password"])){
		exit("Nu s-au obtinut taote datele necesare");
	}
	
	if(empty($_POST["username"] || $_POST["mail"] || $_POST["password"])){
		exit("Completati toate campurile obligatorii");
	}
	
	if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
		exit("Campul completat la email nu este valid");
	}

	if (strlen($_POST['password']) > 50 || strlen($_POST['password']) < 5) {
		exit('Password trebuie sa fie intre 5 si 50 caractere!');
	}
	
	if (strlen($_POST['username']) > 40 || strlen($_POST['username']) < 3) {
		exit('Username trebuie sa fie intre 4 si 40 de caractere!');
	}
	
	//Verificam daca continutul de la campul parola este acelasi cu cel de la confirmare parola (modalitate de a nu crea un cont cu o parola tastata gresit
	if (!($_POST["password"] === $_POST["confirm_password"])) {
		exit('Password trebuie sa coincida cu password');
	}

	include "conection.php";
	
	if($stmt = $conect->prepare("SELECT id FROM users WHERE username=?")){
		$stmt->bind_param('s', $_POST["username"]);
		$stmt->execute();
		$stmt->store_result();
		if($stmt->num_rows>0){
				echo "Username indisponibil, algeti altul";
		}
		else{
			if($stmt = $conect->prepare("INSERT INTO users (username, email, password, position) VALUES (?, ?, ?, ?)")){
				$password = md5($_POST['password']);
				$position=0;
				$stmt->bind_param('sssi', $_POST["username"], $_POST["email"], $password, $position);
				$stmt->execute();
				
				//se apela functia urmatoare pt a trimite datele cu un form cu datele inregistrate spre login.php care ar fi facut logarea automata dupa inregistrare (momentan e o problema)
				//autoLogin();  
				
				header('Location: loginForm.php');
				
			}
		}
	}
	else{
		echo "Nu se poate face prepararea instructiunuilor"; 
	}
	$conect->close();
?>