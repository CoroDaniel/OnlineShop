<?php 
		
	class conection
	{
		private $host = "localhost";
		private $user = "root";
		private $password = "";
		private $database = "mystore";
		private static $connecting;
		
		function __construct()
		{
			$this->connecting = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		}
		
		public static function getConnection()
		{
			if (empty($this->connecting)) {
				new Database();
			}
		}
		
		function getResults($query, $params=array()){
			$sql_statement=$this->connecting->prepare($query);
			if (!empty($params)) {
				$this->bindParams($sql_statement, $params);
			}
			$sql_statement->execute();
			$result=$sql_statement->get_result();
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$resultArray[]=$row;
				}
			}
			if(!empty($resultArray))
				return $resultArray;
		
		}
		
		function update($query, $params = array())
		{
			$sql_statement = $this->connecting->prepare($query);
			if (! empty($params)) {
				$this->bindParams($sql_statement, $params);
			}
			$sql_statement->execute();
		}
		
		function bindParams($sql_statement, $params)
		{
			$param_type = "";
			foreach ($params as $query_param) {
				$param_type .= $query_param["param_type"];
			}
			$bind_params[] = & $param_type;
			foreach ($params as $k => $query_param) {
				$bind_params[] = & $params[$k]["param_value"];
			}	
			call_user_func_array(array($sql_statement,'bind_param'), $bind_params);
		}
		
		
	}
	
	
	
	
	
	
	
	
	
	function navbar() {
		echo <<<EOT
		<nav class="navbar">
			<div class="firstnav">
				<ul class="firstNavList">
EOT;
					 	
						if(isset($_SESSION["loggedin"])) {
							if($_SESSION["loggedin"]==1) 
							{
								echo "<a href='logout.php'><li>Logout</li></a>";
							}
						}
					
						if(isset($_SESSION["loggedin"])) {
							if($_SESSION["position"]==1)
								{
									echo "<a href='add_product.php'><li>Add Product</li></a>";
								}
						}
					
					 	if(isset($_SESSION["loggedin"])) {
						if($_SESSION["position"]==1)
							{
								echo "<a href='edit_products.php'><li>Edit Products</li></a>";
							}
						}
				
						
						if(!isset($_SESSION['loggedin'])) {
							echo " 
							<a><li class='dropdown'>
								<a id='dropbtn'>ACCOUNT</a>
									<div class='dropdown-content'>
										<a href='loginForm.php'>Login</a>
										<a href='registrationForm.php'>Register</a>
									</div>
							</li></a>";
						}
			echo <<<EOT
					<a href="cart.php"><li>My cart</li></a>
				</ul>
			</div>
			<div class="secondnav">
				<ul class="secondNavList">
					<a href="index.php"><li>HOME</li></a>
					<li class="dropdown">
						<a class="dropbtn" href="category.php" style="color:white">Category</a>
							<div class="dropdown-content">
								<a href="category.php?category=usi" 
									style="text-decoration:underline;font-size:12px">Usi</a>
									<a href="category.php?category=usa_exterior" style="font-size:10px"><pre>  Exterior</pre></a>
									<a href="category.php?category=usa_interior" style="font-size:10px"><pre>  Interior</pre></a>
								<a href="category.php?category=ferestre" style="text-decoration:underline;font-size:12px">Ferestre</a>
									<a href="category.php?category=fereastra_termopan" style="font-size:10px"><pre>  Termopan</pre></a>
									<a href="category.php?category=fereastra_lemn" style="font-size:10px"><pre>  Lemn</pre></a>
							</div>
					</li>
					<a href="products.php"><li>All Products</li></a>		
				</ul>
			</div>
		</nav>
EOT;
}
	
	


	function footer(){
		echo <<<EOT
			<style>
			footer {
			  text-align: center;
			  padding: 3px;
			  background-color: #5c5c5c;
			  color: white;
						  
			}
			</style>
			<footer>
				<p>© 2020 Daniel Coroian <br>
			</footer>
EOT;
	}
	
	
/*	
	function autoLogin(){
	echo <<<EOT
		<form id="autoSub" action="loginForm.php" method="post">
					<input name="username" value=" 
EOT;
													echo $_POST['username'];
					echo <<<EOT
					                                                         "/>
					<input name="password" value=" 
EOT;
					                               echo $_POST['password']; 
					echo <<<EOT
					                                                         "/>
					<input name="Submit" type="submit" value="submit" />
				</form>
				<script type="text/javascript">
					window.onload = function () {
										document.getElementById("autoLogin").submit();
									}
				</script>
EOT;
	}
*/
	
	
?>
