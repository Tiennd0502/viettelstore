<?php 
	class EvaluateModel extends DataBase{

    public function AllEvaluates(){
      $result = array();
      $sql = "SELECT DISTINCT product_id FROM evaluates";
      $listProductIds = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      foreach ($listProductIds as $key=> $id) {
        $sql = "SELECT `products`.`name` FROM `products` WHERE `id`=".$id["product_id"];
        $name = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
        $sql = "SELECT * FROM evaluates WHERE `product_id`=".$id["product_id"];
        $evaluates = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $temp = array();
        $temp["sum"] = count($evaluates);
        $temp["count"]["Star1"]   = 0;
        $temp["count"]["Star2"]   = 0;
        $temp["count"]["Star3"]   = 0;
        $temp["count"]["Star4"]   = 0;
        $temp["count"]["Star5"]   = 0;
        $oldRating = $evaluates["0"]["created_time"];
        $newRating = $evaluates["0"]["created_time"];
        foreach ($evaluates as $item) {
          $temp["count"]["Star".$item["voted"]]++;
          if ($oldRating > $item["created_time"]) {
            $oldRating = $item["created_time"];
          }
          if ($newRating < $item["created_time"]) {
            $newRating = $item["created_time"];
          }
        }
        $temp["avg"] = ($temp["count"]["Star1"] + $temp["count"]["Star2"] *2 + $temp["count"]["Star3"] *3 + $temp["count"]["Star4"]*4 + $temp["count"]["Star5"]*5)/$temp["sum"];
        if ($temp["avg"] != 0) {
          $temp["avg"] = round($temp["avg"], 1, PHP_ROUND_HALF_EVEN);
        }
        $result[$key]["id"] = $id["product_id"];
        $result[$key]["name"] = $name["name"];
        $result[$key]["avg"] = $temp["avg"];
        $result[$key]["count"]  = $temp["sum"];
        $result[$key]["old_rating"]  = $oldRating;
        $result[$key]["new_rating"]  = $newRating;
      }
    	return json_encode($result);
    }
    public function InsertEvaluate($custumerId, $data){
    	$sql = "INSERT INTO evaluates (`id`, `custumer_id`, `product_id`, `voted`, `content`, `share`, `created_time`) VALUES (NULL, '".$custumerId."', '".$data['product_id']."', '".$data['voted']."', '".$data['content']."', '".$data['share']."', '".time()."')";
    	$result = false;
      if($this->db->exec($sql)){
      	$result = true;
      	return json_encode($result);
      }
      return json_encode($result);
    }
    public function GetProductEvaluate($id, $str){
      if ($str == "content") {
        $sql = "SELECT `evaluates`.`id`, `evaluates`.`voted`, `evaluates`.`content`, `evaluates`.`created_time`, `evaluates`.`share`, `custumers`.`fullname` FROM `evaluates` INNER JOIN `custumers` ON `evaluates`.`custumer_id` = `custumers`.`id` WHERE `product_id`=".$id;
        $listEvlCustumer = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($listEvlCustumer);
      }
    	$result = array();
    	$sql = "SELECT * FROM evaluates WHERE `product_id`=".$id;
      $evaluates = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      if(empty($evaluates)){
        return json_encode($result);
      }else {
        $result["sum"] = count($evaluates);
        $result["count"]["Star1"]   = 0;
        $result["count"]["Star2"]   = 0;
        $result["count"]["Star3"]   = 0;
        $result["count"]["Star4"]   = 0;
        $result["count"]["Star5"]   = 0;
        foreach ($evaluates as $item) {
          $result["count"]["Star".$item["voted"]]++;
        }
        $result["percent"]["Star1"]   = 0;
        $result["percent"]["Star2"]   = 0;
        $result["percent"]["Star3"]   = 0;
        $result["percent"]["Star4"]   = 0;
        $result["percent"]["Star5"]   = 0;
        for ($i = 1; $i < 6; $i++) {
          if($result["count"]["Star".$i] != 0){
            $result["percent"]["Star".$i] = round($result["count"]["Star".$i] / $result["sum"] *100,2,PHP_ROUND_HALF_EVEN);
          }
        }
        $result["avg"] = ($result["count"]["Star1"] + $result["count"]["Star2"] *2 + $result["count"]["Star3"] *3 + $result["count"]["Star4"]*4 + $result["count"]["Star5"]*5)/$result["sum"];
        if ($result["avg"] != 0) {
          $result["avg"] = round($result["avg"], 1, PHP_ROUND_HALF_EVEN);
        }
        return json_encode($result);
      }	
    }

    public function DelEvaluatePrd($product_id){
      $sql ="DELETE FROM evaluates WHERE `product_id` =".$product_id;
      $result = false;
      if ($this->db->exec($sql)) {
        $result = true;
      }
      return json_encode($result);
    }
    public function DelEvaluate($id){
      $sql ="DELETE FROM evaluates WHERE `id` =".$id;
      $result = false;
      if ($this->db->exec($sql)) {
        $result = true;
      }
      return json_encode($result);
    }
  }
?>