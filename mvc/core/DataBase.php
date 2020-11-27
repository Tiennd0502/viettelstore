<?php 
 
 	class DataBase{
	 	public $db ;
		protected $dsn      = "mysql:host=localhost;dbname=pro1014";
		protected $userName = "root";
		protected $password = "";

		function __construct(){
			$this->db = new PDO($this->dsn, $this->userName, $this->password);
			$this->db -> setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES utf8");
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			date_default_timezone_set('Asia/Ho_Chi_Minh');
		}
		public function UploadFileImages($uploadedFiles, $folder){
			$files       = array();
			$error       = array();
			$returnPath = array();
			// Đường dẫn lưu file
			$uploadPath = "./public/images/".$folder."/".date("d-m-Y",time())."/";
			if(!is_dir($uploadPath)){
				mkdir($uploadPath, 0777, true);
			}
			foreach ($uploadedFiles as $key => $values) {
				if (is_array($values)) {
					foreach ($values as $index => $value) {
						$files[$index][$key] = $value;
					}
				}else {
					$files[$key] = $values;
				}
			}
			//Up nhiều ảnh
			if(is_array(reset($files))){
				foreach ($files as $file) {
					$result = $this->ValidateUploadFile($file, $uploadPath);
					if(isset($result["error"])){
						$error["error"][] =  $result["error"]."(Trong mục ảnh khác)";
						break;
					}else {
						$returnPath["path"][] = $result;
					}
				}
				if (empty($error["error"]) && !empty($returnPath["path"])) {
					$chekUpload = array();
					for($i = 0; $i < count($files); $i++){
						// echo $uploadPath.$returnPath[$i]."<br>";
						if (move_uploaded_file($files[$i]["tmp_name"], $uploadPath.$returnPath["path"][$i])){
							$chek["uploaded"][] = "Ảnh ".$returnPath["path"][$i]." đã được tải lên!";
							$returnPath["path"][$i] = "/".date("d-m-Y",time())."/".$returnPath["path"][$i];
						}else {
							$chek["error"][] = "Quá trình tải ảnh lên đã xảy ra lỗi. Xin thử lại!";
						}
					}
					if (isset($chek["error"]) && !empty($chek["error"])) {
						return $chek["error"];
					}else {
						return $returnPath;
					}
				}else {
					return $error;
				}
			}else{ // Upload 1 file image
				$result = $this->ValidateUploadFile($files, $uploadPath);
				if(isset($result["error"])){
					return $result;
				}else {
					if (move_uploaded_file($files["tmp_name"], $uploadPath.$result)){
						return "/".date("d-m-Y",time())."/".$result;
					}else {
						return array("error" => "Quá trình tải ảnh lên đã xảy ra lỗi. Xin thử lại!");
					}
				}
			}
		}
		public function ValidateUploadFile($file, $uploadPath){
			$type = array("jpg", "jpeg", "png", "gif", "JPG", "JPEG", "PNG", "GIF");
			// link đầy đủ sẽ up lên
			$targetFile = $uploadPath . basename($file["name"]);
			// lấy đuôi file
			$imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
			// Kiểm file fake
			// $check = getimagesize($file["tmp_name"]);
			// if($check == false){
			// 	return array( "error" => "File tải lên không phải là file ảnh");
			// }
			// Kiểm tra  size k quá 2MB
			if ($file["size"] > 2 * 1024 * 1024) {
				return array( "error" => "File tải lên không được lớn hơn 2MB");
			}
			if(!in_array($imageFileType, $type)){
				return array( "error" => "Vui lòng chọn file có định dạng jpg, jpeg, png, gif!");
			}
			//  Kiểm tra file đã có chưa, Có rồi thì đổi tên
			$num = 1;
			$fileName = "";
			while (file_exists($targetFile)) {
				$fileName = str_replace(".".$imageFileType,"",$file["name"]);
				$fileName = $fileName ." (".$num.").".$imageFileType;
				$targetFile = $uploadPath."/".$fileName;
				$num++;
			};
			if(!empty($fileName)){
				$file["name"] = $fileName ;
			}
			return $file["name"]; 
		}

		public function DataTree($data, $parent_id = 0){

			$result = [];
		  foreach ($data as $key => $value) {
		    if($value["parent_id"] == $parent_id ) {
		      $children = $this->DataTree($data, $value['id']);
		      if ($children) {
		        $value["children"]  = $children;
		      }
		      $result[] = $value;
		      unset($data[$key]);
		    }
		  }
		  return $result;
		}
 	}
?>
