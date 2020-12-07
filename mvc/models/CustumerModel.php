<?php 
	class CustumerModel extends DataBase{

    public function AllCustumers(){
    	$sql = "SELECT * FROM custumers";
    	$result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    	return json_encode($result);
    }
    // public function InsertCustumerAndEvaluate($data){
    // 	$sql = "INSERT INTO custumers (`id`, `phone`, `fullname`, `email`, `created_time`) VALUES (NULL, '".$data['phone']."', '".$data['fullname']."', '".$data['email']."', '".time()."')";
    // 	$result = false;
    //   if($this->db->exec($sql)){
    //   	$custumerId = $this->db->lastInsertId();

    //     $sql = "INSERT INTO evaluates (`id`, `custumer_id`, `product_id`, `voted`, `content`, `share`, `created_time`) VALUES (NULL, '".$custumerId."', '".$data['product_id']."', '".$data['voted']."', '".$data['content']."', '".$data['share']."', '".time()."')";
    //     if($this->db->exec($sql)){
    //     	// $evaluateId = $this->db->lastInsertId();
    //     	$result = true;
    //     	return json_encode($result);
    //     }
    //     return json_encode($result);
    //   }
    // 	return json_encode($result);
    // }
    public function InsertCustumer($data){
      $data["email"] = isset($data["email"]) ? $data["email"] : "";
      $sql = "INSERT INTO custumers (`id`, `phone`, `fullname`, `email`, `created_time`) VALUES (NULL, '".$data['phone']."', '".$data['name']."', '".$data['email']."', '".time()."')";
      $result = false;
      if ($this->db->exec($sql)) {
      	$result = true;
      	return json_encode($result);
      }
      return json_encode($result);
    }

    public function CkeckCustumerPhone($phone){
    	$sql = "SELECT * FROM custumers WHERE phone = ".$phone;

    	$result = false;
    	if ($this->db->query($sql)) {
    		return json_encode($this->db->query($sql)->fetch(PDO::FETCH_ASSOC));
    	}else {
    		return json_encode($result);
    	}
    }

    public function DeleteCustumer($id){
      $sql = "DELETE FROM `custumers` WHERE `id` = ".$id;
      $result = false;
      if ($this->db->exec($sql)) {
        $result = true;
      }
      return json_encode($result);
    }
  }
?>