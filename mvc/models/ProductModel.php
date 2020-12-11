<?php 
	class ProductModel extends DataBase{

    public function AllProducts(){
    	$sql = "SELECT * FROM `products` ORDER BY id ASC";
    	$result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    	return json_encode($result);
    }

    public function SearchProduct($keyword){
      $sql = "SELECT `products`.*, `categorys`.`slug` 
              FROM `products` 
              INNER JOIN `categorys`
              ON `categorys`.`id` = `products`.`category_id` 
              WHERE `products`.`name` LIKE '%".$keyword."%'"; 
      $result = false;
      if ($this->db->query($sql)) {
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
      }
      return json_encode($result);
    }

    public function GetOneProduct($id){
      $product = array();
      $sql = "SELECT * FROM products 
              INNER JOIN product_details 
              ON `products`.`id` = `product_details`.`id`
              WHERE `products`.`id` = ".$id ; 
      $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
      if(!empty($result)){
        $product["infor"] = $result;
        $sql = "SELECT * FROM image_library WHERE product_id =".$id;
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $product["image_library"] = (!empty($result) ? $result : "");
        return json_encode($product);
      }else {
        return json_encode("false");
      }
    } 

    public function SquirrelPrices($category_id){
      $sql = "SELECT * FROM products 
              INNER JOIN `product_details` 
              ON `products`.`id` = `product_details`.`id`
              WHERE `products`.`discount` != '0' 
              AND `products`.`category_id`=".$category_id ."
              ORDER BY `products`.`id` 
              DESC LIMIT 0, 10";
      $result = false;
      if ($this->db->query($sql)) {
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
      }
      return json_encode($result);
    }

    public function GetProductInCart($id){
      $product = array();

      $sql = "SELECT `products`.`name`, `products`.`image`, `products`.`price`, `products`.`discount`, `categorys`.`slug` FROM products 
              INNER JOIN categorys
              ON `products`.`category_id` = `categorys`.`id`
              WHERE `products`.`id` = ".$id ;  

      $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
      if(!empty($result)){
        $product = $result;
        $sql = "SELECT * FROM image_library WHERE product_id =".$id;
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $product["image_library"] = (!empty($result) ? $result : "");
        return json_encode($product);
      }else {
        return json_encode("false");
      }
    }

    public function GetTrademarkProduct($id){
      $sql = "SELECT `trademarks`.`name` FROM products INNER JOIN trademarks ON `products`.`trademark_id` = `trademarks`.`id` WHERE `products`.`id` =".$id;
      $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
      return json_encode($result);
    }
    public function AllTrademarkProduct($id){
      $sql = "SELECT * FROM products WHERE `products`.`id` =".$id;
      $item = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
      $trademark_id = $item["trademark_id"];
      $category_id = $item["category_id"];
      // echo $category_id . " - ". $trademark_id;exit;
      $sql = "SELECT * FROM products WHERE `trademark_id` = ". $trademark_id. " AND `category_id` = ".$category_id . " AND `id` != " .$id;
      $result = $this->db->query($sql);
      if ($result != "") {
        return json_encode($result->fetchAll(PDO::FETCH_ASSOC));
      }else{
        return json_encode($result);
      }
    }

    public function InsertProduct($data){
      // Kiểm tra có up ảnh đại diện không
      $image = "";
      if(isset($data["image"]) && !empty($data["image"]["name"])){
        $resultUpload = $this->UploadFileImages($data["image"], "avatar");
        if(isset($resultUpload["error"])){
          return json_encode($resultUpload);
        }else {
          $image = $resultUpload;
        }
      }
      // Kiểm tra có up ảnh nổi bật nhất k
      $image_hot = "";
      if(isset($data["image_hot"]) && !empty($data["image_hot"]["name"])){
        $resultImageHot = $this->UploadFileImages($data["image_hot"], "avatar_hot");
        if(isset($resultImageHot["error"])){
          return json_encode($resultImageHot);
        }else {
          $image_hot = $resultImageHot;
        }
      }
      // Kiểm tra có thư viện ảnh k
      if(isset($data["library"]) && !empty($data["library"]["name"][0])){
        $resultUploads = $this->UploadFileImages($data["library"], "image_library");
        if(isset($resultUploads["error"]) && !empty($resultUploads["error"])){
          return json_encode($resultUploads);
        }
      }
      
      $sql = "INSERT INTO `products` (`id`, `category_id`, `trademark_id`, `name`, `image`,`image_hot`, `price`, `discount`, `hot`, `installment`, `description`, `number_view`, `active`, `created_time`, `updated_time`) VALUES (NULL, '".$data["category_id"]."', '".$data["trademark_id"]."', '".$data["name"]."', '".$image."','".$image_hot."', '".$data["price"]."', '".$data["discount"]."', '".$data["hot"]."', '".$data["installment"]."', '".$data["description"]."', '0', '".$data["active"]."', '".time()."', '0')";
      $result = false;
      if($this->db->exec($sql)){
        $sql = "INSERT INTO `product_details` (`id`, `screen`, `operating_system`, `rear_camera`, `front_camera`, `cpu`, `ram`, `internal_memory`, `memory_stick`, `sim`, `battery_capacity`, `port_connect`, `conversation`, `graphic_card`, `design`, `size`, `launch_time`, `face_diameter`, `face_material`, `frame_material`, `wire_material`, `wire_width`, `utilities`, `waterproof`, `battery_life_time`, `object_use`) VALUES (NULL, '".$data["screen"]."', '".$data["operating_system"]."', '".$data["rear_camera"]."', '".$data["front_camera"]."', '".$data["cpu"]."', '".$data["ram"]."', '".$data["internal_memory"]."', '".$data["memory_stick"]."', '".$data["sim"]."', '".$data["battery_capacity"]."', '".$data["port_connect"]."', '".$data["conversation"]."', '".$data["graphic_card"]."', '".$data["design"]."', '".$data["size"]."', '".$data["launch_time"]."', '".$data["face_diameter"]."', '".$data["face_material"]."', '".$data["frame_material"]."', '".$data["wire_material"]."', '".$data["wire_width"]."', '".$data["utilities"]."', '".$data["waterproof"]."', '".$data["battery_life_time"]."', '".$data["object_use"]."');";
        if ($this->db->exec($sql)) {
          $productId = $this->db->lastInsertId();
          if(isset($resultUploads["path"]) && !empty($resultUploads["path"])){ 
            $insertValues = "";
            foreach ($resultUploads["path"] as $path) {
              if(empty($insertValues)){
                $insertValues = "(''," .$productId. ", '".$path."', '".time()."','0') ";
              }else {
                $insertValues .= ", (''," .$productId. ", '".$path."', '".time()."','0')";
              }
            }
            $sql = "INSERT INTO image_library VALUES ".$insertValues;
            if (!$this->db->exec($sql)) {
              return json_encode($result);
            }
          }
          $result = true;
          return json_encode($result);
        }else {
          return json_encode($result);
        }
      }else {
        return json_encode($result);
      }
    }
    
    public function UpdateProduct($data){
      // Kiểm tra có cập nhật ảnh đại diện không
      $image = "";
      if(isset($data["image"]) &&!empty($data["image"]["name"])){
        $resultUpload = $this->UploadFileImages($data["image"], "avatar");
        if(isset($resultUpload["error"])){
          return json_encode($resultUpload);
        }else {
          $image = $resultUpload;
          // unlink($data["linkImage"]);
        }
      }
      // Kiểm tra có cập nhật ảnh đại nỗi bật không
      $image_hot = "";
      if(isset($data["image_hot"]) &&!empty($data["image_hot"]["name"])){
        $resultImageHot = $this->UploadFileImages($data["image_hot"], "avatar_hot");
        if(isset($resultImageHot["error"])){
          return json_encode($resultImageHot);
        }else {
          $image_hot = $resultImageHot;
          // unlink($data["linkImage"]);
        }
      }
      
      // Kiểm tra có cập nhật thêm ảnh chi tiết k
      if(isset($data["library"]) && !empty($data["library"]["name"][0])){
        $resultUploads = $this->UploadFileImages($data["library"], "image_library");
        if(isset($resultUploads["error"]) && !empty($resultUploads["error"])){
          return json_encode($resultUploads);
        }
      }
      $image = !empty($image) ? "', `image` ='".$image : "";
      $image_hot = !empty($image_hot) ? "', `image_hot` ='".$image_hot : "";

      $sql = "UPDATE products SET `category_id` ='".$data["category_id"]."', `trademark_id` ='".$data["trademark_id"]."', `name`='".$data["name"].$image.$image_hot."', `price`='".$data["price"]."', `description`='".$data["description"]."', `discount`='".$data["discount"]."', `hot`='".$data["hot"]."', `installment`='".$data["installment"]."', `active`='".$data["active"]."', `updated_time`='".time()."' WHERE `products`.`id` = ".$data["id"];
      $result = false;
      if ($this->db->exec($sql)) {
       $sql = "UPDATE product_details SET `screen`='".$data["screen"]."', `operating_system`='".$data["operating_system"]."', `rear_camera`='".$data["rear_camera"]."', `front_camera`='".$data["front_camera"]."', `cpu`='".$data["cpu"]."', `ram`='".$data["ram"]."', `internal_memory`='".$data["internal_memory"]."', `memory_stick`='".$data["memory_stick"]."', `sim`='".$data["sim"]."', `battery_capacity`='".$data["battery_capacity"]."', `port_connect`='".$data["port_connect"]."', `conversation`='".$data["conversation"]."', `graphic_card`='".$data["graphic_card"]."', `design`='".$data["design"]."', `size`='".$data["size"]."', `launch_time`='".$data["launch_time"]."', `face_diameter`='".$data["face_diameter"]."', `face_material`='".$data["face_material"]."', `frame_material`='".$data["frame_material"]."', `wire_material`='".$data["wire_material"]."', `wire_width`='".$data["wire_width"]."', `utilities`='".$data["utilities"]."', `waterproof`='".$data["waterproof"]."', `battery_life_time`='".$data["battery_life_time"]."', `object_use`='".$data["object_use"]."' WHERE `product_details`.`id`=".$data["id"];
        // echo $sql;exit;
        if ($this->db->exec($sql)) {
          $productId = $data["id"];
          if(isset($resultUploads["path"]) && !empty($resultUploads["path"])){ 
            $insertValues = "";
            foreach ($resultUploads["path"] as $path) {
              if(empty($insertValues)){
                $insertValues = "(''," .$productId. ", '".$path."', '".time()."','0') ";
              }else {
                $insertValues .= ", (''," .$productId. ", '".$path."', '".time()."','0')";
              }
            }
            $sql = "INSERT INTO image_library VALUES ".$insertValues;
            if (!$this->db->exec($sql)) {
              echo "ddax upload thanh cong anh";exit;
              return json_encode($result);
            }
            echo "k thanh cong";exit;
          }
          
          $result = true;
          return json_encode($result);
        }else {
          echo "chưa update đk product-details";exit;
          return json_encode($result);
        }
        
      }else {
        return json_encode($result);
      }
    }

    public function DeleteProduct($id){
      // Lay path cua image, icon,
      $sql = "SELECT * FROM products WHERE `id` = ".$id;
      $item = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
      // Lay path cua anh chi tiet
      $sql = "SELECT * FROM image_library WHERE `image_library`.`product_id`=".$id;
      $librarys = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      // Xoa product
      $sql = "DELETE FROM `products` WHERE `id` = ".$id;
      $result = false;
      if($this->db->exec($sql)){
        $sql = "DELETE FROM `product_details` WHERE `id` = ".$id;
        if($this->db->exec($sql)){
          $result = true;
          if(!empty($librarys)){
            $sql = "DELETE FROM `image_library` WHERE `image_library`.`product_id` = ".$id;
            if ($this->db->exec($sql)) {
              foreach ($librarys as $value) {
                unlink("./public/images/image_library".$value["path"]);
              }
            }
          }
          return json_encode($result);
        }else{
          return json_encode($result);
        }
      }else{
        return json_encode($result);
      }
    }

    public function DelProductImg($tableName, $id, $col, $path){
      if ($tableName == "image_library") {
        $sql = "DELETE FROM image_library WHERE id =".$id;
      }else{
        $sql = "UPDATE products SET `".$col."`='' WHERE id=".$id;
      }
      $result = false;
      if ($this->db->exec($sql)) {
        $result = true;
        unlink($path);
      }
      return json_encode($result);
    }

    public function ProductByCategory($id, $image_hot = false){
      if ($image_hot) {
        $sql = "SELECT * FROM products WHERE `products`.`category_id`=".$id . " AND `products`.`image_hot` != ''";
      }else {
        $sql = "SELECT * FROM products WHERE `products`.`category_id`=".$id ." ORDER BY id ASC LIMIT 0,15";
      }
      $result = false;
      if ($this->db->query($sql)) {
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
      }
      return json_encode($result);
    }

    public function IncreaseViews($id){
      $sql = "SELECT `number_view` FROM products WHERE `products`.`id`='".$id."'";
      $numberView = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
      $number = $numberView["number_view"] + 1;
      $sql = "UPDATE products SET `number_view`='".$number . "' WHERE `id`='".$id."'";
      $this->db->query($sql);
    }

    public function ViewMore($page,$category,$numberItem = 15){
      $sql = "SELECT * FROM `products` WHERE `products`.`category_id` ='".$category."' ORDER BY id ASC LIMIT ".$page * $numberItem."," .$numberItem;
      $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
      return json_encode($result);
    }
	}
 ?>