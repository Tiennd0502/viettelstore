<?php

	class UserModel extends DataBase{

		public function Login($data){
			$sql = "SELECT * FROM users WHERE `username` = '".$data['username']."'";
			$result = false;
			if($this->db->query($sql)){
				$check = $this->db->query($sql)->Fetch(PDO::FETCH_ASSOC);
				if (!empty($check)) {
					$hash = $check["password"];
					if (password_verify($data['password'], $hash)) {
					  return json_encode($check);
					} else {
					  return json_encode($result);
					}
				}else {
					return json_encode($result);
				}
			}
			return json_encode($result);			
		}
		public function InsertNewUser($data){
			$password = password_hash($data['password'], PASSWORD_DEFAULT);
			$sql = "INSERT INTO users VALUES('','".$data['userName']."','".$password."','".$data['fullName']."','".$data['avatar']."','".$data['email']."','".$data['phone']."','".$data['address']."','1','0',".time()."','')";
			$result = false;
			if($this->db -> exec($sql)){
				$result = true;
			}
			return json_encode($result);
		} 

		public function CheckUsername($name){
			$sql = "SELECT * FROM `users` WHERE `userName` = '".$name."'";
			$rows = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			echo "<pre>";
			print_r($rows);
			echo "</pre>";
			$result = false;
			if(count($rows) > 0){
				$result = true;
			}
			return json_encode($result);
		}  

	}	   		

 ?>       