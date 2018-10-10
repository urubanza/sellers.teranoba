<?php
//class for product related stuffs
class product{
	function get($shop, $num = NULL){
		//function to get products
		global $conn;

		if($num){
			$sql = "SELECT * FROM products WHERE shop = \"$shop\" ORDER BY productId DESC LIMIT $num";
		}else{
			$sql = "SELECT * FROM products WHERE shop = \"$shop\" ORDER BY productId DESC";
		}

		$query = $conn->query($sql) or die("Error getting products; $conn->error");

		$products = array();

		while ($data = $query->fetch_assoc()) {
			$products[] = $data;
		}
		return $products;
	}
	function categories($shop){
		global $conn;

		//function returns product categories
		$sql = "SELECT *, (SELECT COUNT(*) FROM products WHERE productCategory = c.id) as nproducts FROM categories as c JOIN shops as s ON c.shop = s.id WHERE c.shop = \"$shop\" ";
		$query = $conn->query($sql) or die("Category error $conn->error");

		$cats = array();
		while ($data = $query->fetch_assoc()) {
			$cats[] = $data;
		}
		return $cats;
	}
	function list_categories($shop){
		//listing categories of a shop
		global $conn;

		$query = $conn->query("SELECT * FROM categories WHERE shop = \"$shop\" ") or trigger_error($conn->error);
		$cats = array();
		while ($data = $query->fetch_assoc() ) {
			$cats[] = $data;
		}
		return $cats;
	}
}

?>