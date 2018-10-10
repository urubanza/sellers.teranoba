<?php
//class for product related stuffs
class orders{
	function get($userId, $num = NULL){
		//function to get products
		global $conn;

		if($num){
			$sql = "SELECT * FROM `orders` INNER JOIN `users` ON `orders`.`userId` = `users`.`userId` ORDER BY `ordersId` LIMIT 0,5";
		}else{
			$sql = "SELECT * FROM `orders` INNER JOIN `users` ON `orders`.`userId` = `users`.`userId` ORDER BY `ordersId` LIMIT 0,5";
		}

		$query = $conn->query($sql) or die("Error getting products; $conn->error");

		$orders = array();

		while ($data = $query->fetch_assoc()) {
			$orders[] = $data;
		}
		return $orders;
	}
	
	function getthis($userId,$num){
		//function to get products
		global $conn;

		if($userId){
			$sql = "SELECT * FROM `orders` INNER JOIN `users` ON `orders`.`userId` = `users`.`userId` WHERE `users`.`userId` = '$userId' ORDER BY `ordersId` LIMIT 0,5";
		}else if($num){
			$sql = "SELECT * FROM `orders` INNER JOIN `users` ON `orders`.`userId` = `users`.`userId` WHERE `orderstitle` = '$num' ORDER BY `ordersId` LIMIT 0,5";
		}
		$query = $conn->query($sql) or die("Error getting products; $conn->error");
		$orders = array();

		while ($data = $query->fetch_assoc()) {
			$orders[] = $data;
		}
		return $orders;
	}
	
	
	function cart($shop){
		global $conn;
		//function returns product categories
		$sql = "SELECT * FROM `carts` INNER JOIN 
			    `users` ON `carts`.`user_id` = `users`.`userId` INNER JOIN 
				`products` ON `carts`.`productId` = `products`.`productId` 
				ORDER BY `cartId` LIMIT 0,5";
		$query = $conn->query($sql) or die("Category error $conn->error"); 
		$cats = array();
		while ($data = $query->fetch_assoc()) {
			$cats[] = $data;
		}
		return $cats;
	}
}
?>