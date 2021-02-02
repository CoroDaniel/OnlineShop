<?php
session_start();

$DATABASE_HOST="localhost";
$DATABASE_USER="root";
$DATABASE_PASS="";
$DATABASE_NAME="mystore";

$conect = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if(mysqli_connect_errno()){
	exit("Nu se poate face conexiunea la baza de date".mysqli_connect_errno);
}

if(!isset($_POST["username"], $_POST["password"])){
	exit("Completati ambele campuri");
}

if($stmt = $conect->prepare("SELECT id, password, position FROM users WHERE username=?")){
	$stmt->bind_param('s', $_POST["username"]);
	$stmt->execute();
	$stmt->store_result();
	
	if($stmt->num_rows>0){
		$stmt->bind_result($id,$password,$position);
		$stmt->fetch();
		$pass=md5($_POST["password"]);
		if($pass===$password){
			$_SESSION["loggedin"]=TRUE;
			$_SESSION["name"]=$_POST["username"];
			$_SESSION["id"]=$id;
			$_SESSION["position"]=$position;
			
			header("Location: index.php");
		}
		else {
				// password incorrect, dar nu trebuie sa ii dam indiciu utilixatorului ce nu e bine pentru cazuri de spargere a contului
				echo 'Incorrect username sau password!';
		}
	}
	else {
			// username incorect
			echo 'Incorrect username sau password!';
	}
}	

?>