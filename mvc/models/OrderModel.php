<?php 
	class OrderModel extends DataBase{

		public function AllOrders(){
			$sql = "SELECT * FROM orders";
			$result = false;
			if ($this->db->query($sql)) {
				$result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				return json_encode($result);
			}
				return json_encode($result);
		}

		public function OrderDetail($id){
			$sql = "SELECT `orders`.`name`, `orders`.`phone`, `orders`.`address`, `orders`.`note`, `orders`.`created_time`, `order_detail`.*, `products`.`name` as product_name, `products`.`image` as product_image FROM orders INNER JOIN order_detail ON `order_detail`.`order_id` = `orders`.`id` INNER JOIN `products` ON `products`.`id`= `order_detail`.`product_id` WHERE `orders`.`id` = ".$id;
			$result = false;
			if ($this->db->query($sql)) {
				$result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
				return json_encode($result);
			}
			return json_encode($result);
		}

	  public function AddOrder($data){
	  	$sql= "INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`,`active`, `created_time`, `updated_time`) VALUES (NULL, '".$data["name"]."', '".$data["phone"]."', '".$data["address"]."', '".$data["note"]."', '0', '".time()."', '0')";
	  	$this->db->exec($sql);
	  	$order_id = $this->db->lastInsertId();
	  	$insertValues = "";
	  	foreach ($_SESSION["cart"] as $key => $value) {
	  		if(empty($insertValues)){
          $insertValues = "( NULL, " .$order_id. ", '".$key."', '".$value["quantity"]."','".$value["price"]."','".$value["discount"]."') ";
        }else {
          $insertValues .= ", ( NULL, " .$order_id. ", '".$key."', '".$value["quantity"]."','".$value["price"]."','".$value["discount"]."') ";
        }
	  	}
	  	$sql = "INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `discount`) VALUES ".$insertValues;
	  	$result = false;
	  	if($this->db->exec($sql)){
	  		$result = true;
	  	}
	  	return json_encode($result);
	  }

	  public function DeleteOrder($id){
	  	$sql = "DELETE FROM orders WHERE `id` = ".$id;
	  	$result =false;
	  	if ($this->db->exec($sql)) {
	  		$result =true;
	  		return json_encode($result);
	  	}
	  	return json_encode($result);
	  }
	}
	
 ?>