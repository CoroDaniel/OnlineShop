<?php
	require_once "conection.php";
	class functionsCart extends conection{
		
		function getFourProducts(){
			$query="SELECT * FROM products WHERE id=1 || id=2 || id=3 || id=4;";
			$allProducts=$this->getResults($query);
			return $allProducts;
		}
		
		function getAllProducts(){
			$query="SELECT * FROM products;";
			$allProducts=$this->getResults($query);
			return $allProducts;
		}
		
		
		function getMemberCartItem($member_id){
			$query = "SELECT products.*, cart.id as cart_id, cart.quantity FROM products, cart WHERE 
					products.id = cart.product_id AND cart.user_id = ?";
			$params=array(
						array(
							"param_type" => "i",
							"param_value" => $member_id
						)
					);
			$cartResult = $this->getResults($query, $params);
			return $cartResult;
		}


		function getProductById($product_id)
		{
			$query = "SELECT * FROM products WHERE id=?";
			$params=array(
						array(
							"param_type" => "s",
							"param_value" => $product_id
						)
					);
			$productResult = $this->getResults($query, $params);
			return $productResult;
		}

		function getCartItemByProduct($product_id, $member_id)
		{
			$query = "SELECT * FROM cart WHERE product_id = ? AND user_id = ?";
			$params=array(
						array(
							"param_type" => "i",
							"param_value" => $product_id
						),
						array(
							"param_type" => "i",
							"param_value" => $member_id
						)
					);
			$cartResult = $this->getResults($query, $params);
			return $cartResult;
		}
	
		function addToCart($product_id, $quantity, $member_id)
		{
			$query = "INSERT INTO cart (product_id,quantity,user_id) VALUES (?, ?, ?)";
			$params=array(
						array(
							"param_type" => "i",
							"param_value" => $product_id
						),
						array(
							"param_type" => "i",
							"param_value" => $quantity
						),
						array(
							"param_type" => "i",
							"param_value" => $member_id
						)
					);
			$this->update($query, $params);
		}
		
		function updateCartQuantity($quantity, $cart_id)
		{
			$query = "UPDATE cart SET quantity = ? WHERE id= ?";
			$params=array(
						array(
							"param_type" => "i",
							"param_value" => $quantity
						),
						array(
							"param_type" => "i",
							"param_value" => $cart_id
						)
					);
					
			$this->update($query, $params);
		}

		function deleteCartItem($cart_id)
		{
			$query = "DELETE FROM cart WHERE id = ?";
			$params=array(
						array(
							"param_type" => "i",
							"param_value" => $cart_id
						)
					);
			$this->update($query, $params);
		}

		function emptyCart($member_id)
		{
			$query = "DELETE FROM cart WHERE member_id = ?";
			$params=array(
						array(
							"param_type" => "i",
							"param_value" => $member_id
						)
					);	
			$this->update($query, $params);
		}
		
		
		
		function getProductsByCategory($category,$category2=""){
			
			if(!empty($category2)){
				$query = "SELECT * FROM products WHERE category = ? || category = ?";
				$params=array(
							array(
								"param_type" => "s",
								"param_value" => $category
							),
							array(
								"param_type" => "s",
								"param_value" => $category2
							)
						);
				$products=$this->getResults($query, $params);
				return $products;
			}
			else{
				$query = "SELECT * FROM products WHERE category = ?";
				$params=array(
							array(
								"param_type" => "s",
								"param_value" => $category
							)
						);
				$products=$this->getResults($query, $params);
				return $products;
			}
		}
		
		function addProduct($name, $image, $price, $category, $description, $dimensions)
		{
			$query = "INSERT INTO products (name,image,price,category,description,dimensions) VALUES (?, ?, ?, ?, ?, ?)";
			$params=array(
						array(
							"param_type" => "s",
							"param_value" => $name
						),
						array(
							"param_type" => "s",
							"param_value" => $image
						),
						array(
							"param_type" => "i",
							"param_value" => $price
						),
						array(
							"param_type" => "s",
							"param_value" => $category
						),
						array(
							"param_type" => "s",
							"param_value" => $description
						),
						array(
							"param_type" => "s",
							"param_value" => $dimensions
						)
					);
			$this->update($query, $params);
		}
		
		function updateProduct($id, $name, $image, $price, $category, $description, $dimensions)
		{
			$query = "UPDATE products SET name=?,image=?,price=?,category=?,description=?,dimensions=? WHERE id=?";
			$params=array(
						array(
							"param_type" => "s",
							"param_value" => $name
						),
						array(
							"param_type" => "s",
							"param_value" => $image
						),
						array(
							"param_type" => "i",
							"param_value" => $price
						),
						array(
							"param_type" => "s",
							"param_value" => $category
						),
						array(
							"param_type" => "s",
							"param_value" => $description
						),
						array(
							"param_type" => "s",
							"param_value" => $dimensions
						),
						array(
							"param_type" => "i",
							"param_value" => $id
						)
					);
					
			$this->update($query, $params);
		}
		
		function deleteProduct($id){
			$query="DELETE FROM products WHERE id=?";
			$params=array(
						array(
							"param_type" => "i",
							"param_value" => $id
						)
					);
			$this->update($query,$params);
		}
		
		function getAllUsers(){
			$query="SELECT * FROM users";
			$allUsers=$this->getResults($query);
			return $allUsers;
		}
		
	}
	
?>