<?php 
	class CategoryModel extends DataBase{

    public function AllCategorys(){
    	$sql = "SELECT * FROM categorys";
    	$result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    	// return $result;
    	return json_encode($result);
    }
    public function GetOneCategory($id){
      $sql = "SELECT * FROM categorys WHERE `id` = ".$id ;
      $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
      return json_encode($result);
    } 
    public function InsertCategory($data){
    	$sql = "INSERT INTO `categorys` (`id`, `name`, `slug`,`icon`, `created_time`, `updated_time`) VALUES (NULL, '".$data['name']."', '".$data['slug']."', '".$data['icon']."', '".time()."', '0')";
    	$result = false;
      if($this->db->exec($sql)){
        $result = true;
      }
    	return json_encode($result);
    }
    
    public function UpdateCategory($data){

    	$data['icon'] = htmlentities($data['icon']);
      $sql = 'UPDATE `categorys` SET `name` = "'.$data['name'].'", `slug` = "'.$data['slug'].'", `icon` = "'.$data['icon'].'", `updated_time` = "'.time().'" WHERE `categorys`.`id` = '.$data['id'];
      $result = false;
      if($this->db->exec($sql)){
        $result = true;
      }
    	return json_encode($result);
    }

    public function DeleteCategory($id){
      $sql = "DELETE FROM `categorys` WHERE `categorys`.`id` = ".$id;
      $result = false;
      if($this->db->exec($sql)){
        $result = true;
      }
      return json_encode($result);
    }
	}
 ?>