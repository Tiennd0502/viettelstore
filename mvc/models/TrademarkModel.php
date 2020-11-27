<?php 
	class TrademarkModel extends DataBase{

    public function AllTrademarks(){
    	$sql = "SELECT * FROM trademarks";
    	$result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    	// return $result;
    	return json_encode($result);
    }
    public function GetOneTrademark($id){
      $sql = "SELECT * FROM trademarks WHERE `id` = ".$id ;
      $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
      return json_encode($result);
    } 

    public function TrademarkByCategory($id){
      $sql = "SELECT * FROM `trademarks` WHERE `category_id` = ".$id ;
      $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      return json_encode($result);
    }

    public function InsertTrademark($data){
      // Kiểm tra có up ảnh đại diện không
      $image = "";
      if(!empty($data["image"]["name"]) && !empty($data["image"]["name"])){
        $resultUpload = $this->UploadFileImages($data["image"],"trademark");
        if(isset($resultUpload["error"])){
          return json_encode($resultUpload);
        }else {
          $image = $resultUpload;
        }
      }
      
    	$sql = "INSERT INTO `trademarks` (`id`, `category_id`, `name`,`path`, `created_time`, `updated_time`) VALUES (NULL, '".$data['category_id']."', '".$data['name']."', '".$image."', '".time()."', '0')";
    	$result = false;
      if($this->db->exec($sql)){
        $result = true;
      }
    	return json_encode($result);
    }
    
    public function UpdateTrademark($data){
      // Kiểm tra có cập nhật ảnh không
      $image = "";
      if(isset($data["image"]) && !empty($data["image"]["name"])){
        $resultUpload = $this->UploadFileImages($data["image"], "trademark");
        if(isset($resultUpload["error"])){
          return json_encode($resultUpload);
        }else {
          $image = $resultUpload;
          // unlink($data["linkImage"]);
        }
      }

      $sql = 'UPDATE `trademarks` SET `name` = "'.$data['name'].'", `category_id` = "'.$data['category_id'].'", `path` = "'.$image.'", `updated_time` = "'.time().'" WHERE `Trademarks`.`id` = '.$data['id'];
      $result = false;
      if($this->db->exec($sql)){
        $result = true;
      }
    	return json_encode($result);
    }

    public function DeleteTrademark($id){
      $sql = "DELETE FROM `Trademarks` WHERE `Trademarks`.`id` = ".$id;
      $result = false;
      if($this->db->exec($sql)){
        $result = true;
      }
      return json_encode($result);
    }
	}
 ?>