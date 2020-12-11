<?php  
	class Ajax extends Controller{

		public $TrademarkModel;
		public $ProductModel;
		public $CustumerModel;
		public $EvaluateModel;

		public function __construct(){
			$this->TrademarkModel = $this->model("TrademarkModel");
			$this->ProductModel = $this->model("ProductModel");
			$this->CustumerModel = $this->model("CustumerModel");
			$this->EvaluateModel = $this->model("EvaluateModel");
		}
		public function ViewTrademark(){
			$id = $_POST["id"];
			$result = $this->TrademarkModel->TrademarkByCategory($id);
			print_r($result);
		}
		public function DelProductImg(){
			$tableName = $_POST["tableName"];
			$id        = $_POST["id"];
			$col       = $_POST["col"];
			$path      = $_POST["path"];
			$result = $this->ProductModel->DelProductImg($tableName, $id, $col, $path);
			// print_r($result);
		}
		public function UploadSingleFile($file){
			// Loại file 
			$type = array("jpg", "jpeg", "png", "gif");
			// Nơi lưu file
			$uploadPath = "./public/images/".date("d-m-Y",time());
			if(!is_dir($uploadPath)){
				mkdir($uploadPath, 0777, true);
			}
			// Kích thước file tối đa
			$max = 5 ;
			$error = array();
			// lấy đường dẫn
			$targetFile = $uploadPath."/".basename($file["name"]);
			// lấy đuôi file
			$imageFileType = pathinfo($targetFile,PATHINFO_EXTENSION);
			// Kiểm tra file fake
			//  kích thước và các thông số liên quan của ảnh hiện tại getimagesize()
			$check = getimagesize($file["tmp_name"]);
			if($check == false){
				$error[] = "File tải lên không phải là file ảnh";
			}
			//  Kiểm tra file đã có chưa, Có rồi thì đổi tên
			$num = 1;
			// echo $targetFile."<hr />";
			$fileName = "";
			while (file_exists($targetFile)) {
				// echo "đã trùng"; exit;
				$fileName = str_replace(".".$imageFileType,"",$file["name"]);
				$fileName = $fileName ." (".$num.").".$imageFileType;
				$targetFile = $uploadPath."/".$fileName;
				$num++;
			};
			if(!empty($fileName)){
				$file["name"] = $fileName ;
			} 
			// echo "tới đây";exit;
			// Kiểm tra Kích thước file upload hợp lệ không
			if ($file["size"] > $max*1024*1024) {
				$error[] = "Xin lỗi! Kích thước file không vượt quá .".$max." MB";
			}
			if(!in_array($imageFileType, $type)){
				$error[] = "Xin lỗi, chỉ cho phép các tệp JPG, JPEG, PNG & GIF.";
			}
		}

		public function PostEvaluate(){
			$data 			= array();
			$data["product_id"] = $_POST["product_id"];
			$data["voted"]      = $_POST["voted"];
			$data["content"]    = $_POST["content_evaluated"];
			$data["fullname"]   = trim($_POST["name"]);
			$data["phone"]      = $_POST["phone"];
			$data["email"]      = $_POST["email"];
			if(isset($_POST["share"])){
				$data["share"]			= "1";
			}else{
				$data["share"]			= "0";
			}
			
			$check = $this->CustumerModel->CkeckCustumerPhone($data["phone"]);
			if($check != "false"){
				$custumer = json_decode($check);
				$custumerId = $custumer->id;
				$result = $this->EvaluateModel->InsertEvaluate($custumerId, $data);
			}
			echo "Đánh giá của bạn sẽ được hệ thống kiểm duyệt. Xin cám ơn!.";
		}
		public function PostComment(){
			if (!isset($_SESSION["custumer"])) {
				echo 'create_session';
			}else{
				$data = array();
				$data["content"]    = $_POST["content"];
				$data["product_id"] = $_POST["product_id"];
				$data["parent_id"]  = isset($_POST["parent_id"]) ? $_POST["parent_id"] : 0 ;
				$data["custumer_comment_id"] = $_POST["custumer_comment_id"];
				$comment = $this->CommentModel->InsertComment($data);
				echo $comment ;
			}
			
		}
		public function CreateCustumerCmt(){
			$data = array();
			$data["content"]    = $_POST["content"];
			$data["name"]       = trim($_POST["name"]);
			$data["email"]      = $_POST["email"];
			$data["phone"]      = $_POST["phone"];
			$data["product_id"] = $_POST["product_id"];
			$data["parent_id"]  = isset($_POST["parent_id"]) ? $_POST["parent_id"] : 0 ;
			$comment = $this->CommentModel->InsertCustumerAndCmt($data);
			if(is_numeric($comment)){
				$_SESSION["custumer"]          = array();
				$_SESSION["custumer"]["id"]  	 = $comment;
				$_SESSION["custumer"]["name"]  = $data["name"];
				$_SESSION["custumer"]["email"] = $data["email"];
				$_SESSION["custumer"]["phone"] = $data["phone"];
				$comment = "true";
			}
			echo $comment;
		}

		public function Search($keyword){
			$data = $this->ProductModel->SearchProduct($keyword);
			echo $data;
		}
		public function Pagination(){
			$page     = $_POST["page"];
			$category = $_POST["category"];
			$data     = $this->ProductModel->ViewMore($page,$category);
			$this->view("pagination",[
									"Data" => $data,
			]);
		}
	}
?>