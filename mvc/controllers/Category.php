<?php 
	
	class Category extends Controller{

		
		public $CategoryModel;
		public function __construct(){
			$this->CategoryModel = $this->model("CategoryModel");
		}

		public function Index(){

			if (isset($_SESSION["admin"])) {
				$list = $this->CategoryModel->AllCategorys();
				$this->view("admin",[
			  							"Page" => "category_list",
			  							"ListCategory" => $list
			  						]);
			}else {
	  		echo '<h3> Vui lòng <a href="Admin" >đăng nhập</a> trước khi sử dụng chức năng</h3>';
	  		exit;
	  	}
		}
		public function AddCategory(){

			if(isset($_POST['addCategory'])){
				$data              = array();
				$data["name"]      = trim($_POST["name"]);
				$data["slug"]      = str_replace([" ","_"],"-",strtolower(trim($_POST["slug"])));
				$data["icon"]      = trim($_POST["icon"]);
		  	// Insert vào bảng
		  	$result =$this->CategoryModel->InsertCategory($data);		
				$this->view("admin",[
			  							"Page" => "category_add",
		  								"Result" => $result,
			  						]);
			}else {
				$this->view("admin",[
			  							"Page" => "category_add",
			  						]);
			}
		}

		public function EditCategory($id){
			if(isset($_POST["updateCategory"])){
				$data              = array();
				$data["id"]				 = $_POST["id"];
				$data["name"]      = trim($_POST["name"]);
				$data["slug"]      = str_replace([" ","_"],"-",strtolower(trim($_POST["slug"])));
				$data["icon"]      = trim($_POST["icon"]);
	  		$result = $this->CategoryModel ->UpdateCategory($data);
	  		if($result == "true"){
	  			$list = $this->CategoryModel->AllCategorys();
					$this->view("admin",[
				  							"Page" => "category_list",
			  								"ListCategory" => $list,
			  								"Result" => $result,
				  						]);
	  		}else {
	  			$item = $this->CategoryModel ->GetOneCategory($id);
	  			$this->view("admin",[
			  							"Page" => "category_add",
		  								"Item" => $item,
		  								"Result" => $result,
			  						]);
	  		}
	  	}else {
	  		$item = $this->CategoryModel ->GetOneCategory($id);
	  		$this->view("admin",[
			  							"Page" => "category_add",
		  								"Item" => $item,
			  						]);
	  	}
		}

		public function DeleteCategory($id){
			$result = $this->CategoryModel ->DeleteCategory($id);
			$list = $this->CategoryModel->AllCategorys();
			$this->view("admin",[
				  							"Page" => "category_list",
			  								"ListCategory" => $list,
			  								"Result" => $result,
			  								"Delete" => ""
				  						]);
		}
	}

 ?>